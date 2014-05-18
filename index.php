<?php

    require_once "vendor/autoload.php";

    $l = new Siren\Components\Link(
        array("self"),
        "http://test.com/api",
        "Index"
    );

    $en = new Siren\Components\Entity();
    $en->setClass(array("order"));
    $en->setProperties(array(
        'orderNumber'=> 42,
        'itemCount'=> 3,
        'status'=> "pending"
    )); 

    $f = new Siren\Components\Field("product");
    $a = new Siren\Components\Action(
        "add-item",
        "http://mysite.com/items",
        "POST",
        "Add Item",
        array(),
        null,
        array($f)
    );

    $en->addAction($a);

    $e = new Siren\Encoder;
    print_r($e->encode($en));
