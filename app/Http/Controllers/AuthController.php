<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterRequest;
use App\Services\UserService;

class AuthController extends Controller
{
    protected $userService;
    
    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

    public function register(UserRegisterRequest $request)
    {
        $user = $this->userService->registerUser($request->all());

        $token = $user->createToken("Harsia")->accessToken;

        return response()->json([
            "data" => [
                "success" => true,
                "user"=> $user,
                "token"=> $token,
            ]
        ]);
    }
}
