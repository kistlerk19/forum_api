<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Mail\RegisterUserMail;
use App\Helpers\ResponseHelper;
use App\Mail\PasswordResetMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Services\PasswordResetService;
use App\Http\Requests\UserRegisterRequest;
use App\Services\UserActivationTokenService;

class AuthController extends Controller
{
    protected $userService;
    protected $responseHelper;
    protected $userActivationTokenService;
    protected $passwordResetService;
    
    public function __construct(
        UserService $userService, 
        ResponseHelper $responseHelper,
        PasswordResetService $passwordResetService,
        UserActivationTokenService $userActivationTokenService,
    ){
        $this->userService = $userService;
        $this->responseHelper = $responseHelper;
        $this->passwordResetService = $passwordResetService;
        $this->userActivationTokenService = $userActivationTokenService;
    }

    // Register user Function
    public function register(UserRegisterRequest $request)
    {
        $user = $this->userService->registerUser($request->all());

        if ($user){
            $token = $this->userActivationTokenService->createNewToken($user->id);
            // dd($token->token);
            
            Mail::to($user->email)->send(new RegisterUserMail($user, $token->token));

            return $this->responseHelper->success(true, "Verification Mail Sent.", $user);
        }

        return $this->responseHelper->fail(false, "Unauthorised!", 404);

    }

    public function activateEmail($code)
    {
        $checkToken = $this->userActivationTokenService->checkToken($code);

        return $this->responseHelper->success(true, "User Activation!", $checkToken);
    }

    // User Login Function
    public function login(Request $request)
    {

        $activated = $this->userService->checkUserIsActivated($request->email);

        if (!$activated) {
            return $this->responseHelper->fail(false, 'User account must be activated!', 401);
        }

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


    public function resetPass(Request $request)
    {
        $checkUserEmail = $this->userService->checkEmail($request->email);

        if (!$checkUserEmail) {
            return $this->responseHelper->fail(false, "User email does not exist", 404);
        }

        $passwordResetData = $this->passwordResetService->createPasswordReset($request->email);

        Mail::to($request->email)->send(new PasswordResetMail($passwordResetData));

        return $this->responseHelper->success(true, "Check Your Email for ", $passwordResetData);
    }
    public function resetPasswordToken(Request $request, $token)
    {
        $checkToken = $this->passwordResetService->checkReset($request->email, $token);

        if (!$checkToken) {
            return $this->responseHelper->fail(false, "User email does not exist", 404);
        }
        dd($checkToken);

        $user = $this->userService->getUserByEmail($request->email);

        $user->password = bcrypt($request->password);
        $user->save();

        $checkToken->delete();   

        return $this->responseHelper->success(true, "Password was successfully changed.", $user);
    }


    public function me()
    {
        $user = Auth::user();

        return $this->responseHelper->success(true,"User", $user);
    }

}
