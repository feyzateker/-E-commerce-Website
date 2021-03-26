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
		<h2>NEW PRODUCT</h2>
		<form action="new_product_add.php" method="post">  
			<?php
			 
			echo '<label class="col-md-3" for="description" style="margin-top:20px;">Product description:</label>' .
			'<input required class="col-md-8" id="description" type="text" name="description" > <br>' .
			
			'<label class="col-md-3" for="category" style="margin-top:20px;">Product category:</label>' .
			'<input required class="col-md-8" id="category" type="text" name="category"> <br>' .
			
			'<label class="col-md-3" for="size" style="margin-top:20px;">Product Size:</label>' .
			'<input required class="col-md-8" id="size" min="0" type="number" name="size"> <br>' .
			
			'<label class="col-md-3" for="color" style="margin-top:20px;">Product Color:</label>' .
      '<input required class="col-md-8" id="color" type="text" name="color"> <br>' .
      
      '<label class="col-md-3" for="price" style="margin-top:20px;">Product Price:</label>' .
      '<input required class="col-md-8" id="price" type="number" min="0" name="price">' .
      '<label for="price" style="margin-top:20px;">₺</label> <br>' .

      '<label class="col-md-3" for="gender" style="margin-top:20px;">Product Gender:</label>' .
      ' <select class="col-md-8" name="gender" id="gender" form="gender">
        <option value="Woman">Woman</option>
        <option value="Man">Man</option>
        <option value="Girl">Girl</option>
        <option value="Boy">Boy</option>
      </select> <br>'  .
      
      '<label class="col-md-3" for="stock" style="margin-top:20px;">Product Stock:</label>' .
      '<input required class="col-md-8" id="stock" min="0" type="number" name="stock"> <br>' 
      
      ;
			echo '<div class="container">';
			echo '<button type="submit" href="new_product_add" class="btn btn-success col-md-4" style="margin-top:20px">SAVE CHANGES</button>';
			echo '</form>';
			
?>		
		<form action="table_man_product.php">
			<button type="submit"  class="btn btn-danger col-md-4" style="margin-top:20px">CANCEL</button>
		</form>
		</div></div>
		</div>
		</div>
	</body>
</html>