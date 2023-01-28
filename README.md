## JsonModifier
JsonModifier was created to help php developers modify Json files by performing **_CRUD_** and data lookup operations.

> __Note:__ To avoid any errors the JSON file you need to process should have a valid format, like the following example.
``` json
[
   {
      "items":[
         {
            "id":"1",
            "name":"original t-shirt",
            "unitprice":"240.00"
         },
         {
            "id":"2",
            "name":"Cotton Polo Shirt",
            "unitprice":"123.00"
         }
      ]
   }
]
```

### Install
via composer
```
composer require jsoncontrol/php-json-control:dev-main
```

### How to Use
``` php
// Import vendor/autoload file
require ('vendor/autoload.php');

// Create new instance
// The construct method take one argument which is the JSON file path.
$json = new PhpJsonModifier\JsonModifier('json/items.json');

// Start performing your operations.
$data = $json->index('items')
             ->get();
```

> Retrieve all data from json file.
``` php
$data = $json->index('items')
             ->get();
```

> Update data.
``` php
// Update item unitprice and color where "item_id" = 3
$update = $json->index('items')
               ->update(
                   array('item_id', '3'), // condition (WHERE item_id = 3)
                   array(
                        ['item_unitprice' => '224.50'],
                        ['item_color' => '#fff']
                   )
);
```

> Add new object.
``` php
// Add new item
$add = $json->index('items')
            ->add([
                "item_id" => "10",
                "item_name" => "black shirt"
            ]);
```

> Search for all items.
``` php
// Search for items where "item_id" = 3
$search = $json->index('items')
               ->search(['item_id' => '3']) // condition (WHERE item_id = 3)
               ->get();
```

> Search first to get single item.
``` php
// Search for items where "item_id" = 3
$search = $json->index('items')
               ->search(['item_id' => '2']) // condition (WHERE item_id = 3)
               ->first();
```