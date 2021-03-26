<?php
	 include "config.php";
	 //z
	//$db = mysqli_connect('localhost', 'root', '', 'group9');
	
	$my_id =  $_SESSION["manager_id"] ;
	
	$my_name = $_POST["name"];
	$my_pass = $_POST["pass"];
	
	echo $my_name;
	$sql_u = "UPDATE managers SET name= '$my_name', password='$my_pass' WHERE manager_id = '$my_id';";
	
	$result = mysqli_query($db,$sql_u);

	$_SESSION["name"] = $my_name;
	header("Location: my_account_man.php");
	
?>