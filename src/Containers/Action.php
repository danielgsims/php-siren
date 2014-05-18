<?php namespace Siren\Containers;

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
        $type,
        array $fields
    ) {
        $this->name = (string) $name;
        $this->href = (string) $href;
        $this->class = $class;
        $this->method = (string) $method;
        $this->handleFields($fields);
        $this->handleType($type);

    }

    private function handleFields($fields)
    {
        if (!empty($fields)) {
            foreach ($this->fields as $field) {
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

    private function addField(Field $field)
    {
        $this->fields[] = $field;
    }
}
