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
				<a href="table_man_product.php" class="navbar-brand">
					<img src="heels.jpg" width="30" height="30" alt="" class="d-inline-block align-top">
					<b> SUHOES</b>
				</a>
				
				<!responsive design>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"> </span>
				</button>

				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav mr-auto" >
						<li class="nav-item active"><a class="nav-link" href="table_man_product.php">Products</a></li>
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
		<div>
		<br>
		<div class=" justify-content-md-center">
		<div style="text-align:center;" class="container text-center col-md-8 container">
		<h2>MY ACCOUNT</h2>
		<form action="change_acc_man.php" method="post">  
			<?php
			    $my_id = $_SESSION["manager_id"] ;
				$sql = "SELECT * FROM managers m WHERE m.manager_id= $my_id ;";
				$result = mysqli_query($db,$sql);
				$row = mysqli_fetch_assoc($result);
				
				$my_name = $row["name"];
				$my_email = $row["email"];
				$my_pass = $row["password"];
				$role = $row["role"];
			
			echo '<label class="col-md-3" for="name" style="margin-top:20px;">NAME:</label>' .
			'<input class="col-md-8" id="name" type="text" name="name" value="'.$my_name.'"> <br>' .
			
			'<label class="col-md-3" for="email" style="margin-top:20px;">EMAIL:</label>' .
			'<label class="col-md-8" id="email" type="text" name="email">'.$my_email.'</label> <br>' .
			
			'<label class="col-md-3" for="pass" style="margin-top:20px;">PASSWORD:</label>' .
			'<input class="col-md-8" id="pass" type="password" name="pass" value="'.$my_pass.'"> <br>' .
			
			'<label class="col-md-3" for="role" style="margin-top:20px;">ROLE:</label>' .
			'<label class="col-md-8" id="role" type="text" name="role">'.$role.'</label> <br>' ;
			echo '<div class="container">';
			echo '<button type="submit" href="change_acc_man" class="btn btn-success col-md-4" style="margin-top:20px">SAVE CHANGES</button>';
			echo '</form>';
			
?>		
		<form action="my_account_man.php">
			<button type="submit"  class="btn btn-danger col-md-4" style="margin-top:20px">CANCEL</button>
		</form>
		</div></div>
		</div>
		</div>
	</body>
</html>