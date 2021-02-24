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
include ("Properties.php");
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
		  
		<div class="propbox">

			<form action="Maintenance.php" method="POST" enctype="multipart/form-data">

				Title
				<select name="Title">
					<option value='Water'>Water</option>
					<option value='Electricity'>Electricity</option>
					<option value='Other'>Other</option>
				</select>
				Message
				<textarea name="MSG" rows="10" cols="50"></textarea>
				<input type="submit" name="submit" value="Submit">
			</form>	

		</div>



<?php


if(isset($_SESSION['Loggedin']) != TRUE){
		header("Location: LoginForm.php");
	}

if (isset($_POST["submit"])){
	
	$SUser =  $_SESSION['login'];
	$Title = $_POST['Title'];
	$MSG = $_POST['MSG'];
	
	$Prop = new Properties();
	$Prop->SendMaintenance($Title, $MSG, $SUser);
	
			
	
			
	
}
?>
<br><br>
<div align="center">
<b>Active Maintenance</b>
</div>
	</div>
</div>
<?php
$SUser =  $_SESSION['login'];
$Prop = new Properties();
$Prop->StudentViewMaintenance($SUser);


?>


</body>
</html>
