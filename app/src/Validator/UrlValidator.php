<?php

namespace App\Validator;

class UrlValidator
{
    public static function validate($url)
    {
        if (empty($url)) {
            throw new \DomainException('URL is required');
        }

        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            throw new \DomainException('Invalid URL');
        }
        return true;
    }
}