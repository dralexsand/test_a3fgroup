<?php

namespace App\Services;

class ParserTagService
{


    protected function regexTagPattern(): string
    {
        //return "/<(?:\"[^\"]*\"['\"]*|'[^']*'['\"]*|[^'\">])+>/i";
        return "/<(?:\"[^\"]*\"['\"]*|'[^']*'['\"]*|[^'\/\">])+/i";
        //return "/<(?:\"[^\"]*\"['\"]*|'[^']*'['\"]*|[^'\">])+/i";
        //return "/<(?:\"[^\"]*\"['\"]*|'[^']*'['\"]*|[^'\">])+/";
        //return '/\<([\w]+)\s.*\>/ismU';
        //return `/<(?:\"[^\"]*\"['\"]*|'[^']*'['\"]*|[^'\/">])+/`;
        //return "/<(?:\"[^\"]*\"['\"]*|'[^']*'['\"]*|[^'\/">])+/";
    }

    public function process(string $url): array
    {
        $content = $this->getContent($url);
        $tagsData = $this->getTags($content);

        if (sizeof($tagsData) === 0) {
            return [];
        }

        return $this->getCollectedTags($tagsData);
    }

    protected function cleanTag(string $tagTrash)
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

    protected function getTags(string $content)
    {
        $pattern = $this->regexTagPattern();
        preg_match_all($this->regexTagPattern(), $content, $matches);
        return sizeof($matches) > 0 ? $matches[0] : [];
    }

    protected function getContent(string $url): string
    {
        // ToDo curl?
        $content = file_get_contents($url);
        return $content;
    }


}