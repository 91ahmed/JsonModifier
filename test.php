<?php
	
	require ('bin/JsonModifier.php');

	$json = new System\Json\JsonModifier('json/items.json');

	// 
	$update = $json->index('items')
				 ->update(
					 array('item_id', '3'),
					 array(
					 	['item_unitprice' => '224.50'],
					 	['item_color' => '#fff']
					 )
				 );

	// 
	$data = $json->index('items')
				 ->search(['item_id' => '3'])
				 ->get();

    var_dump($data);
?>