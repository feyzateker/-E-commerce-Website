<?php
	 include "config.php";
	 //z
	$basket_id = $_SESSION["basket_id"] ;
	$product_id =  $_GET["product_id"] ;
	
	$sql = "SELECT * FROM includes i WHERE i.basket_id = $basket_id  and i.product_id = $product_id ;";
	$result = mysqli_query($db, $sql);
	
	
	$row_i = mysqli_fetch_assoc($result);
	
	$piece = $row_i["piece"];
	echo "piece: ". $piece ."\n";
	
	if($piece == 1)
	{
		echo "basket_id: " . $basket_id ."\n";
		echo "pro_id: " . $product_id."\n";
		$sql_del = "DELETE FROM includes WHERE basket_id = '$basket_id' AND product_id = '$product_id' ;";
		mysqli_query($db, $sql_del);
	}
	else
	{
		$piece = $piece -1;
		$sql_u = "UPDATE includes SET piece= '$piece' WHERE basket_id = '$basket_id' and product_id = '$product_id';";
		$result = mysqli_query($db, $sql_u);
	}

	header("Location: my_cart.php");
	
?>