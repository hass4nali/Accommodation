<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300&display=swap" rel="stylesheet">


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
	<?php
	ob_start();
	include ("../Properties.php");
	
	if(isset($_SESSION['LandlordLoggedin']) != TRUE){
		header("Location: LandlordLoginForm.php");
	}
	$LR=$_SESSION['Lordlogin'];
	
	$PID = $_GET['id'];
	
	$Prop = new Properties();
	$Prop->LandlordViewProperty($PID);
	
	
	

	
	if (isset($_POST["UCounty"])){
	
			
		$County = $_POST['County'];
		$Prop->LandlordUpdateCounty($County,$PID,$LR);
		header("Refresh:0");
	
	}
	
	if (isset($_POST["UCity"])){
	
			
		$City = $_POST['City'];
		$Prop->LandlordUpdateCity($City,$PID,$LR);
		header("Refresh:0");
	
	}
	
	if (isset($_POST["UStreet"])){
	
			
		$Street = $_POST['Street'];
		$Prop->LandlordUpdateStreet($Street,$PID,$LR);
		header("Refresh:0");
	
	}
	
	if (isset($_POST["UPrice"])){
	
			
		$Price = $_POST['Price'];
		$Prop->LandlordUpdatePrice($Price,$PID,$LR);
		header("Refresh:0");
	
	}
	
	if (isset($_POST["UBedrooms"])){
	
			
		$Bedrooms = $_POST['Bedrooms'];
		$Prop->LandlordUpdateBedrooms($Bedrooms,$PID,$LR);
		header("Refresh:0");
	
	}
	
	if (isset($_POST["UBathrooms"])){
	
			
		$Bathrooms = $_POST['Bathrooms'];
		$Prop->LandlordUpdateBathrooms($Bathrooms,$PID,$LR);
		header("Refresh:0");
	
	}
	
	if (isset($_POST["ULounge"])){
	
			
		$Lounge = $_POST['Lounge'];
		$Prop->LandlordUpdateLounge($Lounge,$PID,$LR);
		header("Refresh:0");
	
	}
	
	if (isset($_POST["UDescription"])){
	
			
		$Description = $_POST['Description'];
		$Prop->LandlordUpdateDescription($Description,$PID,$LR);
		header("Refresh:0");
	
	}
	
	
	if (isset($_POST["UMap"])){
	
			
		$Map = $_POST['Map'];
		$Prop->LandlordUpdateMap($Map,$PID,$LR);
		header("Refresh:0");
	
	}
	
	if (isset($_POST["Image"])){
		
	
		$Prop->LandlordUpdateImage($PID);
	}
	
if (isset($_GET['Delete'])){
		$Prop = new Properties();
		$Prop->LandlordDeleteImage($PID);	

	}
	
if (isset($_POST['Delete'])) {

		$DProp = new Properties();
		$DProp->LandlordDeleteProperty($PID, $LR);
	
	

    }
	
	?>
	
	<form action="LandlordViewProperty.php?id=<?php echo $PID; ?>" method="POST"> 
		<input type="submit" name="Delete" value="Delete Property">
	</form>
	
	<br>
	<form action="LandlordViewProperty.php?id=<?php echo $PID; ?>" method="POST" enctype="multipart/form-data">
	
	
	<h4>County: </h4>
    <input type="Text" name = "County" />
    <input type="submit" name="UCounty" value="County">
	
	<h4>City: </h4>
    <input type="Text" name = "City" />
    <input type="submit" name="UCity" value="City">
	
	<h4>Street: </h4>
    <input type="Text" name = "Street" />
    <input type="submit" name="UStreet" value="Street">
	
	<h4>Price: </h4>
    <input type="Text" name = "Price" />
    <input type="submit" name="UPrice" value="Price">
	
	<h4>Bedrooms: </h4>
    <input type="Text" name = "Bedrooms" />
    <input type="submit" name="UBedrooms" value="Bedrooms">
	
	<h4>Bathrooms: </h4>
    <input type="Text" name = "Bathrooms" />
    <input type="submit" name="UBathrooms" value="Bathrooms">
	
	<h4>Lounges: </h4>
    <input type="Text" name = "Lounge" />
    <input type="submit" name="ULounge" value="Lounge">
	
	<h4>Description: </h4>
	<textarea name="Description" rows="10" cols="50"></textarea>
	<input type="submit" name="UDescription" value="Description">
	
	<h4>Map: </h4>
    <input type="Text" name = "Map" />
    <input type="submit" name="UMap" value="Map">
	
	<h4>Image: </h4>
	<input type="file" name="file[]" id="file" multiple>
	<input type="submit" name="Image" value="Image">
	
</form>	

<!--
	<form action="LandlordViewProperty.php?id=<?php //echo $PID; ?>" method="POST"> 
		<input type="submit" name="UStreet" value="Update">
	</form>-->

</div>




</body>
</html>
