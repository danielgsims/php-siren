<?php namespace Siren\Encoders;

use Siren\Components\Field;

class FieldEncoder extends BaseEncoder
{

    public function encode(Field $field)
    {
        $response = array();
        $response['name'] = $field->getName();
        $response['type'] = $field->getType();

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
            throw new \Exception("Field name is required");
        }
    }


}
