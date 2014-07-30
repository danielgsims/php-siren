<?php namespace Siren\Encoders;

use Siren\Components\Entity;

class Encoder
{
    public function entity()
    {
        return new  EntityEncoder($this);
    }

    public function subEntity()
    {
        return new SubEntityEncoder($this);
    }

    public function action()
    {
        return new ActionEncoder($this);
    }

    public function field()
    {
        return new FieldEncoder($this);
    }

    public function link()
    {
        return new LinkEncoder($this);
    }

    public function encode(Entity $entity)
    {
        return $this->entity()->encode($entity);
    }
}
