<?php namespace Siren\Encoders;

use Siren\Components\Field;

class FieldEncoder extends BaseEncoder
{

    public function encode(Field $field)
    {
        $f = array();
        $f['name'] = $field->getName();
        $f['type'] = $field->getType();

        if ($value = $field->getValue()) {
            $f['value'] = $value;
        }

        if ($title = $field->getTitle()) {
            $f['title'] = $title;
        }

        return $f;
    }

    private function validateField(Field $field)
    {
        $name = $field->getName();
        if (empty($name)) {
            throw new \Exception("Field name is required");
        }
    }


}
