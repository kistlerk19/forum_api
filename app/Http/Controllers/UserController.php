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

    public function toggleFriend($id)
    {
        $friend = auth()->user()->friends();

        if ($friend->find($id))
        {
            $friend->detach($id);
            return $this->responseHelper->success(true, "Removed friend!", []);
        }

        $friend->attach([$id]);

        return $this->responseHelper->success(true, "Added new friend!", $friend);
    }

    public function getFriends()
    {
        $friends = auth()->user()->friends()->get();

        return $this->responseHelper->success(true, "All friends!", $friends);
    }
}
