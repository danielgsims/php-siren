<?php
use Siren\Components\Link as L;
use Siren\Encoders\EncoderFactory as E;

class LinkEncoderTest extends PHPUnit_Framework_TestCase
{
    public function testRelValidation()
    {
        $this->setExpectedException("InvalidArgumentException");
        $e = (new E)->link(); 
        $e->encode(new L);
    }

    public function testHrefValidation()
    {
        $this->setExpectedException("InvalidArgumentException");
        $e = (new E)->link(); 
        $e->encode((new L)->addRel("self"));
    } 

    public function testMinLink()
    {
        $e = (new E)->link(); 
        $l = (new L)->addRel("self")->setHref("http://testapi.com/api/");
        $link = $e->encode($l);
        $data = [
            "rel" => ["self"],
            "href" => "http://testapi.com/api/"
        ];

        $this->assertEquals($data,$link);
    }

    public function testFullLink()
    {
        $e = (new E)->link(); 
        $l = (new L)->addRel("self")
            ->setHref("http://testapi.com/api/")
            ->setTitle("Index");

            
        $link = $e->encode($l);
        $data = [
            "rel" => ["self"],
            "href" => "http://testapi.com/api/",
            "title" => "Index"
        ];

        $this->assertEquals($data,$link);


    }
}

