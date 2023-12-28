<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterRequest;

class AuthController extends Controller
{
    public function register(UserRegisterRequest $request)
    {
        $user = User::create([
            "name"=> $request->name,
            "username"=> $request->username,
            "email"=> $request->email,
            "password"=> bcrypt($request->password),
        ]);

        $token = $user->createToken("Harsia")->accessToken;

        dd($token);

        return $user;
    }
}
