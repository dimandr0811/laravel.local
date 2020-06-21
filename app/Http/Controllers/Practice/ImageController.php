<?php

namespace App\Http\Controllers\Practice;

use App\Http\Requests\PracticeImageUploadRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Repositories\PracticeImagesRepository;

class ImageController extends BaseController
{
    private $practiceImagesRepository;

    public function __construct()
    {
        $this->practiceImagesRepository = app(PracticeImagesRepository::class);
    }

    public function index()
    {

        return view('practice.images.upload', compact('path'));
    }

    public function upload()
    {
        $path = $this->practiceImagesRepository->saveImage();

        return view('practice.images.upload', compact('path'));
    }

}
