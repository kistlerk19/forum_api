<?php

namespace App\Repositories;

use Illuminate\Support\Str;
use App\Models\PasswordResetToken;
use App\Repositories\Contracts\PasswordResetRepositoryContract;

class PasswordResetRepository implements PasswordResetRepositoryContract
{
  public function createPasswordReset($email)
  {
    try {

      $reset = PasswordResetToken::updateOrCreate(
        ['email' => $email],
        [
          'email' => $email,
          'token' => Str::random(64),
        ]
      );
      
      return $reset;
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function checkReset($email, $token)
  {
    return PasswordResetToken::where([
      'email' => $email,
      'token' => $token
    ])->first();
  }
}