<?php

namespace App\Http\Controllers;

use App\Mail\RegisterUserMail;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Helpers\ResponseHelper;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRegisterRequest;

class AuthController extends Controller
{
    protected $userService;
    protected $responseHelper;
    
    public function __construct(UserService $userService, ResponseHelper $responseHelper){
        $this->userService = $userService;
        $this->responseHelper = $responseHelper;
    }

    // Register user Function
    public function register(UserRegisterRequest $request)
    {
        $user = $this->userService->registerUser($request->all());

        if ($user){
            Mail::to($user->email)->send(new RegisterUserMail($user));

            return $this->responseHelper->success(true, "Verification Mail Sent.", $user);
        }

        return $this->responseHelper->fail(false, "Unauthorised!", 404);

        // $token = $user->createToken("Harsia")->accessToken;

        // $data = [
        //     "success" => true,
        //     "user"=> $user,
        //     "token"=> $token,
        // ];

        // return $this->responseHelper->success(true, "User created!", $data);
    }

    // User Login Function
    public function login(Request $request)
    {
        $newUser = $this->userService->login($request->all());

        if($newUser)
        {
            $token = $newUser->createToken("Harsia Access");
            
            
            $data = [
                "access token" => $token->accessToken,
                "token type" => "Bearer",
                "expiry date"=> $token->token->expires_at,
                "user" => $newUser,
            ];

            return $this->responseHelper->success(true, "You're logged in.", $data);
        }

        return $this->responseHelper->fail(false, "Unauthorised!", 401);
    }


    public function me()
    {
        $user = Auth::user();

        return $this->responseHelper->success(true,"User", $user);
    }

}
