<?php

use App\Utils\HtmlTagsParser;

require_once __DIR__ . '/vendor/autoload.php';


$obj = new HtmlTagsParser();
$rawResult = $obj->parse('https://getbootstrap.com/docs/5.2/examples/checkout/');
