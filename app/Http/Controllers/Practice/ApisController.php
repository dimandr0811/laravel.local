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
        $data = $this->practiceApisRepository->apiPBExchange();

        $cityList = $this->practiceApisRepository->apiPBComboBoxCity();

        return view('practice.apis.index', compact('data', 'cityList'));
    }


    public function show(Request $request)
    {
        $city = $request->input('city');

        $url = 'https://api.privatbank.ua/p24api/pboffice?json';
        $options = [
            'city' => $city,
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url . '&' . http_build_query($options));

        $response = curl_exec($ch);
        curl_close($ch);
        $department = json_decode($response);

        //dd($department);

        if ($department) {
            return redirect()->back()->with('department', [$department]);
        }
    }
}
