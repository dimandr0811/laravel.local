<?php


namespace App\Repositories;


class PracticeApisRepository
{
    public function apiPBExchange()
    {
        $url = 'https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);

        $response = curl_exec($ch);
        curl_close($ch);
        $data =  json_decode($response);
        unset($data[3]);


        foreach ($data as $value){
            $value->diff = $value->sale - $value->buy;
        }

        return($data);
        //Формула для массива
//        for ($i=0; $i<count($data); $i++ ) {
//            $data[$i]['diff'] = $data[$i]['sale'] - $data[$i]['buy'];
//         }
        //Формула для объекта
//        for ($i=0; $i<count($data); $i++ ) {
//            $data[$i]->diff = $data[$i]->sale - $data[$i]->buy;
//        }


    }
    public function apiPBComboBoxCity()
    {
        $url='https://api.privatbank.ua/p24api/pboffice?json&city=&address=';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $response = curl_exec($ch);
        curl_close($ch);
        $cityAddressList =  json_decode($response, true);

        //Сортировка массива по значению city
        $cityAddressList = array_values(\Arr::sort($cityAddressList, function ($value) {
            return $value['city'];
        }));

        // Удаление значений где city отсутствует
        foreach ($cityAddressList as $key => $list){
            if (empty($list['city'])) {
                unset($cityAddressList[$key]);
            }
        }

        return $cityAddressList;
    }


}
