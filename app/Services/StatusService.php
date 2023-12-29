<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contracts\StatusRepositoryContract;

class StatusService
{
    protected $statusRepositoryContract;
    public function __construct(
        StatusRepositoryContract $statusRepositoryContract
    )
    {
        $this->statusRepositoryContract = $statusRepositoryContract;
    }

    public function newStatus(array $data)
    {
        $userID = Auth::user()->id;

        $newData = [
            "user_id"=> $userID,
            "status"=> $data["status"],
        ];

        return $this->statusRepositoryContract->newStatus($newData);
    }    
}