<?php namespace Siren\Containers;

class Field
{
    private $name;
    private $type;
    private $value;
    private $title;

    public function __construct($name, $type = "text", $title = null, $value = null)
    {
        $this->name = (string) $name;
        $this->type = (string) $type;
        $this->value = (string) $value;
        $this->title = (string) $title;

    }

    public function getName()
    {
        return $this->name;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getTitle()
    {
        return $this->title;
    }
}
