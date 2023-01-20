<?php

namespace App\DataProvider;

class DataHtmlProvider implements DataProviderInterface
{
    private string $url;

    private string $source;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function loadData(): void
    {
        if(false === $data = file_get_contents($this->url)) {
            throw new \DomainException('Can\'t load page');
        }
        $this->source = $data;
    }

    public function getStringData(): string
    {
        return $this->source;
    }
}