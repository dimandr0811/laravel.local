<?php


namespace App\Repositories;


class PracticeApisRepository
{
    public function apiPB()
    {
        $url = 'https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);

        $response = curl_exec($ch);
        curl_close($ch);
        $data =  json_decode($response,true);
        unset($data[3]);
        for ($i=0; $i<count($data); $i++ ) {
            $pr = $data[$i]['sale'] - $data[$i]['buy'];
            $data[$i]['diff'] = $pr;
        }
        return($data);

    }
}
