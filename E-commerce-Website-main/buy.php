<?php
  include "config.php";
  $check= false;
  $basket_id = $_SESSION["basket_id"] ;
  $name = $_POST["name"];
  $destination = $_POST["destination"];

// find the customer's id
  $sql_c = "SELECT c.customer_id FROM customers c WHERE c.basket_id = $basket_id;";
  $customer = mysqli_query($db, $sql_c);
  $cust = mysqli_fetch_assoc($customer);
  $customer_id = $cust["customer_id"];
echo $customer_id."\n";

// get all products inside the basket
  $sql_p = "SELECT * FROM includes i WHERE i.basket_id = $basket_id;";
  $result = mysqli_query($db, $sql_p);
	
	
//Decrement stock of the products
  while($row = mysqli_fetch_assoc($result))
  {
    $product_id = $row["product_id"];
    $piece = $row["piece"];

    $sql_d = "SELECT * FROM products p WHERE p.product_id = $product_id;";
    $result_d = mysqli_query($db, $sql_d);
    $row_d = mysqli_fetch_assoc($result_d);
    $stock =  $row_d["stock"];

    if($stock >= $piece) // enough stock
    {
      $diff= $stock - $piece;
      $sql_dec = "UPDATE products SET stock='$diff' WHERE product_id = $product_id;";
      $result_d = mysqli_query($db, $sql_dec);
	  $check = true;
    }
    else // not enough stock
	{
      $sql_del = "DELETE FROM includes WHERE basket_id = $basket_id;";
      $result_d = mysqli_query($db, $sql_del);
    }
  }

  //calculate invoice
  $sql = "UPDATE baskets b SET amount= (SELECT  SUM(p.price * i.piece)
					 FROM includes i, products p 
					 WHERE i.product_id = p.product_id AND i.basket_id = ".$_SESSION["basket_id"].") 
					WHERE b.basket_id = ".$_SESSION["basket_id"].";" ;
  $result = mysqli_query($db, $sql);
  
  $sql_amount= "SELECT amount FROM baskets WHERE basket_id=".$_SESSION["basket_id"].";";
  $result_amount = mysqli_query($db, $sql_amount);
  $row = mysqli_fetch_assoc($result_amount);
  $amount = $row["amount"];

// create the order
  if($check){
	  echo $customer_id."\n";
	   echo $basket_id."\n";  echo $destination."\n";  echo $name."\n";
    $sql = "INSERT INTO orders (customer_id, basket_id, status, date, destination, Recipient ) VALUES('$customer_id', '$basket_id', 'Pending', NOW() , '$destination', '$name');";
    $res_basket = mysqli_query($db, $sql);
    
	if($res_basket)
		echo "insert order done \n";

    //Update basket
    $give_basket = "INSERT INTO baskets (amount) VALUES(0)";
    $res_basket = mysqli_query($db, $give_basket);
    if($res_basket)
		echo "update basket done \n";
    $create_newb = "SELECT MAX(basket_id) as new_basket_id FROM baskets";
    $result =  mysqli_query($db, $create_newb);
	if($result)
		echo "select max basket done \n";
    $brow = mysqli_fetch_row($result);
    $basket_id = $brow[0];
    $_SESSION["basket_id"] = $basket_id;

    //Update cust table
    $sql_basket = "UPDATE customers SET basket_id = '$basket_id' WHERE customer_id='$customer_id'";
    $res_basket = mysqli_query($db, $sql_basket);
	if($result)
		echo "update cust table done \n";
  }

	header("Location: orders.php");
?>