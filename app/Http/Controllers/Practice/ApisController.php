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

        $cityAddressList = $this->practiceApisRepository->apiPBComboBoxCity();

        return view('practice.apis.index', compact('data', 'cityAddressList'));
    }


    public function show($city = 'Днепропетровск', $address = 'Титова')
    {
        $url = 'https://api.privatbank.ua/p24api/pboffice?';
        $options = [
            'city' => $city,
            'address' => $address,
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url . '?json&' . http_build_query($options));


        $response = curl_exec($ch);
        curl_close($ch);
        $department = json_decode($response, true);

        dd($department);

        if ($department) {
            return redirect()
                ->route('practice.apis.index', compact('department'));
        }
    }
}
