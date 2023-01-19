<?php

use App\Utils\UrlParser;

require_once __DIR__ . '/vendor/autoload.php';


$obj = new UrlParser();
$obj->parse('https://getbootstrap.com/docs/5.2/examples/checkout/');