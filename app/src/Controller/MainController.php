<?php

namespace App\Controller;

use App\Service\MainService;
use App\Utils\UrlParserInterface;
use App\Validator\UrlValidator;

readonly class MainController
{
    public function __construct(
            private UrlParserInterface $parser,
            private MainService $mainService
    )
    {
    }

    public function index(): void
    {
        include $_SERVER['DOCUMENT_ROOT']. '/views/main.php';
    }

    /**
     * @throws \JsonException
     */
    public function actionParse(string $url): void
    {
        $validUrl = UrlValidator::validate($url);

        if($validUrl !== true) {
            $error = $validUrl;
            include($_SERVER['DOCUMENT_ROOT']. '/views/main.php');
            die();
        }
        $tags = $this->parser->parse($url);
        $result = $this->mainService->countQuantityOfUniqueTags($tags);
        echo json_encode($result, JSON_THROW_ON_ERROR);
    }
}