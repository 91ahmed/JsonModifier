<?php
	
	require ('../vendor/autoload.php');

	$json = new PhpJsonModifier\JsonModifier(__DIR__.'/json/items.json');
	
	// Get all items
	$data = $json->index('items')
	             ->get();

	// Update item unitprice and color where "item_id" = 3
	$update = $json->index('items')
				   ->update(
					   array('item_id', '3'), // condition (WHERE item_id = 3)
					   array(
					 	   ['item_unitprice' => '224.50'],
					 	   ['item_color' => '#fff']
					    )
				    );

	// Add new item
	$add = $json->index('items')
	            ->add([
	                "item_id" => "10",
	                "item_name" => "black shirt"
	            ]);

	// Search for items where "item_id" = 3
	$search = $json->index('items')
				   ->search(['item_id' => '3'])
				   ->get();

    var_dump($data);
?>