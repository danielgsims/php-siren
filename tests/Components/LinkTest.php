<?php

use Siren\Containers\Link;

class LinkTest extends PHPUnit_Framework_TestCase
{
    public function testOkLink()
    {
        $rels = array("next");
        $href = "http://api.x.io/orders/43";
        $title = "Next Item";

        $l = new Link($rels, $href, $title);
        $this->assertEquals($rels, $l->getRel());
        $this->assertEquals($href, $l->getHref());
        $this->assertEquals($title, $l->getTitle());

        $l = new Link($rels,$href);
        $this->assertEquals($rels, $l->getRel());
        $this->assertEquals($href, $l->getHref());
        $this->assertEquals(null, $l->getTitle());
    }

    public function testExceptionForNonStringableRel()
    {
        $rels = array(new DateTime());
        $href = "http://api.x.io/orders/43";

        $l = new Link($rels,$href);
    }
}
