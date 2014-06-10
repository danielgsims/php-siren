<?php namespace Siren\Encoders;

use Siren\Contracts\EncoderInterface;
use Siren\Components\Entity;

class EntityEncoder extends BaseEncoder
{
    public function encode(Entity $entity)
    {

        $response = array();

        if ($class = $entity->getClass()) {
            $response['class'] = $class;
        }

        if ($properties = $entity->getProperties()) {
            $response['properties'] = $properties;
        }

        if ($entities = $entity->getEntities()) {

            $response['entities'] = array();
            $subEntityEncoder = $this->factory->subEntity();

            foreach ($entities as $subEntity) {
                $response['entities'][] = $subEntityEncoder->encode($subEntity);
            }
        }

        if ($actions = $entity->getActions()) {

            $response['actions'] = array();
            $actionEncoder = $this->factory->action();

            foreach ($actions as $action) {
                $response['actions'][] = $actionEncoder->encode($action);
            }
        }


        if($links = $entity->getLinks()) {
            $response['links'] = array();
            $linkEncoder = $this->factory->link();

            foreach ($links as $link) {
                $response['links'][] = $linkEncoder->encode($link);
            }
        }

        return $response;
    }
}
