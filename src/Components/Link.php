<?php namespace Siren\Components;

class Link
{
    private $relList = array();
    private $href;
    private $title;

    public function setHref($href)
    {
        $this->href = (string) $href;

        return $this;
    }

    public function addRel($rel)
    {
        $this->relList[] = (string) $rel;

        return $this;
    }


    public function setTitle($title)
    {
        $this->title = (string) $title;

        return $this;
    }

    public function getRel()
    {
        return $this->relList;
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
