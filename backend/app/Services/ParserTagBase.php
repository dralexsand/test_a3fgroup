<?php

namespace App\Services;

abstract class ParserTagBase implements ParserTagInterface
{
    public function process(string $url): array
    {
        $content = $this->getContent($url);
        $tagsData = $this->getTags($content);

        if (sizeof($tagsData) === 0) {
            return [];
        }

        return $this->getCollectedTags($tagsData);
    }

    abstract protected function regexTagPattern(): string;

    abstract protected function getContent(string $url): string;

    abstract protected function getTags(string $content): array;

    abstract protected function getCollectedTags(array $tagsData): array;


}