<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Repositories\Contracts\ImageRepositoryContract;


class ImageUploadService
{
    protected $imageRepositoryContract;
    
    public function __construct(
        ImageRepositoryContract $imageRepositoryContract
    )
    {
        $this->imageRepositoryContract = $imageRepositoryContract;
    }

    public function upload($file)
    {
       return $this->imageRepositoryContract->upload($file);
    }

}