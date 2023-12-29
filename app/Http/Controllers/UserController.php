<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function me()
    {
        $user_id = Auth::user()->id;

        $user = User::with("statuses")->find($user_id);

        // $status = $user->statuses()->get();

        return response()->json([
            'data' => [
                'success' => true,
                'message' => "This is the user!",
                'date' => $user,
            ]
        ]);
    }
}
