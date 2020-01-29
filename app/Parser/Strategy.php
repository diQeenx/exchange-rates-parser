<?php


namespace App\Parser;


interface Strategy
{
    public function processData(array $data);
}