<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Controller\MainController;
use App\Service\MainService;
use App\Utils\HtmlTagsParser;

$request = $_SERVER['REQUEST_URI'];

switch ($request) {

    case '/':
        $controller = new MainController(
                new HtmlTagsParser(),
                new MainService()
        );

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->actionParse($_POST['url']);
        }

        $controller->index();
        break;

    default:
        http_response_code(404);
        break;
}
