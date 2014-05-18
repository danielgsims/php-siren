<?php

class Link
{
    private $relList = array();
    private $href;
    private $title;

    public function __construct(array $relList, $href, $title = null)
    {
        $this->addRel($relList);
        $this->href = $href;
        $this->title = $title;
    }

    private function addRel(array $relList)
    {
        foreach ($relList as $rel)
        {
            $this->relList[] = (string) $rel;
        }
    }

    public function getRel()
    {
        return $this->rel;
    }

    public function getHref()
    {
        return $this->href;
    }

    public function getTitle()
    {
        return $this->title;
    }
}
