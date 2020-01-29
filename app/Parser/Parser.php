<?php


namespace App\Parser;


class Parser
{
    const API = "e97a39bbfe370e6d886d";
    private $data = [];
    private $strategy = null;

    public function __construct(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function setStrategy(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function doOperationWithData()
    {
        $foo = function () {
            return $this->url;
        };
        $getUrl = $foo->bindTo($this->strategy, $this->strategy);
        $url = $getUrl() . self::API;

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_REFERER, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

        $this->data = json_decode(curl_exec($curl), true);

        curl_close($curl);

        return $this->strategy->processData($this->data);
    }
}