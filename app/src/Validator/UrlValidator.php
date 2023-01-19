<?php

namespace App\Validator;

class UrlValidator
{
    public static function validate($url)
    {
        if (empty($url)) {
            return "URL is required";
        }

        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return "Invalid URL";
        }
        return true;
    }
}