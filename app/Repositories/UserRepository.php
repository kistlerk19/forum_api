<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryContract;
use Carbon\Carbon;

class UserRepository implements UserRepositoryContract
{
    public function registerUser(array $data) 
    {
      try {
        $newUser = new User();
        $newUser->fill($data);
        $newUser->save();
  
        return $newUser;
      } catch (\Exception $e) {
        return $e->getMessage();
      }
    }

    public function activateUser($userId)
    {
      try {
        $user = User::where(['id' => $userId])->first();
        $user->email_verified_at = Carbon::now();
        $user->save();
  
        return $user;
      } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
}