<?php namespace Siren\Components;

class Action
{
    private $name;
    private $href;
    private $class = array();
    private $method;
    private $type;
    private $fields = array();
    private $title;

    public function setName($name)
    {
        $this->name = (string) $name;

        return $this;
    }

    public function setHref($href)
    {
        $this->href = (string) $href;

        return $this;
    }

    public function setMethod($method)
    {
        $this->method = (string) $method;

        return $this;
    }

    public function setType($type)
    {
        $this->type = (string) $type;

        return $this;
    }

    public function setTitle($title)
    {
        $this->title = (string) $title;

        return $this;
    }

    public function addClass($class)
    {
        $this->class[] = (string) $class;

        return $this;
    }

    public function addField(Field $field)
    {
        $this->fields[] = $field;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getHref()
    {
        return $this->href;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getFields()
    {
        return $this->fields;
    }

    public function getClass()
    {
        return $this->class;
    }
}
