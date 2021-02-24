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
include ("../Properties.php");


?>
<div class="header">
  <a href="Index.php" class="logo">Student Accommodation</a>
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
		  
		<div class="propbox">

		
	
		
		
			
				<?php
					$LUser =  $_SESSION['Lordlogin'];
					$Prop = new Properties();
					$Prop->ViewMaintenance($LUser);
					
				?>
				

		</div>

	</div>
</div>

<?php


if(isset($_SESSION['LandlordLoggedin']) != TRUE){
		header("Location: LandlordLoginForm.php");
	}
	
if (isset($_POST["submit"])){
	
	//$Prop = new Properties();
	//$Prop->SendMaintenance($Title, $MSG);
		
	
}

?>


</body>
</html>
