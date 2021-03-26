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
				<a href="table.php" class="navbar-brand">
					<img src="heels.jpg" width="30" height="30" alt="" class="d-inline-block align-top">
					<b> SUHOES</b>
				</a>
				
				<!responsive design>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"> </span>
				</button>

				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav mr-auto" >
						<li class="nav-item active"><a class="nav-link" href="table.php">Home</a></li>
						<li class="nav-item active"><a class="nav-link" href="women.php">Women</a></li>
						<li class="nav-item active"><a class="nav-link" href="men.php">Men</a></li>
						<li class="nav-item active"><a class="nav-link" href="child.php">Child</a></li>
					</ul>


					<span class="navbar-text">
						<ul  class="navbar-nav mr-auto">
							<li class="nav-item active"><a class="nav-link" href="my_cart.php">My Cart</a></li>
							<li class="nav-item active"><a class="nav-link" href="my_account.php">My Account</a></li>
							<li class="nav-item active"><a class="nav-link" href="logout.php">Logout</a></li>
						</ul>	
					</span>

				</div>
				
				<?php
					echo $_SESSION["name"];
				?>

			</div>
		</nav>
	<div class="row justify-content-md-center" style=" margin-top:30px">
      <div class="container text-center">
	  
			<div style="float:left;width:30%" class="col col-lg-12 col-md-8 container" >
			<h2 style="margin-bottom:35px">PROPERTIES</h2>
					<?php
					$product_id = $_GET["product_id"];
					$sql = "SELECT * FROM products p WHERE p.product_id=$product_id;";
					$result = mysqli_query($db, $sql);
					$row = mysqli_fetch_assoc($result);
					$my_categ = $row["category"];
					$my_desc = $row["description"];
					$my_color = $row["color"];
					$my_size = $row["size"];
					$my_gender = $row["gender"];
					$my_price= $row["price"];
					
					echo '<p>Category: '.$my_categ.'  </p>';
					echo '<p>Description: '.$my_desc.'  </p>';		
					echo '<p>Color: '.$my_color.'  </p>';
					echo '<p>Size: '.$my_size.'  </p>';
					echo '<p>Gender:  '.$my_gender.'  </p>';
					echo '<p>Price:  '.$my_price.'  </p>';
					?>
					</div>
			<div class="col col-md-8" style="float:right;width:70%;">
				<p class="lead" style="text-align:center ; color:purple; font-size:40px" ><b>COMMENTS - RATES</b></p>
				<table class="table table-striped table-hover">
					<thead class="thead-dark">	
						<tr>
							<th scope="col" >Customer Name</th>
							<th scope="col" >Comment</th>
							<th scope="col" >Rate</th>
						</tr>
					</thead>
					
					<tbody>

					<?php
					$product_id = $_GET["product_id"];
					
						$sql = "SELECT c.name, co.comments, co.rate FROM comment_order co, customers c WHERE co.product_id = $product_id AND co.customer_id = c.customer_id;";
						$result = mysqli_query($db, $sql);
						
						while($row = mysqli_fetch_assoc($result))
						{
							$my_id = $product_id;
							$name = $row["name"];
							$comment= $row["comments"];
							$rate = $row["rate"];
							
							echo "<tr>" . "<th>" . $name . "</th>".
								"<th>" . $comment . "</th>".
								"<th>" . $rate . "</th>".
							"</tr>";
						}	
					?>
					</tbody>
				</table>
				</div>
	
		</div>
    </div>
	</body>
</html>