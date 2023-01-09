## JsonModifier
JsonModifier was created to help php developers modify Json files by performing **_CRUD_** and data lookup operations.

> __Note:__ The file should have a valid JSON format like the following example.
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

#### How to Use
``` php
// Import JsonModifiler file
require ('bin/JsonModifier.php');

// Create new instance
// The construct method take one argument which is the JSON file location.
$json = new System\Json\JsonModifier('json/items.json');

// Start performing your operations.
$data = $json->index('items')
             ->get();
```

##### Get all data
``` php
// Retrieve all data from json file
$data = $json->index('items')
             ->get();
```

##### Update
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

##### Add
``` php
// Add new item
$add = $json->index('items')
            ->add([
                "item_id" => "10",
                "item_name" => "black shirt"
            ]);
```

##### Search
``` php
// Search for items where "item_id" = 3
$search = $json->index('items')
               ->search(['item_id' => '3']) // condition (WHERE item_id = 3)
               ->get();
```

##### Search First
> to get single item.
``` php
// Search for items where "item_id" = 3
$search = $json->index('items')
               ->search(['item_id' => '2']) // condition (WHERE item_id = 3)
               ->first();
```