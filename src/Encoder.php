<?php namespace Siren;

use Siren\Components\Entity;
use Siren\Components\Link;
use Siren\Components\Action;
use Siren\Components\Field;

class Encoder
{
    public function encode(Entity $e)
    {
        $r = array();

        if ($class = $e->getClass()) {
            $r['class'] = $class;
        }

        if ($properties = $e->getProperties()) {
            $r['properties'] = $properties;
        }

        if ($actions = $e->getActions()) {
            $r['actions'] = array();
            foreach ($actions as $action) {
                $r['actions'][] = $this->encodeAction($action);
            }
        }

        return json_encode($r);
    }

    private function encodeAction(Action $action)
    {
        $a = array();
        $a['name'] = $action->getName();

        if ($class = $action->getClass()) {
            $a['class'] = $class;
        }

        $a['href'] = $action->getHref();
        $a['method'] = $action->getMethod();

        if ($title = $action->getTitle()) {
            $a['title'] = $title;
        }

        if ($type = $action->getType()) {
            $a['type'] = $type;
        }

        if ($fields = $action->getFields()) {
            $a['fields'] = array();
            foreach ($fields as $field) {
                $a['fields'][] = $this->encodeField($field);
            }
        }
        return $a;
    }

    private function encodeField(Field $field)
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
}
