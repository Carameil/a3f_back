<?php

namespace App\Controller;

use App\DataProvider\DataProviderInterface;
use App\Service\MainService;
use App\Utils\StringParserInterface;

readonly class MainController
{
    public function __construct(
            private StringParserInterface $parser,
            private MainService $mainService
    ) {
    }

    public function index(): void
    {
        include $_SERVER['DOCUMENT_ROOT'].'/views/main.php';
    }

    /**
     * @throws \JsonException
     */
    public function actionParse(DataProviderInterface $dataProvider): void
    {
        $dataProvider->loadData();
        $rawData = $dataProvider->getStringData();

        $tags = $this->parser->parse($rawData);

        $quantity = $this->mainService->countQuantityOfUniqueTags($tags);
        echo json_encode($quantity, JSON_THROW_ON_ERROR);
    }
}