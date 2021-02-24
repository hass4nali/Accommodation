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
		<a href="DeleteAccountForm.php">Delete Accounts</a>
		<a href="UpdatePropertyForm.php">Edit Property</a>
		<a href="Settings.php">Settings</a>
		<a href="AdminLoginForm.php">Login</a>
	</div>
</div>


<div id ="textbox">
<h2>Admin Login</h2>
	<div class="container">
		<div class="row">
		  <div class="col">
		  <form action="AdminLoginForm.php" method="POST"> 
			<h2>Sign Up</h2>
			
			<input type="Text" name = "Aemail" placeholder="Email">
			<input type="Text" name="AUser" placeholder="Username">
			<input type="password" name="APass" minlength="8" placeholder="Password">
			<input type="password" name="RPass" minlength="8" placeholder="Password">
			<input type="submit" name="submit1" value="Submit">
			</form>
		  </div>

		  <div class="col">
			<form action="AdminLoginForm.php" method="POST"> 
			<h2>Login</h2>
			<input type="text" name="AUser" placeholder="Username">
			<input type="password" name="APass" placeholder="Password">
			<input type="submit" name="submit" value="Login">
			<input type="submit" name="logout" value="Log Out">
			<br><a href="AdminForgotPasswordForm.php">Forgot your password?</a>
			</form>	
		  </div>
		  
		</div>
	 
	</div>
</div>

<?php
include ("AdminLogin.php");
    if (isset($_POST['submit'])) {

       extract($_POST);
	   
		$AL = new Admin();
		//$Us->check_login($User, $Pass);
		
        $Admin = $AL->AdminLogin($AUser, $APass);
		
        if ($Admin) {

            // Registration Success
			
	header("Location: AdminLoginForm.php");
	

	
//	echo 'Admin logged in as: ',$_SESSION['adminlogin'];

        } else {

            // Registration Failed

            echo "Wrong username or password";

        }

    }
	
	
	
	if (isset($_POST['submit1'])) {

       extract($_POST);
	   
		$ALogin=$_SESSION['AdminLoggedin'];
		$AL = new Admin();
		
        $register = $AL->AdminRegister($AUser, $APass, $Aemail, $ALogin, $RPass);

        if ($register) {

            // Registration Success

           echo "account registered";

        } else {

            // Registration Failed

            echo "Failed to register";

        }

    }
?>

</body>
</html>
