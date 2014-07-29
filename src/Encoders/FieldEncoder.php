<?php namespace Siren\Encoders;

use Siren\Components\Field;

class FieldEncoder extends BaseEncoder
{

    public function encode(Field $field)
    {
        $this->validateField($field);

        $response = [
            'name' => $field->getName(),
            'type' => $field->getType() ?: "text"
        ];

        if ($value = $field->getValue()) {
            $response['value'] = $value;
        }

        if ($title = $field->getTitle()) {
            $response['title'] = $title;
        }

        return $response;
    }

    private function validateField(Field $field)
    {
        $name = $field->getName();
        if (empty($name)) {
            throw new \InvalidArgumentException("Field name is required");
        }
    }


}
