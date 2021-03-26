<?php
// Login Page
  include "config.php";

    $email = $_POST["elogin"];
    $password = $_POST["password"];
    $manager = isset($_POST["manager"]);

    if(isset($_POST["manager"])) // Manager login
    {
      $sql_statement = "SELECT m.manager_id, m.name, m.role, m.password, m.role FROM managers m WHERE m.email = '$email' and m.password = '$password'";
      $result = mysqli_query($db, $sql_statement);
      $rows = mysqli_num_rows($result); 
      if ($rows)
      {
        $brow = mysqli_fetch_row($result);
        $_SESSION["manager_id"] = $brow[0];
        $_SESSION["name"] = $brow[1];
        if($brow[2] == "product-manager")
        {
          header("Location: table_man_product.php");
        }
        else
        {
          header("Location: table_man_sales.php");
        }  
      }
      else // entered wrong e-mail or password
      {
		$_SESSION["wrong_mail_pas"] = true;
	    $_SESSION["message"] = true;
        header("Location: index.php");
      }
    }
    else // customer login
    {
      $sql_statement = "SELECT c.customer_id, c.name, c.password, c.basket_id FROM customers c WHERE c.email = '$email' and c.password = '$password'";
      $result = mysqli_query($db, $sql_statement);
      $rows = mysqli_num_rows($result); 
      $brow = mysqli_fetch_row($result);
      $basket_id = $brow[3];
      $_SESSION["basket_id"] = $basket_id;
	  $_SESSION["id"] = $brow[0];
	  $_SESSION["name"] = $brow[1];
	  
      if ($rows) // customer entered successfully
      {
        header("Location: table.php"); 
      }
      else // entered wrong e-mail or password
      {
        $_SESSION["wrong_mail_pas"] = true;
	    $_SESSION["message"] = true;
        header("Location: index.php"); 
      } 
    }
  
?>

