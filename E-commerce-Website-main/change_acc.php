<?php
	 include "config.php";
	 //z
	//$db = mysqli_connect('localhost', 'root', '', 'group9');
	
	$basket_id = $_SESSION["basket_id"] ;
	$my_id =  $_SESSION["id"] ;
	
	$my_name = $_POST["name"];
	$my_email = $_POST["email"];
	$my_pass = $_POST["pass"];
	$my_address = $_POST["address"];
	echo $my_name;
	$sql_u = "UPDATE customers SET name= '$my_name', email = '$my_email', password='$my_pass', address = '$my_address' WHERE customer_id = '$my_id';";
	
	$result = mysqli_query($db,$sql_u);

	$_SESSION["name"] = $my_name;
	header("Location: my_account.php");
	
?>