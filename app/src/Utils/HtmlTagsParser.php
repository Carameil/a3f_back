<?php

namespace App\Utils;

class HtmlTagsParser implements UrlParserInterface
{
    public function parse($url): array
    {
        $html = file_get_contents($url);
        $pattern = '/<(?!\/)([^\s!][^\s>]+)/';
        preg_match_all($pattern, $html, $matches);

        return array_map(static function ($tag) {
            return substr($tag, 1);
        }, $matches[0]);
    }
}