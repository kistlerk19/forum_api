<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use Illuminate\Http\Request;
use App\Services\ImageUploadService;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserImageUploadRequest;

class UserFileController extends Controller
{
    protected $imageUploadService;
    protected $responseHelper;

    public function __construct(ImageUploadService $imageUploadService, ResponseHelper $responseHelper)
    {
        $this->imageUploadService = $imageUploadService;
        $this->responseHelper = $responseHelper;
    }
   
    public function store(UserImageUploadRequest $request)
    {
        $file = $request->file->storeAs(
            'public/images/' . auth()->user()->id, $request->file->getClientOriginalName()
        );

        $this->imageUploadService->upload($file);

        return $this->responseHelper->success(true, "image Uploaded!", null);
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
