<?php
// Register Page
 include "config.php";

    echo"ikinci if\n";
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $address = $_POST["address"];
    $check_email = "SELECT c.email FROM customers c WHERE c.email = '$email'";
    $res =  mysqli_query($db, $check_email);
    if (mysqli_num_rows($res)!=0)
    {
      echo "already cust\n";
      $rows = mysqli_num_rows($res);
      
      $_SESSION['already_customer'] = true;
	  $_SESSION['message'] = true;
      header("Location: index.php"); 
     
    }
    else{ // create new customer

      $give_basket = "INSERT INTO baskets (amount) VALUES(0)";
      $res_basket = mysqli_query($db, $give_basket);
      if($res_basket)
      {
        echo "basket given\n";
      }
      echo "res_basket\n";

      $create_newb = "SELECT MAX(basket_id) as new_basket_id FROM baskets";
      $result =  mysqli_query($db, $create_newb);
      $brow = mysqli_fetch_row($result);

      $basket_id = $brow[0];
      $_SESSION["basket_id"] = $basket_id;
      echo $basket_id ;
      if($result)
      {
        echo "basket_id added cust\n";
      }

      $sql_statement = "INSERT INTO customers(name, email, password, address, basket_id) VALUES (concat('$name',' ', '$surname'), '$email', '$password', '$address', '$basket_id')";
      $result = mysqli_query($db, $sql_statement);
   
	  $sql="SELECT * FROM customers c WHERE c.basket_id = '$basket_id'";
		$result = mysqli_query($db, $sql);
		$brow = mysqli_fetch_row($result);
	   $_SESSION["id"] = $brow[0];
	   $_SESSION["name"] = $brow[1];
	   
      header("Location: no_account.php"); 

    }
 

  ?>