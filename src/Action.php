<?php

class Action
{
    private $name;
    private $href;
    private $class = array();
    private $method;
    private $type;
    private $fields = array();

    public function __construct(
        $name,
        $href,
        array $class = array(), 
        $method = "GET",
        $type = "application/x-www-form-urlencoded",
        array $fields
    ) {
        $this->name = (string) $name;
        $this->href = (string) $href;
        $this->class = $class;
        $this->method = (string) $method;
        $this->type = (string) $type;

        if (!empty($fields)) {
            foreach ($this->fields as $field) {
                $this->addField($field);
            }
        }
    }

    private function addField(Field $field)
    {
        $this->fields[] = $field;
    }
}
