<?php

    require_once "vendor/autoload.php";
    use Siren\Components\Entity;
    use Siren\Components\Link;
    use Siren\Components\Action;
    use Siren\Components\Field;
    use Siren\Encoder;

    $order = new Entity();
    $order->setClass(array("order"));
    $order->setProperties(array(
        "orderNumber" => 42,
        "itemCount" => 3,
        "status" => "pending"
    ));

    $items = new Entity;
    $items->setClass(array("items","collection"));
    $items->setRel(array("http://x.io/rels/order-items"));
    $items->setHref(array("http://api.x.io/orders/42/items"));
    $order->addEntity($items);

    $customerInfo = new Entity;
    $customerInfo->setClass(array("info","customer"));
    $customerInfo->setRel(array("http://x.io/rels/customer"));
    $customerInfo->setProperties(array(
        "customerId" => "pj123",
        "name" => "Peter Joseph"
    ));

    $customerInfo->addLink(new Link(
        array("self"),
        "http://api.x.io/customers/pj123" 
    ));

    $order->addEntity($customerInfo);

    $fields = array();
    $fields[] = new Field(
        "orderNumber",
        "hidden",
        null,
        42
    );

    $fields[] = new Field("productCode");
    $fields[] = new Field("quantity", "number");

    $action = new Action(
        "add-item",
        "http://api.x.io/orders/42/items",
        "POST",
        "Add Item",
        null,
        null,
        $fields
    );

    $order->addAction($action);

    $links = array();
    $links[] = new Link(
        array("self"),
        "http://api.x.io/orders/42"
    );

    $links[] = new Link(
        array("previous"),
        "http://api.x.io/orders/41"
    );

    $links[] = new Link(
        array("next"),
        "http://api.x.io/orders/43"
    );

    $order->setLinks($links);

    $encoder = new Encoder;
    $response = $encoder->encode($order);

    print_r($response);
