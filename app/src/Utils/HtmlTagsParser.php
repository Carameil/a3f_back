<?php

namespace App\Utils;

class HtmlTagsParser implements StringParserInterface
{
    public function parse(string $string): array
    {
        preg_match_all('/<([a-zA-Z0-9]+)(?:\s|\/>|>)/', $string, $matches);
        $tags = preg_replace("/<|\/>|>|\s/", "", $matches[0]);
        if (!is_array($tags)) {
            throw new \DomainException('Can\'t parse this page');
        }

        return $tags;
    }
}