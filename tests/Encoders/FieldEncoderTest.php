<?php

use Siren\Components\Field as F;
use Siren\Encoders\Encoder as E;

class FieldEncoderTest extends PHPUnit_Framework_TestCase
{
    public function testValidation()
    {
        $this->setExpectedException("InvalidArgumentException");
        $e = (new E)->field(); 
        $e->encode(new F);
    }

    public function testDefaultType()
    {
        $f = (new F)->setName("test-field");
        $field = (new E)->field()->encode($f);
        $expectedField = [ "name" => "test-field", "type" => "text" ];

        $this->assertEquals($expectedField,$field);
    }

    public function testFullField()
    {
        $f = (new F)->setName("test-field")
                    ->setType("hidden")
                    ->setValue("5")
                    ->setTitle("Test Field");

        $field = (new E)->field()->encode($f);
        $expectedField = [
            "name" => "test-field",
            "type" => "hidden",
            "value" => 5,
            "title" => "Test Field"
            ];

        $this->assertEquals($expectedField,$field);
    }
}
