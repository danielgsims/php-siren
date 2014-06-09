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
        if ($isSubEntity) {
            $this->validateSubEntity($entity);
        }

        $response = array();

        if ($class = $entity->getClass()) {
            $response['class'] = $class;
        }

        if ($properties = $entity->getProperties()) {
            $response['properties'] = $properties;
        }

        if (!$isSubEntity && $entities = $entity->getEntities()) {
            $response['entities'] = array();

            foreach ($entities as $subEntity) {
                $response['entities'][] = $this->encodeEntity($subEntity, true);
            }
        }

        if (!$isSubEntity && $actions = $entity->getActions()) {
            $response['actions'] = array();
            foreach ($actions as $action) {
                $response['actions'][] = $this->encodeAction($action);
            }
        }

        if ($isSubEntity) {
            $response['href'] = $entity->getHref();
            $response['rel'] = $entity->getRel();
        }

        if($links = $entity->getLinks()) {
            $response['links'] = array();
            foreach ($links as $link) {
                $response['links'][] = $this->encodeLink($link);
            }
        }

        return $response;
    }

    private function encodeAction(Action $action)
    {
        $this->validateAction($action);

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

        $a['type'] = $action->getType() ?: 'text'; 

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

    private function validateSubEntity(Entity $entity)
    {
        $rel = $entity->getRel();
        if (empty($rel)) {
            throw new \Exception("Sub-entities must contain a rel");
        }

        $href = $entity->getHref();

        if (empty($href)) {
            throw new \Exception("Sub-entities must contain an href");
        }
    }

    private function validateField(Field $field)
    {
        $name = $field->getName();
        if (empty($name)) {
            throw new \Exception("Field name is required");
        }
    }

    private function validateLink(Link $link)
    {
        $name = $link->getRel();
        if (empty($name)) {
            throw new \Exception("Link rel is required");
        }

        $href = $link->getHref();
        if ( empty($href) ) {
            throw new \Exception("Link href is required");
        }
    }

    private function validateAction(Action $action)
    {
        $name = $action->getName();
        if (empty($name)) {
            throw new \Exception("Action name is required");
        }

        $href = $action->getHref();
        if ( empty($href) ) {
            throw new \Exception("Action href is required");
        }
    }
}
