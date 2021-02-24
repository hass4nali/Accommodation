<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300&display=swap" rel="stylesheet">


</head>
<body>
<?php
//session_start();

include ("LandlordLogin.php");
$LUser =  $_SESSION['Lordlogin'];
?>
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

	
if(isset($_SESSION['LandlordLoggedin']) != TRUE){
		header("Location: LandlordLoginForm.php");
	}
	
    if (isset($_POST['submit1'])) {

       extract($_POST);
	   
		$LR = new Landlord();
		
        $email = $LR->LandlordEmailChange($email, $LUser);

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
	   
		$LR = new Landlord();
		
        $passwordchange = $LR->LandlordPasswordChange($Pass, $LUser , $Pass2);

        if ($passwordchange) {

            // Registration Success

           echo "Password Changed";

        } else {

            // Registration Failed

            echo "Error";

        }

    }
	
	


?>


</body>
</html>
