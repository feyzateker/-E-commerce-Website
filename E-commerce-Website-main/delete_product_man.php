<?php
	 include "config.php";
	 //z

	$product_id =  $_GET["product_id"] ;
	
	$sql = "SELECT * FROM products p WHERE p.product_id = $product_id ;";
	$result = mysqli_query($db, $sql);
	
	
	$row_i = mysqli_fetch_assoc($result);
	
	$stock = $row_i["stock"];
	
	if($stock == 1)
	{
	
		$sql_del = "DELETE FROM products WHERE product_id = '$product_id' ;";
		mysqli_query($db, $sql_del);
	}
	else
	{
		$stock = $stock -1;
		$sql_u = "UPDATE products SET stock= '$stock' WHERE product_id = '$product_id';";
		$result = mysqli_query($db, $sql_u);
	}

	header("Location: table_man_product.php");
	
?>