<?php

use Siren\Components\Field as F;
use Siren\Components\Action as A;
use Siren\Encoders\Encoder as E;

class ActionEncoderTest extends PHPUnit_Framework_TestCase
{
    public function testNameValidation()
    {
        $this->setExpectedException("InvalidArgumentException");
        $e = (new E)->action(); 
        $e->encode(new A);
    }
    
    public function testHrefValidation()
    {
        $this->setExpectedException("InvalidArgumentException");
        $e = (new E)->action(); 
        $e->encode((new A)->setName("test-action"));
    }
}
