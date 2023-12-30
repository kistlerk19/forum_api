<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Repositories\Contracts\UserActivationTokenRepositoryContract;
use App\Repositories\Contracts\UserRepositoryContract;

class UserActivationTokenService
{
    protected $userActivationTokenRepositoryContract;
    protected $userRepositoryContract;

    public function __construct(
        UserActivationTokenRepositoryContract $userActivationTokenRepositoryContract,
        UserRepositoryContract $userRepositoryContract)
    {
        $this->userActivationTokenRepositoryContract = $userActivationTokenRepositoryContract;
        $this->userRepositoryContract = $userRepositoryContract;
    }

    public function createNewToken(int $userId)
    {
        $token = Str::random(48);

        return $this->userActivationTokenRepositoryContract->createToken($userId, $token);
    }

    public function checkToken($code)
    {
        $token = $this->userActivationTokenRepositoryContract->checkToken($code);

        if ($token)
        {
            $userId = $token->user_id;

            $this->userRepositoryContract->activateUser($userId);

            $token->delete();

            return "User activated!";
        }

        return "User not activated!";
    }
}