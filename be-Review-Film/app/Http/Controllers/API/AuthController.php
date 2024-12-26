<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Roles;
use App\Models\OtpCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegisterMail;
use App\Mail\GenerateEmailMail;
use Carbon\Carbon;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,id',
            'password' => 'required|min:8|confirmed',
        ],[
            'required' => 'input :attribute harus terisi',
            'min'=> 'input :attribute minimal :min karakter',
            'email'=> 'input :attribute harus berformat email',
            'unique'=>'email sudah terdaftar',
            'confirmed'=>'password harus sama',
        ]);
       
        $roleUser = Roles::where('name','user')->first();

        $user = new User();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password')) ;
        $user->role_id = $roleUser->id;
        
        $user->save();
        
        Mail::to(users: $user->email)->send(new UserRegisterMail($user));

        return response([
            'message' => 'Register Berhasil',
            'user'=> $user,
            'role' => $roleUser,
        ],200);

    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],[
            'required' => 'input :attribute harus terisi',
        ]);

        $credentials = request(['email','password']);

        if(!$token = auth()->attempt($credentials)) {
            return response()->json(['error'=>'User Invalid'],400);
        }

        $userData = User::where('email', $credentials['email'])->first();

        $roleData = Roles::where('id', $userData->role_id)->first();
        return response([
            'message'=> 'User berhasil login',
            'user'=> $userData,
            'role'=> $roleData,
            'token'=> $token
        ],200);
    }
    

    public function logout()
    {
      auth()->logout();
      return response()->json([
        'message'=> 'Logout Berhasil'
      ]);
    }
    public function me()
    {
        $user = auth()->user();
        return response()->json([
            'message'=> 'Profile berhasil ditampilkan',
            'user'=> $user,
        ],200);
    }

    public function generateOtp(Request $request){
        $validated = $request->validate([
            'email' => 'required|email',
        ],[
            'required' => 'input :attribute harus terisi',
            'email'=>'input harus email'
        ]);

        $user = User::where('email',$request->input('email'))->first();

        $user->generate_otp();

        Mail::to(users: $user->email)->send(new GenerateEmailMail($user));


        return response()->json([
            'succes'=>'true',
            'message'=> 'OTP Code Berhasil di generate',
           
        ]);
    }

    public function verifikasi(Request $request){
        $validated = $request->validate([
            'otp' => 'required|min:6',
        ],[
            'required' => 'input :attribute harus terisi',
            'min'=>'input :min karakter'
        ]);
        $otp_code = OtpCode::where('otp',$request->input('otp'))->first();

        if(!$otp_code) {
        return response([
            'response_message'=>'OTP Code tidak ditemukan'
        ]);
        }

        $now = Carbon::now();
        if($now > $otp_code->valid_until){
            return response([
                'response_message'=> 'otp code sudah tidak berlaku, silahkan generate ulang'
            ],400);
        }
        return response([
            'response_message' => 'email sudah terverifikasi'
        ]);
    }
}
