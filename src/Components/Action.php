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

    public function __construct(
        $name,
        $href,
        $method = "GET",
        $title = null,
        array $class = null,
        $type = null,
        array $fields = null
    ) {
        $this->name = (string) $name;
        $this->href = (string) $href;
        $this->class = $class;
        $this->method = (string) $method;
        $this->handleFields($fields);
        $this->handleType($type);
        $this->title = (string) $title;
    }

    private function handleFields($fields)
    {
        if (!empty($fields)) {
            foreach ($fields as $field) {
                $this->addField($field);
            }
        }
    }

    private function handleType($type)
    {
        if (empty($type) && !empty($this->fields)) {
            $type = "application/x-www-form-urlencoded";
        }

        $this->type = (string) $type;
    }

    public function addField(Field $field)
    {
        $this->fields[] = $field;
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
