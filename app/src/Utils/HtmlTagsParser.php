<?php

namespace App\Utils;

class HtmlTagsParser implements UrlParserInterface
{
    public function parse($url): array
    {
        $html = file_get_contents($url);
        $pattern = '/<(?!\/)([^\s!][^\s>]+)/';
        preg_match_all($pattern, $html, $matches);

        return $matches[0];
    }
}