<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function register(Request $request) {
        $validator = Validator::make($request->all(),
            [

                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6'

            ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);

        }
            $user = User::create([
            'firstname' => $request->firstname,
            'lastname' =>$request->lastname,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response()->json(['user'=>$user,
            'message'=>'ok',
            'token'=>$token

            ]);
    }


        public function login(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();

        // Check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Password is worng'
            ], 401);
        }
        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    // public function logout(Request $request) {
    //     auth()->user()->token()->delete();

    //     return [
    //         'message' => 'Logged out'
    //     ];
    // }
}