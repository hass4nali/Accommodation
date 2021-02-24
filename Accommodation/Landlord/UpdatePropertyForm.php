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
	<div class="container">
	
  <form action="UpdatePropertyForm.php" method="POST">   

  <label for="City">City</label>
    <select id="City" name="City">
      <option value="Leeds">Leeds</option>
      <option value="Bradford">Bradford</option>
      <option value="Huddersfield">Huddersfield</option>
    </select>
	
	<label for="Price">Max Price</label>
    <select id="Price" name="Price">
		<option value="999999">No Max</option>
		<option value="50">50</option>
		<option value="100">100</option>
		<option value="200">200</option>
		<option value="300">300</option>
		<option value="400">400</option>
		<option value="500">500</option>
	</select>
	
<label for="Bedrooms">Min Bedrooms</label>
    <select id="Bedrooms" name="Bedrooms">
		<option value="0">No Min Bedrooms</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6+</option>
	</select>
	
<label for="Bathrooms">Min Bathrooms</label>
    <select id="Bathrooms" name="Bathrooms">
		<option value="0">No Min Bathrooms</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4+</option>
	</select>

	<label for="Lounge">Min Lounges</label>
    <select id="Lounge" name="Lounge">
		<option value="0">No Min Lounges</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3+</option>
	</select>
	
    <input type="submit" name="submit" value="Submit">

  
  </form>
  
</div>

</div>



<div id ="textbox">
	<?php
	include ("../Properties.php");

	if(isset($_SESSION['LandlordLoggedin']) != TRUE){
		header("Location: LandlordLoginForm.php");
	}

    if (isset($_POST['submit'])) {

       extract($_POST);
	   
		$Prop = new Properties();
		$Prop->LandlordSearchProperty($City, $Price, $Bedrooms, $Bathrooms, $Lounge);
		
     

    }	
	
	
	
	?>

</div>




</body>
</html>
