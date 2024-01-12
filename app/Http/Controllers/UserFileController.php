<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserImageUploadRequest;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;

class UserFileController extends Controller
{
    protected $imageUploadService;

    public function __construct(ImageUploadService $imageUploadService)
    {
        $this->imageUploadService = $imageUploadService;
    }
   
    public function store(UserImageUploadRequest $request)
    {
        $file = $request->file->storeAs(
            'public/images/' . auth()->user()->id, $request->file->getClientOriginalName()
        );

        dd($file);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
