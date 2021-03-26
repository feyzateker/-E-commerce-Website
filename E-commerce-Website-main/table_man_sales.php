<?php
	 include "config.php";
	 //z
	?>
<!doctype html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>SUHOES</title>
		<meta name="description" content="Bootstrap Recitation">
		<meta name="author" content="CS306-201802">
		
		<! Bootstrap files >
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</head>
	
	<body>
		<nav class="navbar navbar-expand-lg navbar-light dg-light">
			<div class="container">
				<a href="table_man_sales.php" class="navbar-brand">
					<img src="balloon.png" width="30" height="30" alt="" class="d-inline-block align-top">
				<b>	SUHOES</b>
				</a>
				
				<!responsive design>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"> </span>
				</button>

				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav mr-auto" >
					<li class="nav-item active"><a class="nav-link" href="table_man_sales.php">Orders</a></li>
					</ul>


					<span class="navbar-text">
						<ul  class="navbar-nav mr-auto">
							<li class="nav-item active"><a class="nav-link" href="my_account_man.php">My Account</a></li>
							<li class="nav-item active"><a class="nav-link" href="logout.php">Logout</a></li>
						</ul>	
					</span>

				</div>
				
				<?php
					echo $_SESSION["name"];
				?>


				
			</div>
		</nav>
		<div class="col-lg-12" >
				<p class="lead" style="text-align:center ; color:purple; font-size:40px" ><b>ORDERS</b></p>
				<table class="table table-striped table-hover">
					<thead class="thead-dark">	
						<tr>
							<th scope="col" >Status</th>
							<th scope="col" >Date</th>
							<th scope="col" >Invoice</th>
							<th scope="col" >See products</th>
							<th scope="col" >Edit Status</th>
						</tr>
					</thead>
					
					<tbody>

					<?php
						$sql = "SELECT * FROM orders o WHERE o.status != 'Canceled';";
						$result = mysqli_query($db, $sql);
						

						while($row = mysqli_fetch_assoc($result))
						{
							$row_order_id = $row["order_id"];
							$sql_b = "SELECT * FROM orders o, baskets b WHERE o.basket_id = b.basket_id and o.order_id = $row_order_id ;";
							$result_b = mysqli_query($db, $sql_b);
							$row_b = mysqli_fetch_assoc($result_b);
							
							$my_status = $row["status"];
							$my_date = $row["date"];
							
							$my_invoice= $row_b["amount"];
							// button seçtiremiyorux
							echo "<tr>" . "<th>" . $my_status . "</th>".
								"<th>" . $my_date . "</th>".
								"<th>" . $my_invoice . "₺</th>". 
							"<th>".
							'<button type="submit" id="detail" class="text-light btn btn-primary" name="detail" type="btn-primary">
							<a id="pressed" style="color:white" href="order_pro_man.php?row_order_id='.$row_order_id.'">See in detail</a> </button>'

							. "</th>" ."<th>".
							'<button type="submit" id="detail" class="text-light btn btn-primary" name="detail" type="btn-primary">
							<a id="pressed" style="color:white" href="edit_order.php?order_id='.$row_order_id.'">Edit</a> </button>'

							. "</th>" .	"</tr>";
						}	
					?>
					</tbody>
				</table>
		</div>
	</body>
</html>