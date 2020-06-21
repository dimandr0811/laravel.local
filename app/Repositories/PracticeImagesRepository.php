<?php


namespace App\Repositories;


use App\Http\Requests\PracticeImageUploadRequest;

class PracticeImagesRepository
{
    public function saveImage()
    {
        $request = app(PracticeImageUploadRequest::class);
        $path = $request->file('image')
                ->storeAs(
                'upload',
                'Image-' . time() . '.jpeg',
                'public');
        return $path;
    }
}
