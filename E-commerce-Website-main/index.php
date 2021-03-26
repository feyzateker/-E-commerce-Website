<?php
  include "config.php";
?>

<!doctype html>

<html lang="en" >
	<head>
	
	<style>
		p.groove {border-style: groove;}
		form {border: 3px solid #f1f1f1;}
	</style>
	
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
	
	<body >
	<div style="background-image: url('bg.jpg');background-repeat: no-repeat; background-attachment: fixed;
  background-size: 100% 100%;">
  
		<div class="row justify-content-md-center text-warning" style="border: 5px outset #8b709e;">
			<div class="col col-md-3" >
				<img src="heels.jpg" width="160" height="160" alt="" class="d-inline-block align-top">
			</div>
			<div class="col col-md-9">
				<div style="width:100%;">
				<br>
					<h1 style="color:#8b709e" >Welcome to the Heaven for Shoes</h1> 
					<div style="float:right;width:80%">
						<p style="color:#8b709e">It's always SHOE O'CLOCK somewhere</p>
					</div>
				</div>
			</div>
		</div>

<br>
    <div class="row justify-content-md-center">
      <div class="container text-center">
        <div style="float:left;width:40%; border: 2px outset #8b709e;" class="col-md-6">
        
		  <h2 style="color:#e75480 ">SIGN IN</h2>
		
          <form action="products1.php" method ="post">
		  
              <label class="col-md-3" for="elogin" style="margin-top:40px;color:#58aee3;">E-MAIL:</label>
              <input class="col-md-8" id="elogin" type="email" name="elogin" placeholder="Enter your e-mail"> <br>
		 
              <label class="col-md-3" for="password" style="margin-top:20px;color:#58aee3;">PASSWORD:</label>
              <input class="col-md-8" id="password" type="password" name="password" placeholder="Enter your password"> <br>
        
              <div class="custom-control custom-switch">
                
				<input type="checkbox" class="custom-control-input" name="manager" id="manager" style="margin-top:20px;">
				<label class="custom-control-label" for="manager" style="margin-top:20px;">Manager Login</label>
              </div>
              <button type="submit" class="btn col-md-4" style="margin-top:40px;background-color:#e75480;color:#cceaea;">LOGIN</button>
          </form>
		 
			<div class="row justify-content-md-center"  >    
			  <button type="submit" method="POST" id="pressed" class="text-light btn " style="margin-top:30px;background-color:#58aee3;color:white" name="pressed" type="btn-primary">
			  <a id="pressed" method="POST"  name="pressed"  href="products3.php" style="color:white">Continue without register/login</a></button>
			</div> 
        </div>

        <div style="float:right;width:60%;border: 2px outset #8b709e;" class="col-md-6">
            <h2  style="color:#e75480" >SIGN UP</h2>
            <form action="products2.php" method="post">   
              <label class="col-md-3" for="name" style="margin-top:20px;color:#58aee3;">NAME:</label>
              <input class="col-md-8" id="name" type="text" name="name" placeholder="Enter your name"> <br>
              <label class="col-md-3" for="surname" style="margin-top:20px;color:#58aee3;">SURNAME:</label>
              <input class="col-md-8" id="surname" type="text" name="surname" placeholder="Enter your surname"> <br>
              <label class="col-md-3" for="email" style="margin-top:20px;color:#58aee3;">E-MAIL:</label>
              <input class="col-md-8" id="email" type="email" name="email" placeholder="Enter your e-mail"> <br>
              <label class="col-md-3" for="password" style="margin-top:20px;color:#58aee3;">PASSWORD:</label>
              <input class="col-md-8" id="password" type="password" name="password" placeholder="Enter your password"> <br>
              <label class="col-md-3" for="address" style="margin-top:20px;color:#58aee3;">ADDRESS:</label>
              <textarea class="col-md-8" id="address" name="address" placeholder="Enter your address" style="margin-top:20px;"></textarea> <br>
              <button type="submit"  class="btn col-md-4" style="margin-top:20px;background-color:#e75480;color:#cceaea">SUBMIT</button>
            </form>
        </div>

        <div style="clear:both;"></div>
      </div>
    

    <br><br><br>

 
   </div>

    </div>  </div>

	</body>
</html>

<?php
  if(isset($_SESSION["message"]))
  {
	  if(isset($_SESSION["already_customer"]) && $_SESSION["already_customer"])
	  {
		  echo '<script>alert("You already have an account")</script>';
		  $_SESSION['already_customer'] = false;
	  }
	  else if(isset($_SESSION["wrong_mail_pas"]) && $_SESSION["wrong_mail_pas"])
	  {
		 echo '<script>alert("Wrong e-mail or password")</script>';
		 $_SESSION['wrong_mail_pas'] = false; 
	  }
	  
	  $_SESSION["message"] = false; 
  }
  
?>




