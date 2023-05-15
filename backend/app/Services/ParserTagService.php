<?php

namespace App\Services;

class ParserTagService extends ParserTagBase
{

    public function regexTagPattern(): string
    {
        return "/<(?:\"[^\"]*\"['\"]*|'[^']*'['\"]*|[^'\/\">])+/i";
    }

    protected function cleanTag(string $tagTrash): string
    {
        $tagsBumpArray = explode(' ', substr($tagTrash, 1));
        return $tagsBumpArray[0];
    }

    protected function getCollectedTags(array $tagsData): array
    {
        $tags = [];

        foreach ($tagsData as $tagData) {
            $tag = $this->cleanTag($tagData);
            if (isset($tags[$tag])) {
                $tags[$tag]++;
            } else {
                $tags[$tag] = 1;
            }
        }

        arsort($tags);

        return $tags;
    }

    protected function getTags(string $content): array
    {
        preg_match_all($this->regexTagPattern(), $content, $matches);
        return sizeof($matches) > 0 ? $matches[0] : [];
    }

    protected function getContent(string $url): string
    {
        // ToDo curl?
        return file_get_contents($url);
    }


}