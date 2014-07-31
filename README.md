#Siren#

"Siren is a hypermedia specification for representing entities. 
As HTML is used for visually representing documents on a Web site,
Siren is a specification for presenting entities via a Web API." 

You can read more about Siren and see examples at the [official github repo](https://github.com/kevinswiber/siren)

#PHP-Siren#

This library is designed to help create valid Siren responses for your Hypermedia API with an object
oriented approach. The PHP Siren library consists of components which represent
the data structures in Siren (entities, links, actions, fields) and an Encoder which serializes
these structures into Siren+JSON. 

#What PHP Siren does not cover#

This library only helps to create the response body. The other asspects of
the HTTP Response, such as headers, are outside of the scope of this library.

#Example

```
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
```

Example output

```
{
    "class": [
        "order"
    ],
    "properties": {
        "orderNumber": 42,
        "itemCount": 3,
        "status": "pending"
    },
    "entities": [
        {
            "href": "http://api.x.io/orders/42/items",
            "rel": [
                "http://x.io/rels/order-items"
            ],
            "class": [
                "items",
                "collection"
            ]
        },
        {
            "href": "http://api.x.io/customer",
            "rel": [
                "http://x.io/rels/customer"
            ],
            "class": [
                "info",
                "customer"
            ],
            "properties": {
                "customerId": "pj123",
                "name": "Peter Joseph"
            },
            "links": [
                {
                    "rel": [
                        "self"
                    ],
                    "href": "http://api.x.io/customers/pj123"
                }
            ]
        }
    ],
    "actions": [
        {
            "name": "add-item",
            "href": "http://api.x.io/orders/42/items",
            "method": "POST",
            "title": "Add Item",
            "type": "application/x-www-form-urlencoded",
            "fields": [
                {
                    "name": "orderNumber",
                    "type": "hidden",
                    "value": "42"
                },
                {
                    "name": "productCode",
                    "type": "text"
                },
                {
                    "name": "quantity",
                    "type": "number"
                }
            ]
        }
    ],
    "links": [
        {
            "rel": [
                "self"
            ],
            "href": "http://api.x.io/orders/42"
        },
        {
            "rel": [
                "previous"
            ],
            "href": "http://api.x.io/orders/41"
        },
        {
            "rel": [
                "next"
            ],
            "href": "http://api.x.io/orders/43"
        }
    ]
}
```

--------------------------------------------------
![Devtroit](http://devtroit.com/img/badges/badge-medium.png)

Proudly built in Detroit
