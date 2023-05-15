<?php

namespace App\Services;

interface ParserTagInterface
{
    public function process(string $url): array;
}