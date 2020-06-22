<?php

namespace App\Http\Controllers\Practice;

use App\Repositories\PracticeApisRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApisController extends BaseController
{

    private $practiceApisRepository;

    public function __construct()
    {
        $this->practiceApisRepository = app(PracticeApisRepository::class);
    }

    public function index()
    {
        $data = $this->practiceApisRepository->apiPB();
        return view('practice.apis.index', compact('data') );
    }
}
