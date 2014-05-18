<?php

class Field
{
    private $name;
    private $type;
    private $value;
    private $title;

    //should allowed types be enforced. check the spec for MUST or SHOULD
    private $allowedTypes = array(
        "hidden", "text", "search", "tel", "url", "email",
        "password", "datetime", "date", "month", "week",
        "time", "datetime-local", "number", "range", "color",
        "checkbox", "radio", "file", "image", "reset", "button"
    );

    public function __construct($name, $type = "text", $title = null, $value = null)
    {
        if (!in_array($type,$this->allowedTypes)) {
            throw new \InvalidArgumentException("Invalid field type");
        }

        $this->name = $name;
        $this->type = $type;
        $this->value = $value;
        $this->title = $title;

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
