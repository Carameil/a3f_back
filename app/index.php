<?php

require_once __DIR__.'/vendor/autoload.php';

use App\Controller\MainController;
use App\DataProvider\DataHtmlProvider;
use App\Service\MainService;
use App\Utils\HtmlTagsParser;
use App\Validator\UrlValidator;

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/':
        $controller = new MainController(
                new HtmlTagsParser(),
                new MainService()
        );

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $url = $_POST['url'];
                UrlValidator::validate($url);
                $controller->actionParse(new DataHtmlProvider($url));
            } catch (\Exception $exception) {
                echo $exception->getMessage();
            }
        }

        $controller->index();
        break;

    default:
        http_response_code(404);
        break;
}
