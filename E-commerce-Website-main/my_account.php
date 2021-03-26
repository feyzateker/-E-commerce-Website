<?php
	 include "config.php";
	 //z
	 if(!isset($_SESSION["id"]))
	 {
		$_SESSION["msg_noacc"] = true;
		 
		 header("Location: table.php");
	 }
	
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
		<div>
		<br>
		<div class=" justify-content-md-center">
		<div style="text-align:center;" class="container text-center col-md-8 container">
		<h2>MY ACCOUNT</h2>
		<form action="change_acc.php" method="post">  
			<?php
				$sql = "SELECT * FROM customers c WHERE c.customer_id = ".$_SESSION["id"] .";";
				$result = mysqli_query($db,$sql);
				$row = mysqli_fetch_assoc($result);
				
				$my_name = $row["name"];
				$my_email = $row["email"];
				$my_pass = $row["password"];
				$my_address = $row["address"];
			
			echo '<label class="col-md-3" for="name" style="margin-top:20px;">NAME:</label>' .
			'<input class="col-md-8" id="name" type="text" name="name" value="'.$my_name.'"> <br>' .
			
			'<label class="col-md-3" for="email" style="margin-top:20px;">EMAIL:</label>' .
			'<label class="col-md-8" id="email" type="text" name="email">'.$my_email.'</label> <br>' .
			
			'<label class="col-md-3" for="pass" style="margin-top:20px;">PASSWORD:</label>' .
			'<input class="col-md-8" id="pass" type="password" name="pass" value="'.$my_pass.'"> <br>' .
			
			'<label class="col-md-3" for="address" style="margin-top:20px;">ADDRESS:</label>' .
			'<input class="col-md-8" id="address" type="text-area" name="address" value="'.$my_address.'"> <br>' ;
			echo '<div class="container">';
			echo '<button type="submit" href="change_acc" class="btn btn-success col-md-4" style="margin-top:20px">SAVE CHANGES</button>';
			echo '</form>';
			
?>		
		<form action="my_account.php">
			<button type="submit"  class="btn btn-danger col-md-4" style="margin-top:20px">CANCEL</button>
		</form>
		<form action="orders.php">
			<button type="submit" href="orders.php" class="btn btn-primary col-md-4" style="margin-top:20px">My Orders</button>
		</form>
		</div></div>
		</div>
		</div>
	</body>
</html>