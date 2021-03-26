<?php
	 include "config.php";
	 //z
	$customer_id = $_SESSION["id"];
	$product_id =  $_POST["product_id"] ;
	
	$comment = $_POST["comment"];
	$rate = $_POST["rate"];
	echo $customer_id . " " . $product_id . " " . $comment . " " . $rate ;
	$sql = "INSERT INTO comment_order (product_id, customer_id, comments, rate) VALUES ('$product_id','$customer_id', '$comment','$rate');";
	$result = mysqli_query($db, $sql);
	
	header("Location: orders.php");
	
?>