<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


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
        
        $user = $user->save();

        return response([
            'message' => 'user berhasil di register',
            'user'=> $user,
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

        return response([
            'message'=> 'User berhasil login',
            'user'=> $userData,
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
}
