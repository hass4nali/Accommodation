<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300&display=swap" rel="stylesheet">


</head>
<body>
<?php
session_start();
	include ("Database.php");
	include ("Login.php");
	
?>
<div class="header">
  <a href="Index.php" class="logo">Student Accommodation</a>
  <div class="header-right">
<?php
			$Link = new User();
			
			$Link->PaymentsLink();
			$Link->BookingsLink();
			$Link->MaintenanceLink();
		?>
		<a href="Property.php">Properties</a>
		<a href="AboutUs.php">About Us</a>
		<a href="Contact.php">Contact</a>
		<?php
			$Link->SettingsLink();
		?>
		<a href="LoginForm.php">Login</a>
  </div>
</div>

<div id ="textbox">
	<div class="container">
	  
		<div class="row">
		  

		  <div class="col">
		  <form action="LoginForm.php" method="POST"> 
			<h2>Sign Up</h2>
			
			<input type="Text" name = "email" placeholder="Email" required>
			
			<input type="Text" name = "fName" placeholder="First Name" required>
			
			<input type="Text" name = "lName" placeholder="Last Name" required>
			<input type="Text" name="User" placeholder="Username" required>
			<input type="password" name="Pass"  minlength="8" placeholder="Password" required>
			<input type="password" name="RPass"  minlength="8" placeholder="Retype Password" required>
			<input type="submit" name="submit1" value="Submit">
			</form>
		  </div>

		  <div class="col">
			<form action="LoginForm.php" method="POST"> 
			<h2>Login</h2>
			<input type="text" name="User" placeholder="Username" required>
			<input type="password" name="Pass" placeholder="Password" required>
			<input type="submit" name="submit" value="Login">
			</form>	
			<form action="LoginForm.php" method="POST"> 
			<input type="submit" name="logout" value="Log Out">
			<br><a href="StudentForgotPasswordForm.php">Forgot your password?</a>
			</form>	
		  </div>
		  
		</div>
	 
	</div>


</div>


<?php
//include ("Login.php");

	
    if (isset($_POST['submit'])) {

       extract($_POST);
	   
		$Us = new User();
		//$Us->check_login($User, $Pass);
		
        $login = $Us->StudentLogin($User, $Pass);

        if ($login) {

            // Registration Success

           echo "Logged In";

        } else {

            // Registration Failed

            echo "Wrong username or password";

        }

    }
	
	
	
	
	if (isset($_POST['submit1'])) {

       extract($_POST);
	   
		$Us = new User();
		
        $register = $Us->StudentRegister($User, $Pass, $email, $fName, $lName, $RPass);

        if ($register) {

            // Registration Success

           echo "account registered";

        } else {

            // Registration Failed

            echo "Failed to register";

        }

    }
	
	
	
	
	
	
	
	
	
	
	
	if (isset($_POST["logout"])){
	$Us = new User();
		//$Us->StudentLogin($User, $Pass);
		
    $Us->StudentLogout();

}

?>


</body>
</html>
