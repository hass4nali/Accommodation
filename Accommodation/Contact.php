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


<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2356.8885657324304!2d-1.768257683966219!3d53.791470848976815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487be6b5896a3c2b%3A0x3e1c202b0be48ed2!2sUniversity%20of%20Bradford!5e0!3m2!1sen!2suk!4v1585163924496!5m2!1sen!2suk" width= 100% height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
<div align="center">
<div id ="textbox">
	
	
	<a>Richmond Rd, Bradford BD7 1DP</a><br>
	<a>Telephone Number: 01274232323</a><br>
	<a>Email: StudentAccommodation@gmail.com</a><br><br>
	<a>Open From Mon-Fri 9:00-19:00</a><br>
	<a>Sat-Sun 9:00-15:00</a>
  
	</div>

</div>

<div id ="textbox">
	<?php
	

    if (isset($_POST['submit'])) {

       extract($_POST);
	   
		$Prop = new Properties();
		$Prop->SearchProperty($City, $Price, $Bedrooms, $Bathrooms, $Lounge);
		
     

    }	
	?>

</div>



</body>
</html>
