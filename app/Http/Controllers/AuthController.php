<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserLoginRequest;

class AuthController extends Controller
{
    public function register(UserRequest $request )
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $token = $user->createToken('laravelapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' =>$token
        ];
        return response($response, 201);
    }

    public function login(UserLoginRequest $request )
    {
        //check email
            $user = User::where('email', $request->email)->first();
        if( !$user || Hash::check($request->password, $user->password ) )
        {
            return response([
                'message' => 'bad creds',
            ], 401);
        }

        $token = $user->createToken('laravelapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' =>$token
        ];
        return response($response, 201);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return [
            'message' => 'logged out'
        ];
    }
}
