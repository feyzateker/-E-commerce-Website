<?php
	 include "config.php";
	 //z
	//$db = mysqli_connect('localhost', 'root', '', 'group9');
	$basket_id = $_SESSION["basket_id"] ;
	$product_id =  $_GET["product_id"] ;
	
	$sql = "SELECT * FROM includes i WHERE i.basket_id = $basket_id  and i.product_id = $product_id ;";
	$result = mysqli_query($db, $sql);
	
	
	$row_i = mysqli_fetch_assoc($result);
	
	if($row_i)
	{
		$piece = $row_i["piece"]+1;
		echo $piece ;
		$sql_u = "UPDATE includes SET piece= '$piece' WHERE basket_id = '$basket_id' and product_id = '$product_id';";

		$result = mysqli_query($db, $sql_u);
		if($result){
		echo "done\n";}
	}
	else
	{
		echo "\nelse\n";
		echo $basket_id;
		echo $product_id;
		$sql_s = "INSERT INTO includes (basket_id,product_id, piece) VALUES ('$basket_id', '$product_id' ,1);";
		$result = mysqli_query($db, $sql_s);
		if($result){
		echo "done\n";}
	}

	header("Location: my_cart.php");
	
?>