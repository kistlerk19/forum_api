<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $responseHelper;

    public function __construct(ResponseHelper $responseHelper)
    {
        $this->responseHelper = $responseHelper;
    }
    public function me()
    {
        $user = Auth::user();

        // $this->responseHelper->success(true, "This is the user!", $user);

        // $user = User::with("statuses")->find($user_id);

        // $status = $user->statuses()->get();

        return $this->responseHelper->success(true, "This is the user!", $user);
    }

    public function newFriend($id)
    {
        $addFriend = auth()->user()->friends()->attach([$id]);

        return $this->responseHelper->success(true, "Added new friend!", $addFriend);
    }
}
