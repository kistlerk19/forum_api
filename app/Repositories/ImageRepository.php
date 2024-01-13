<?php

namespace App\Repositories;

use App\Models\UserFile;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Contracts\ImageRepositoryContract;


class ImageRepository implements ImageRepositoryContract
{
    public function upload($file)
    {
        try {
            $newFile = new UserFile();
            $newFile->file_name = url(Storage::url($file));
            $newFile->user_id = auth()->user()->id;
            $newFile->save();

            return true;

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}