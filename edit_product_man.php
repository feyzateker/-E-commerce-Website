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
		<h2>EDIT PRODUCT</h2>
    <form action="edit_product_backend.php" method="post"> 
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
         $my_stock= $row["stock"];

      echo'<input class="col-md-8" id="product_id"  value='.$product_id.' type="hidden" name="product_id" > ' ;

      echo '<label class="col-md-3" for="description" style="margin-top:20px;">Product description:</label>' .
			'<input class="col-md-8" id="description"  value='.$my_desc.' type="text" name="description" > <br>' .
			
			'<label class="col-md-3" for="category" style="margin-top:20px;">Product category:</label>' .
			'<input class="col-md-8" id="category"  value='.$my_categ.' type="text" name="category"> <br>' .
			
			'<label class="col-md-3" for="size" style="margin-top:20px;">Product Size:</label>' .
			'<input class="col-md-8" id="size"  value='.$my_size.' min="0" type="number" name="size"> <br>' .
			
			'<label class="col-md-3" for="color" style="margin-top:20px;">Product Color:</label>' .
      '<input class="col-md-8" id="color"  value='.$my_color.' type="text" name="color"> <br>' .
      
      '<label class="col-md-3" for="price" style="margin-top:20px;">Product Price:</label>' .
      '<input class="col-md-8" id="price"  value='.$my_price.' type="number" min="0" name="price">' .
      '<label for="price" style="margin-top:20px;">₺</label> <br>' .

			// '<label class="col-md-3" for="gender" style="margin-top:20px;">Product Gender:</label>
			// <label class="col-md-3" for="gender" style="margin-top:20px;">'.$my_gender.'</label>' .
			'<br>'.
      '<label class="col-md-3" for="gender" style="margin-top:20px;">Product Gender:</label>' .
			' <select class="col-md-8" name="gender" id="gender">
					<option value='.$my_gender.'>'.$my_gender.'</option>
          <option value="Woman">Woman</option>
          <option value="Man">Man</option>
           <option value="Girl">Girl</option>
           <option value="Boy">Boy</option>
       </select> <br>'  .
      
      '<label class="col-md-3" for="stock" style="margin-top:20px;">Product Stock:</label>' .
      '<input class="col-md-8" id="stock"  value='.$my_stock.' min="0" type="number" name="stock"> <br>' 
      
      ;
			echo '<div class="container">';
			echo '<button type="submit" id="add" class="text-light btn btn-success" name="add" type="btn-primary">
      <a id="pressed" style="color:white" >Save Changes</a> </button>';
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