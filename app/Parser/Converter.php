<?php


namespace App\Parser;

class Converter implements Strategy
{
    private $url = null;
    private $qty = 0;
    private $convertibleCurrencies = null;

    public function __construct(string $convertibleCurrencies, float $qty)
    {
        $this->url = "https://free.currconv.com/api/v7/convert?q={$convertibleCurrencies}&compact=ultra&apiKey=";
        $this->qty = $qty;
        $this->convertibleCurrencies = $convertibleCurrencies;
    }

    public function processData(array $data)
    {
        $currencies = explode('_', $this->convertibleCurrencies);
        return "Результат конверсии из {$currencies[0]} в {$currencies[1]} = " . round($data[$this->convertibleCurrencies] * $this->qty, 2);
    }
}