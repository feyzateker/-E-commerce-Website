<?php
  include "config.php";


  $description= $_POST["description"];
  $category= $_POST["category"];
  $color= $_POST["color"];
  $size= $_POST["size"];
  $gender= $_POST["gender"];
  $stock= $_POST["stock"];
  $price= $_POST["price"];


  $sql = "INSERT INTO products (description, category, color, size, gender, stock, price) VALUES('$description', '$category', '$color', '$size', '$gender', '$stock', '$price' );";
  $result = mysqli_query($db, $sql);

  header("Location: table_man_product.php");


?>