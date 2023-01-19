<?php

namespace App\Service;

class MainService
{
    public function countQuantityOfUniqueTags(array $tags): array
    {
        return array_count_values($tags);
    }
}