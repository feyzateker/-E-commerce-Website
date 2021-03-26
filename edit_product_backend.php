<?php
	 include "config.php";
	 //z
	//$db = mysqli_connect('localhost', 'root', '', 'group9');

  $product_id =  $_POST["product_id"] ;
  echo $product_id;
  $description= $_POST["description"];
  $category= $_POST["category"];
  $color= $_POST["color"];
  $size= $_POST["size"];
  $gender = $_POST["gender"]; 
  
  
  $stock= $_POST["stock"];
  $price= $_POST["price"];

  echo $description;



  $sql_u = "UPDATE products SET stock= '$stock', description='$description', category='$category', size='$size', color='$color', price='$price', gender='$gender' WHERE product_id = '$product_id';";

  $result = mysqli_query($db, $sql_u);
	echo $result;
	
	

	header("Location: table_man_product.php");
	
?>