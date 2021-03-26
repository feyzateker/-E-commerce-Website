<?php
	include "config.php";
	
	$status = $_POST["status"] ;
	$order_id = $_POST["my_order_id"];
	

	if ($status == 'Canceled')
	{
		
		$sql_p = "SELECT * FROM includes i, orders o WHERE o.order_id = $order_id and  i.basket_id = o.basket_id;";
		$result = mysqli_query($db, $sql_p);

		while($row = mysqli_fetch_assoc($result))
		{
			$product_id = $row["product_id"];
			$piece = $row["piece"];
	
			$sql_d = "SELECT * FROM products p WHERE p.product_id = $product_id;";
			$result_d = mysqli_query($db, $sql_d);
			$row_d = mysqli_fetch_assoc($result_d);
			$stock =  $row_d["stock"];
	
		
			$diff= $stock + $piece;
			$sql_dec = "UPDATE products SET stock='$diff' WHERE product_id = $product_id;";
			$result_d = mysqli_query($db, $sql_dec);
		}
	
	}

	
	$sql_u = "UPDATE orders SET status= '$status' WHERE order_id = '$order_id';";
	
	$result = mysqli_query($db,$sql_u);

	header("Location: table_man_sales.php");
	
?>