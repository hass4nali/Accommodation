<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300&display=swap" rel="stylesheet">

</head>

<body>
<?php
	include ("Properties.php");
	include ("Login.php");
	
	if(isset($_SESSION['Loggedin']) != TRUE){
		header("Location: LoginForm.php");
	}
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

<?php
	error_reporting(0);
	$SUser =  $_SESSION['login'];
	$Del=$_GET['Delete'];
	
	$Prop = new Properties();
	$Prop->ListBookings($SUser);	
	
	
	if (isset($_GET['Delete'])){
		$Prop->DeleteBooking($SUser, $Del);	

	}
	
?>

</div>
	
	

</div>



</body>
</html>