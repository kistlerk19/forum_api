<?php

namespace App\Repositories\Contracts;

interface StatusRepositoryContract
{
    public function newStatus(array $newData);
}