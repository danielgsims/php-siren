<?php namespace Siren\Encoders;

abstract class BaseEncoder
{
    protected $factory;

    public function __construct(Encoder $factory)
    {
        $this->factory = $factory;
    }
}
