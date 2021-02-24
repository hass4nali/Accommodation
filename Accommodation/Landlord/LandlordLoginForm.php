<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300&display=swap" rel="stylesheet">


<style>






</style>
</head>
<body>

<div class="header">
  <a href="#" class="logo">Student Accommodation</a>
  <div class="header-right">
		<a href="Maintenance.php">Maintenance</a>
		<a href="ChangeRent.php">Change Rent Date</a>
		<a href="RentProperty.php">Rent Property</a>
		<a href="PropertiesForm.php">Upload Property</a>
		<a href="UpdatePropertyForm.php">Edit Property</a>
		<a href="Settings.php">Settings</a>
		<a href="LandlordLoginForm.php">Login</a>
	</div>
</div>

<div id ="textbox">
<h2>Landlord Login</h2>
	<div class="container">
		<div class="row">
		  <div class="col">
		  <form action="LandlordLoginForm.php" method="POST"> 
			<h2>Sign Up</h2>
			
			<input type="Text" name = "Lemail" placeholder="Email">
			<input type="Text" name = "LFName" placeholder="First Name">
			<input type="Text" name = "LLName" placeholder="Last Name">
			<input type="Text" name="LUser" placeholder="Username">
			<input type="password" name="LPass" minlength="8" placeholder="Password">
			<input type="password" name="RPass" minlength="8" placeholder="Password">
			<input type="submit" name="submit1" value="Submit">
			</form>
		  </div>

		  <div class="col">
			<form action="LandlordLoginForm.php" method="POST"> 
			<h2>Login</h2>
			<input type="text" name="LUser" placeholder="Username">
			<input type="password" name="LPass" placeholder="Password">
			<input type="submit" name="submit" value="Login">
			<input type="submit" name="logout" value="Log Out">
			<br><a href="LandlordForgotPasswordForm.php">Forgot your password?</a>
			</form>	
		  </div>
		  
		</div>
	 
	</div>
</div>

<?php

include ("LandlordLogin.php");


   if (isset($_POST['submit'])) {

       extract($_POST);
	   
		$LL = new Landlord();
		//$Us->check_login($User, $Pass);
		
        $login = $LL->LandlordLogin($LUser, $LPass);

        if ($login) {

            // Registration Success
			return true;
           echo "Logged In";

        } else {
			return false;
            // Registration Failed

            echo "Wrong username or password";

        }

    }
	

	
	
	
	if (isset($_POST['submit1'])) {

       extract($_POST);
	   
		$LR = new Landlord();
		
		$AUser = $_SESSION['adminlogin'];	
		$ACheck=$_SESSION['AdminLoggedin'];
		
        $register = $LR->LandlordRegister($LUser, $LPass, $Lemail, $LFName, $LLName, $AUser,$ACheck, $RPass);

        if ($register) {

            // Registration Success
			return true;
           echo "account registered";

        } else {
			return true;
            // Registration Failed

            echo "Failed to register";

        }

    }
?>

</body>
</html>
