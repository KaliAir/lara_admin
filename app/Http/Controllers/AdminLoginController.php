<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\HttpResponse;
use Hash;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    use HttpResponse;

    function register(Request $request){

        $request->validate([
            'name' => 'required',  
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API token of '. $user->name)->plainTextToken
        ]);

    }


    function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $credentials = $request->only('email', 'password');

        if(!Auth::attempt($credentials)){
            return $this->error([
                'error' => 'Credential do not match please check Email & password'
            ]);
        }

        $user = User::where('email', $request->email)->first();

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('Api Token of ' . $user->name)->plainTextToken,
            'message'=>'your successfully login'
        ]);
    }
}
