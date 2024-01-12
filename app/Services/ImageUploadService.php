<?php

namespace App\Services;

use App\Repositories\ImageRepositoryContract;
use Illuminate\Support\Facades\Auth;


class ImageUploadService
{
    protected $imageRepositoryContract;
    
    public function __construct(
        ImageRepositoryContract $imageRepositoryContract
    )
    {
        $this->imageRepositoryContract = $imageRepositoryContract;
    }

}