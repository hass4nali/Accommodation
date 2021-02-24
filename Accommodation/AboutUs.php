<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300&display=swap" rel="stylesheet">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  border-radius: 5px;
}

img {
  border-radius: 5px 5px 0 0;
}

.container {
  padding: 2px 16px;
}


.responsive {
  padding: 0 6px;
  float: left;
  width: 20%;
}

@media only screen and (max-width: 900px) {
  .responsive {
    width: 49.99999%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 670px) {
  .responsive {
    width: 100%;
  }
}
</style>

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



<div align="center">
<h1>MEET OUR TEAM</h1>
<div id ="textbox">



<div class="responsive">	
<div class="card">
  <img src="Images/Staff2.png" alt="Avatar" style="width:100%">
  <div class="container">
    <h3><b>Eugene Frederick</b></h3> 
    <p>Owner</p> 
  </div>
</div>
</div>

<div class="responsive">
<div class="card">
  <img src="Images/Staff1.png" alt="Avatar" style="width:100%">
  <div class="container">
    <h3><b>Isoke Abeni</b></h3> 
    <p>Assistant</p> 
  </div>
</div>
</div>


<div class="responsive">
<div class="card">
  <img src="Images/Staff3.png" alt="Avatar" style="width:100%">
  <div class="container">
    <h3><b>Shaun Mitchell</b></h3> 
    <p>Landlord</p> 
  </div>
</div>
</div>


<div class="responsive">
  <div class="card">
  <img src="Images/Staff4.png" alt="Avatar" style="width:100%">
  <div class="container">
    <h3><b>Zenia Mbanefo</b></h3> 
    <p>Landlord</p> 
  </div>
</div>
</div>

<div class="responsive">
<div class="card">
  <img src="Images/Staff5.png" alt="Avatar" style="width:100%">
  <div class="container">
    <h3><b>Bruce Jackson</b></h3> 
    <p>Landlord</p> 
  </div>
</div>
</div>
  
	</div>

</div>





</body>
</html>
