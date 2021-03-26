<?php
	 include "config.php";
	 //z
	//$db = mysqli_connect('localhost', 'root', '', 'group9');

	$product_id =  $_GET["product_id"] ;
	
	$sql = "SELECT * FROM products p WHERE p.product_id = $product_id ;";
	$result = mysqli_query($db, $sql);
	
	
	$row_i = mysqli_fetch_assoc($result);
	

  $piece = $row_i["stock"] + 1;
  $sql_u = "UPDATE products SET stock= '$piece' WHERE product_id = '$product_id';";

  $result = mysqli_query($db, $sql_u);
		
	
	

	header("Location: table_man_product.php");
	
?>