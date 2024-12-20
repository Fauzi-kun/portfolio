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
        $user = new User();

        $roleUser = Roles::where('name','user')->first();

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
 //
    }
    

    public function logout()
    {
      // code
    }
    public function me()
    {
        //code
    }
}
