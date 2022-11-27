<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request) {
        $user = User::where('email', $request->email)->first();

        if($user) {
            return response()->json([
                'success' => false,
                'message' => 'Email already exist'
            ]);
        }

        User::create([
            'name' => $request->name,
            'email'=>$request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Created'
        ]);
    }


    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'This email is not registered!'
            ]);
        }

        if(Auth::attempt($credentials)) {
            return response()->json([
                'success' => true,
                'token' => $user->createToken($user->email)->accessToken
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Email or password is invalid!'
        ]);
    }
}
