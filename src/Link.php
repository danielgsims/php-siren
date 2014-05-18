<?php

class Link
{
    private $rel;
    private $href;
    private $title;

    public function __construct($rel, $href, $title = null)
    {
        $this->rel = $rel;
        $this->href = $href;
        $this->title = $title;
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
