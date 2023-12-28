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
        //
    }    
}