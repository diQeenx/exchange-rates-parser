<?php


namespace App\Parser;

class Currency implements Strategy
{
    private $url = "https://free.currconv.com/api/v7/currencies?apiKey=";

    public function processData(array $data)
    {
        $newData = [];

        foreach ($data['results'] as $key => $item) {
            $newData[$key] = [
                "id" => $item['id'],
                "name" => $item['currencyName'],
                "symbol" => isset($item['currencySymbol']) ? $item['currencySymbol'] : null
            ];
        }

        return $newData;

        /*
         * Логика добавления данных в базу
         */
    }
}