<?php namespace Siren\Components;

class Field
{
    private $name;
    private $type;
    private $value;
    private $title;

    public function setName($name)
    {
       $this->name = (string) $name;

       return $this;
    }

    public function setType($type)
    {
        $this->type = (string) $type;

        return $this;
    }

    public function setValue($value)
    {
        $this->value = (string) $value;

        return $this;
    }

    public function setTitle($title)
    {
        $this->title = (string) $title;
        
        return $this;
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
