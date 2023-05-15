<?php

namespace App\Services;

interface ParserTagInterface
{
    public function regexTagPattern(): string;

    public function process(string $url): array;
}