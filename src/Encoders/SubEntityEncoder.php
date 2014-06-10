<?php namespace Siren\Encoders;

use Siren\Components\Entity;

class SubEntityEncoder extends BaseEncoder
{
    public function encode(Entity $entity)
    {
        $this->validateSubEntity($entity);

        $response = array();

        $response['href'] = $entity->getHref();
        $response['rel'] = $entity->getRel();

        if ($class = $entity->getClass()) {
            $response['class'] = $class;
        }

        if ($properties = $entity->getProperties()) {
            $response['properties'] = $properties;
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


}
