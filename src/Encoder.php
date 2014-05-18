<?php namespace Siren;

use Siren\Components\Entity;
use Siren\Components\Link;
use Siren\Components\Action;
use Siren\Components\Field;

class Encoder
{
    public function encode(Entity $e)
    {
        $response = $this->encodeEntity($e, false);

        return json_encode($response);
    }

    private function encodeEntity(Entity $entity, $isSubEntity = false)
    {
        $r = array();

        if ($class = $entity->getClass()) {
            $r['class'] = $class;
        }

        if ($properties = $entity->getProperties()) {
            $r['properties'] = $properties;
        }

        if (!$isSubEntity && $entities = $entity->getEntities()) {
            $r['entities'] = array();

            foreach ($entities as $subEntity) {
                $r['entities'][] = $this->encodeEntity($subEntity, true);
            }
        }

        if (!$isSubEntity && $actions = $entity->getActions()) {
            $r['actions'] = array();
            foreach ($actions as $action) {
                $r['actions'][] = $this->encodeAction($action);
            }
        }

        if($links = $entity->getLinks()) {
            $r['links'] = array();
            foreach ($links as $link) {
                $r['links'][] = $this->encodeLink($link);
            }
        }

        return $r;
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

    private function encodeLink(Link $link)
    {
        $l = array();
        $l['rel'] = $link->getRel();
        $l['href'] = $link->getHref();

        if ($title = $link->getTitle()) {
            $l['title'] = $title;
        }

        return $l;
    }
}
