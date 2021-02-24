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
	$SUser =  $_SESSION['login'];
	
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
		  <form action="Settings.php" method="POST"> 
			<h2>Change Email</h2>
			
			<input type="Text" name = "email" placeholder="Email">
			
			<input type="submit" name="submit1" value="Submit">
			</form>
		  </div>

		  <div class="col">
			<form action="Settings.php" method="POST"> 
			<h2>Change Password</h2>
			<input type="password" name="Pass" placeholder="Password" minlength="8" required>
			<input type="password" name="Pass2" placeholder="Retype Password" minlength="8" required>
			<input type="submit" name="submit" value="Submit">
			</form>	
		  </div>
		  
		</div>
	 
	</div>


</div>


<?php
//include ("Login.php");

	
if(isset($_SESSION['Loggedin']) != TRUE){
		header("Location: LoginForm.php");
	}
	
    if (isset($_POST['submit1'])) {

       extract($_POST);
	   
		$Us = new User();
		//$Us->check_login($User, $Pass);
		
        $email = $Us->StudentEmailChange($email, $SUser);

        if ($email) {

            // Registration Success

           echo "Email Changed";

        } else {

            // Registration Failed

            echo "Error";

        }

    }
	
	
	
	
	if (isset($_POST['submit'])) {

       extract($_POST);
	   
		$Us = new User();
		
        $passwordchange = $Us->StudentPasswordChange($Pass, $SUser , $Pass2);

        if ($passwordchange) {

            // Registration Success

           echo "Password Changed";

        } else {

            // Registration Failed

            echo "Error";

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
