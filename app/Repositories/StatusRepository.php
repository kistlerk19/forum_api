<?php

namespace App\Repositories;

use App\Models\Status;
use App\Models\User;
use App\Repositories\Contracts\StatusRepositoryContract;
use App\Repositories\Contracts\UserRepositoryContract;


class StatusRepository implements StatusRepositoryContract
{
    public function newStatus(array $newData)
    {
        try {
            $newStatus = new Status();
            $newStatus->fill($newData);
            $newStatus->save();
            return $newStatus;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}