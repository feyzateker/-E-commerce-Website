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
					<img src="balloon.png" width="30" height="30" alt="" class="d-inline-block align-top">
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
		<div class="col-lg-12" >
				<p class="lead" style="text-align:center ; color:purple; font-size:40px" ><b>MY CART</b></p>
				<table class="table table-striped table-hover">
					<thead class="thead-dark">	
						<tr>
							<th scope="col" >Category</th>
							<th scope="col" >Description</th>
							<th scope="col" >Color</th>
							<th scope="col" >Size</th>
							<th scope="col" >Gender</th>
							<th scope="col" >Price</th>
							<th scope="col" >Piece</th>
							<th scope="col" >Add to cart</th>
							<th scope="col" >Delete from cart</th>
						</tr>
					</thead>
					
					<tbody>

					<?php
						$sql = "SELECT * FROM includes i, products p WHERE p.product_id = i.product_id and i.basket_id =".$_SESSION["basket_id"] .";";
						$result = mysqli_query($db, $sql);
						
						while($row = mysqli_fetch_assoc($result))
						{
							$my_id = $row["product_id"];
							//$_SESSION["product_id"] = $my_id;
							$my_categ = $row["category"];
							$my_desc = $row["description"];
							$my_color = $row["color"];
							$my_size = $row["size"];
							$my_gender = $row["gender"];
							$my_price= $row["price"];
							$my_piece= $row["piece"];
							// button se??tiremiyorux
							echo "<tr>" . "<th>" . $my_categ . "</th>".
								"<th>" . $my_desc . "</th>".
								"<th>" . $my_color . "</th>".
								"<th>" . $my_size . "</th>".
								"<th>" . $my_gender . "</th>". 
								"<th>" . $my_price ."???". "</th>" .
								"<th>" . $my_piece . "</th>" .								
							"<th>".

							'<button type="submit" id="add" class="text-light btn btn-success" name="add" type="btn-primary">
							<a id="pressed" style="color:white" href="add.php?product_id='.$my_id.'">Add +1</a> </button>'
							. "</th>" .	"<th>" .
							'<button type="submit" id="add" class="text-light btn btn-danger" name="delete" type="btn-primary">
							<a id="pressed" style="color:white" href="delete.php?product_id='.$my_id.'">Delete -1</a> </button>'
							.
							"</th>" . "</tr>";
						}	
					?>
					</tbody>
				</table>

				<?php
					$sql = "UPDATE baskets b SET amount= (SELECT  SUM(p.price * i.piece)
					 FROM includes i, products p 
					 WHERE i.product_id = p.product_id AND i.basket_id = ".$_SESSION["basket_id"].") 
					WHERE b.basket_id = ".$_SESSION["basket_id"].";" ;
					$result = mysqli_query($db, $sql);
					
					$sql_amount= "SELECT amount FROM baskets WHERE basket_id=".$_SESSION["basket_id"].";";
					$result_amount = mysqli_query($db, $sql_amount);
					$row = mysqli_fetch_assoc($result_amount);
					$amount = $row["amount"];

					echo '<label for="amount">Total amount: </label> ';
					echo 		'<label type="text" name="amount"  id="amount">'.$amount.'???</label>  <br>';
			?>

				<form action="buy.php" method="post">
			<?php
				
			echo '<label for="destination">DESTINATION ADDRESS: </label> ';
			echo 		'<input type="textarea" name="destination"  id="destination"> <br>';

			echo 		'<label for="name">RECIPIENT: </label>';
			echo 		'<input type="text" name="name" id="name">';

			?>
	
			<div>
			<button type="submit" id="add" class="text-light btn btn-success" name="add" type="btn-primary">
							<a id="pressed" style="color:white">BUY</a> </button>
							<label style="color:red;font-size:12px">*If there is not enough stock, product will be discarded.*</label>
			</div>

			

			</form>
		</div>
	</body>
</html>