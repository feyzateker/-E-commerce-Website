<?php
	 include "config.php";
	 //z
	 if(	isset($_SESSION["msg_noacc"] ))
{
	echo '<script>alert("You do not have an account.")</script>';
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
		<link rel="shortcut icon" type="image/ico" href="heels.jpg">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</head>
	
	<body>
		<nav class="navbar navbar-expand-lg navbar-light dg-light">
		<?php # navbar-dark bg-secondary"> ?>
			<div class="container">
				<a href="table.php" class="navbar-brand">
					<img src="heels.jpg" width="30" height="30" alt="" class="d-inline-block align-top">
					<b>SUHOES</b>
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
		<form action="table.php"  method="post">
			<label for="search"><b>Search: </b></label>
			<input type="search" id="search" name="search">
	<br>
	
		<label  for="sort" ><b>Sort by: </b></label> 
       <select class="col-md-2" name="sort" id="sort" >
			 <option value="recommended">recommended</option>
        <option value="price">price</option>
        <option value="size">size</option>
        <option value="description">description</option>
        <option value="category">category</option>
				<option value="color">color</option>
      </select> 
			<input type="submit" value="SUBMIT" class="btn" style="background-color:#a76fe3;color:white;">

		</form>
				<p class="lead" style="text-align:center ; color:purple; font-size:40px" ><b>Products</b></p>
				<table class="table table-striped table-hover">
					<thead class="thead-dark">	
						<tr>
							<th scope="col" >Category</th>
							<th scope="col" >Description</th>
							<th scope="col" >Color</th>
							<th scope="col" >Size</th>
							<th scope="col" >Gender</th>
							<th scope="col" >Price</th>
							<th scope="col" >Add to cart</th>
							<th scope="col" >Comments/Rate</th>
						</tr>
					</thead>
					
					<tbody>

					<?php

					$result;
					//just search
					if(isset($_POST["search"]) && !isset($_POST["sort"])){ 
						$search = $_POST["search"];
						$sql = "SELECT * FROM products p WHERE p.stock > 0 and 
						(p.description LIKE '%" . $search . "%'  or 
						p.category LIKE '%" . $search . "%'  or 
						p.color LIKE '%" . $search . "%'  or 
						p.size LIKE '%" . $search . "%'  or 
						p.gender LIKE '%" . $search . "%'  or 
						p.price LIKE '%" . $search . "%'   );";
						$result = mysqli_query($db, $sql);
					}
					//just sort
					else if(isset($_POST["sort"]) && !isset($_POST["search"]) && $_POST["sort"] != "recommended")
					{
						$sort = $_POST["sort"];
						$sql = "SELECT * FROM products p WHERE p.stock > 0 ORDER BY ".$sort.";";
						$result = mysqli_query($db, $sql);
					}	
					//both
					else if(isset($_POST["sort"]) && isset($_POST["search"]))
					{
						//just searched
						if ($_POST["sort"] == "recommended")
						{
							$search = $_POST["search"];
							$sql = "SELECT * FROM products p WHERE p.stock > 0 and 
							(p.description LIKE '%" . $search . "%'  or 
							p.category LIKE '%" . $search . "%'  or 
							p.color LIKE '%" . $search . "%'  or 
							p.size LIKE '%" . $search . "%'  or 
							p.gender LIKE '%" . $search . "%'  or 
							p.price LIKE '%" . $search . "%'   );";
							$result = mysqli_query($db, $sql);
						}
						//both
						else{
							$search = $_POST["search"];
							$sort = $_POST["sort"];
							$sql = "SELECT * FROM products p WHERE p.stock > 0 and 
							(p.description LIKE '%" . $search . "%'  or 
							p.category LIKE '%" . $search . "%'  or 
							p.color LIKE '%" . $search . "%'  or 
							p.size LIKE '%" . $search . "%'  or 
							p.gender LIKE '%" . $search . "%'  or 
							p.price LIKE '%" . $search . "%'   ) ORDER BY  ".$sort.";";
								$result = mysqli_query($db, $sql);
						}

					}
					//not searched and not sorted
					else 
					{		
						echo "<tr>" . '<form method="post" action="table.php">'. "<th>" . 
						'<select name="category" id="category">' ;
						$sql_c = "SELECT DISTINCT(p.category) FROM products p WHERE p.stock >0;";
						$result_c = mysqli_query($db, $sql_c);
						echo '<option value="All">All</option>';
						while($row = mysqli_fetch_assoc($result_c))
						{
							$category = $row["category"];
							echo '<option value="'.$category.'">'.$category.'</option>';
						}
						echo'</select>'. "</th>";

						echo "<th>" . "</th>";
						
						echo "<th>" .  '<select  name="color" id="color">' ;
						$sql_co = "SELECT DISTINCT(p.color) FROM products p WHERE p.stock >0;";
						$result_co = mysqli_query($db, $sql_co);
						echo '<option value="All">All</option>';
						while($row = mysqli_fetch_assoc($result_co))
						{
							$color = $row["color"];
							echo '<option value="'.$color.'">'.$color.'</option>';
						}
						echo'</select>'. "</th>";
						
						//size
						echo "<th>" .  '<select  name="size" id="size">' ;
						$sql_s = "SELECT DISTINCT(p.size) FROM products p WHERE p.stock >0;";
						$result_s = mysqli_query($db, $sql_s);
						echo '<option value="All">All</option>';
						while($row = mysqli_fetch_assoc($result_s))
						{
							$size = $row["size"];
							echo '<option value="'.$size.'">'.$size.'</option>';
						}
						echo '<div class="select">';
						echo'</select>'. "</th>";

						echo "<th>" .  '<select name="gender" id="gender">' ;
						$sql_g = "SELECT DISTINCT(p.gender) FROM products p WHERE p.stock >0;";
						$result_g = mysqli_query($db, $sql_g);
						echo '<option value="All">All</option>';
						while($row = mysqli_fetch_assoc($result_g))
						{
							$gender = $row["gender"];
							echo '<option value="'.$gender.'">'.$gender.'</option>';
						}
						echo '</div>';
						echo'</select>'. "</th>";

						//price
						echo "<th>" . '<select name="price" id="price">' ;				
						echo '<option value="All">All</option>';
						echo '<option value="200">0-200</option>';
						echo '<option value="400">0-400</option>';
						echo '<option value="500">0-500</option>';
						echo '<option value="1000">0-1000</option>';
						echo'</select>'.  "</th>";

						echo "<th colspan='2'>" .  '<input type="submit" class="col-md-8 btn" style="background-color:#a76fe3;color:white;" value="Filter"/>' ."</th>";
			
						echo '</form>' ."</tr>";

						if(isset( $_POST["category"]) &&   $_POST["category"] != "All" )
						{
							$category = $_POST["category"];
						}
						else 
						{
							$category = "%";
						}
						if(isset( $_POST["color"])  &&   $_POST["color"] != "All" ) 
						{
							$color = $_POST["color"];
						}
						else 
						{
							$color = "%";
						}
						if(isset( $_POST["size"]) &&  $_POST["size"] != "All" )
						{
							$size = $_POST["size"];
						}
						else 
						{
							$size = "%";
						}
						if(isset( $_POST["price"]) &&     $_POST["price"] != "All" )
						{
							$price = $_POST["price"];
						}
						else 
						{
							$sql = "SELECT MAX(p.price) as max FROM products p WHERE p.stock > 0;";
							$result_max = mysqli_query($db, $sql);
							$row = mysqli_fetch_assoc($result_max);
							$price = $row["max"];
						}
						if(isset( $_POST["gender"]) &&     $_POST["gender"] != "All" )
						{
							$gender = $_POST["gender"];
						}
						else 
						{
							$gender ="%"; 
						}
					
						$sql = "SELECT * FROM products p WHERE p.stock > 0 and p.category LIKE '".$category."'
						and p.color LIKE '".$color."'
						and p.size LIKE '".$size."'  
						and p.price <= '".$price."'
						and p.gender LIKE '".$gender."';";
						$result = mysqli_query($db, $sql);

					}

					//Recommendation
					$customer_id = $_SESSION["id"];

					$descriptions = (array) null;
					$categories = (array) null;
			
					$result_1 = mysqli_query($db, "SELECT DISTINCT(`category`) as cat FROM `products`");
					while($row = mysqli_fetch_array($result_1)) {
							$categories[$row['cat']] = 0;
					}
			
					$result_2 = mysqli_query($db, "SELECT DISTINCT(`description`) as des FROM `products`");
					while($row = mysqli_fetch_array($result_2)) {
							$descriptions[$row['des']] = 0;
					}
			
			
					$result_3 = mysqli_query($db, "SELECT `includes`.`product_id`, `includes`.`piece`, `products`.`description`, `products`.`category` 
					FROM `includes` JOIN `products` ON `includes`.`product_id` = `products`.`product_id` 
					WHERE `basket_id` in (SELECT `basket_id` FROM `orders` 
					WHERE `customer_id` = ".$customer_id.");");
			
					while($row = mysqli_fetch_array($result_3)) {
							$descriptions[$row['description']] += $row['piece'];
							$categories[$row['category']] += $row['piece'];
					}
			
					arsort($descriptions);
					arsort($categories);

					reset($descriptions);
					reset($categories);
				
			
					$target_des = key($descriptions);  # most common description
					$target_cat = key($categories); # most common category
			
					
					$sql_category3 = "SELECT * FROM products p WHERE p.stock > 0 
					and p.category ='".$target_cat."' and  p.description !=  '".$target_des."' LIMIT 2;";
					$result_4 = mysqli_query($db, $sql_category3);


					while($row_2 = mysqli_fetch_assoc($result_4))
					{
						echo "<tr>" . "<th>" . $row_2["category"] . "</th>".
						"<th>" . $row_2["description"] . "</th>".
						"<th>" . $row_2["color"] . "</th>".  
						"<th>" . $row_2["size"] . "</th>".
						"<th>" . $row_2["gender"] . "</th>".
						"<th>" . $row_2["price"] . "₺</th>" . 
						"<th>".
						'<button type="submit" id="add" class="text-light btn" name="add" style="background-color:#e75480;color:#cceaea;" type="btn-primary">
							<a id="pressed" style="color:white;" href="add.php?product_id='. $row_2["product_id"].'">Rec. For You</a> </button>'
							. "</th>" ."<th>".

							'<button type="submit" id="add" class="text-light btn " style="background-color:#5091b8;color:white;"  name="add" type="btn-primary">
							<a id="pressed" style="color:white" href="see_comment.php?product_id='.$row_2["product_id"].'">See Comments</a> </button>'
							
							. "</th>" .
							"</tr>";
					}
					//end of Recommendation


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
							// button seçtiremiyorux
							echo "<tr>" . "<th>".   $my_categ . "</th>".
								"<th>" . $my_desc . "</th>".
								"<th>" . $my_color . "</th>".
								"<th>" . $my_size . "</th>".
								"<th>" . $my_gender . "</th>". 
								"<th>" . $my_price ."₺". "</th>" . 
							"<th>".

							'<button type="submit" id="add" class="text-light btn" name="add" style="background-color:#ef98aa;color:#cceaea;" type="btn-primary">
							<a id="pressed" style="color:white" href="add.php?product_id='.$my_id.'">Add +1</a> </button>'
							. "</th>" ."<th>".

							'<button type="submit" id="add" class="text-light btn" name="add" style="background-color:#8cbbd8">
							<a id="pressed" style="color:white" href="see_comment.php?product_id='.$my_id.'">See Comments</a> </button>'
							
							. "</th>" .
							"</tr>";
						}	
					?>
					</tbody>
				</table>
		</div>
	</body>
</html>