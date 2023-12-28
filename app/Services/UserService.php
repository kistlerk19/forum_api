<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryContract;
use Illuminate\Support\Facades\Auth;


class UserService
{
    protected $userRepositoryContract;
    
    public function __construct(
        UserRepositoryContract $userRepositoryContract
    )
    {
        $this->userRepositoryContract = $userRepositoryContract;
    }

    public function registerUser(array $data)
    {
        $userData = [
            "name"=> $data["name"],
            "username"=> $data["username"],
            "email"=> $data["email"],
            "password"=> bcrypt($data["password"]),
        ];

        $newUser = $this->userRepositoryContract->registerUser($userData);

        // $token = $newUser->createToken("Harsia")->accessToken;

        // $data = [
        //     "user" => $newUser,
        //     "token"=> $token,
        // ];

        return $newUser;
    }
}