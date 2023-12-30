<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Repositories\Contracts\UserActivationTokenRepositoryContract;

class UserActivationTokenService
{
    protected $userActivationTokenRepositoryContract;

    public function __construct(UserActivationTokenRepositoryContract $userActivationTokenRepositoryContract)
    {
        $this->userActivationTokenRepositoryContract = $userActivationTokenRepositoryContract;
    }

    public function createNewToken(int $userId)
    {
        $token = Str::random(48);

        return $this->userActivationTokenRepositoryContract->createToken($userId, $token);
    }
}