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
		<div class="col-lg-12 col-md-6 container" >
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
				<div style="text-align:center">
				<label class="col-md-3 text-danger" for="comment" style="margin-top:20px; font-size:15px; font-color:red" >*You can only make 1 comment*</label><br>
				</div>
				<div class="container col-md-6" >
				<form method="post" action="make_comment.php">
				<?php echo '<input id="product_id" type="hidden" name="product_id" value='.$product_id.'></input>';  ?>
					 <label class="col-md-3" for="comment" style="margin-top:20px;">Comment:</label>
					 <input class="col-md-8" id="comment" type="text" name="comment" placeholder="Enter your comment"> <br>
					 
					 <label class="col-md-3" for="rate" style="margin-top:20px;">Rate:</label>
					 <select name="rate" id="rate">
					  <option value="1">1</option>
					  <option value="2">2</option>
					  <option value="3">3</option>
					  <option value="4">4</option>
					  <option value="5">5</option>
					</select>
					<div>
					<input type="submit" id="add" value="Make Comment" class="text-light btn btn-success" name="add" type="btn-primary">
					
				</div>
				</form>
				</div>
		</div>
	</body>
</html>