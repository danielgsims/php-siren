<?php

    require_once "vendor/autoload.php";
    use Siren\Components\Entity;
    use Siren\Components\Link;
    use Siren\Components\Action;
    use Siren\Components\Field;
    use Siren\Encoders\Encoder;

    $order = new Entity();
    $order->addClass("order")
           ->setProperties(array(
                "orderNumber" => 42,
                "itemCount" => 3,
                "status" => "pending"
            ));

    $items = new Entity;
    $items->addClass("items")
          ->addClass("collection")
          ->addRel("http://x.io/rels/order-items")
          ->setHref("http://api.x.io/orders/42/items");

    $order->addEntity($items);

    $customerInfo = new Entity;
    $customerInfo->addClass("info")
                 ->addClass("customer")
                 ->addRel("http://x.io/rels/customer")
                 ->setHref("http://api.x.io/customer")
                 ->setProperties(array(
                    "customerId" => "pj123",
                    "name" => "Peter Joseph"
                 ));
    
    $link = new Link;
    $link->addRel("self")
         ->setHref("http://api.x.io/customers/pj123");

    $customerInfo->addLink($link);

    $order->addEntity($customerInfo);

    $orderNumber = new Field;
    $orderNumber->setName("orderNumber")
                ->setType("hidden")
                ->setValue(42);

    $productCode = new Field;
    $productCode->setName("productCode");

    $quantity = new Field;
    $quantity->setName("quantity")
             ->setType("number"); 

    $action = new Action;
    $action->setName("add-item")
        ->setHref("http://api.x.io/orders/42/items")
        ->setMethod("POST")
        ->setTitle("Add Item")
        ->addField($orderNumber)
        ->addField($productCode)
        ->addField($quantity);

    $order->addAction($action);

    $self = new Link;
    $self->addRel("self")
         ->setHref("http://api.x.io/orders/42");

    $prev = new Link;
    $prev->addRel("previous")
         ->setHref("http://api.x.io/orders/41");

    $next = new Link;
    $next->addRel("next")
        ->setHref( "http://api.x.io/orders/43");

    $order->addLink($self);
    $order->addLink($prev);
    $order->addLink($next);

    $response = (new Encoder)->encode($order);

    print_r(json_encode($response, JSON_UNESCAPED_SLASHES));
