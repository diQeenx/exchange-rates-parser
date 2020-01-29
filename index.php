<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "autoloader.php";

use App\Parser\Converter;
use App\Parser\Currency;
use App\Parser\Parser;

header('Content-Type: text/html; charset=utf-8');

$context = new Parser(new Currency());
//$result = $context->doOperationWithData();

$context->setStrategy(new Converter("USD_BYN", 1));
echo $context->doOperationWithData();