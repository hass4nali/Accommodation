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
<H1>Insert Properties</H1>
<form action="PropertiesForm.php" method="POST" enctype="multipart/form-data">
	<h4>Street: </h4>
    <input type="Text" name = "Street" />
	<h4>City: </h4>
    <input type="Text" name = "City" />
	<h4>County: </h4>
    <input type="Text" name = "County" />
	<h4>Price: </h4>
    <input type="Text" name = "Price" />
    <h4>Bedrooms: </h4>
	<input type="Text" name = "Bedrooms" />
    <h4>Bathrooms: </h4>
	<input type="Text" name = "Bathrooms" />
    <h4>Lounge: </h4>
    <input type="Text" name = "Lounge" />
	<h4>Description: </h4>
   <textarea name="Description" rows="10" cols="50"></textarea>
	<h4>Image: </h4>
	<input type="file" name="file[]" id="file" multiple>
	<h4>Google Map: </h4>
	<input type="Text" name="Map" id="Map"/>
	
    <input type="submit" name="submit" value="Submit">

</form>	



</div>


</div>


<?php
include ("../Properties.php");

if(isset($_SESSION['LandlordLoggedin']) != TRUE){
		header("Location: LandlordLoginForm.php");
	}

if (isset($_POST["submit"])){

			$LCheck = $_SESSION['LandlordLoggedin'];
			$LUser = $_SESSION['Lordlogin'];
			$Street = $_POST['Street'];
			$City = $_POST['City'];
			$County = $_POST['County'];
			$Price = $_POST['Price'];
			$Bedrooms = $_POST['Bedrooms'];
			$Bathrooms = $_POST['Bathrooms'];
			$Lounge = $_POST['Lounge'];
			$Description = $_POST['Description'];
			$Map = $_POST['Map'];
			$IProp = new Properties();
			$IProp->InsertProperty($Street, $City, $County, $Price, $Bedrooms, $Bathrooms, $Lounge, $Description, $Map, $LUser, $LCheck);
			
			
			//$IProp = new Properties();
			//$IProp->UploadImages();
			
	
}

?>


</body>
</html>
