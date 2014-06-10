<?php namespace Siren\Encoders;

abstract class BaseEncoder
{
    protected $factory;

    public function __construct(EncoderFactory $factory)
    {
        $this->factory = $factory;
    }
}
