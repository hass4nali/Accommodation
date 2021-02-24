<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=0"/>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300&display=swap" rel="stylesheet">

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<link rel="stylesheet" href="style.css">

 

 <style>
 

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

<div id ="textbox">
<div align="center">
	<?php

	$PID = $_GET['id'];
	$Prop = new Properties();
	
	$Prop->AvailableCheck();	?>
	
	
	
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" role="listbox">
  
  <?php
		$Db=new Database();
		$conn = $Db->Connect();
		
		$PID = $_GET['id'];
		$sql = "SELECT * FROM image WHERE PropertyID ='".$PID."'";
		
		$result = $conn->query($sql);
		
		$row = mysqli_fetch_array($result);
		
	
  for($i=0;$i<=$row; $i++)
  {	
	  	$row = mysqli_fetch_array($result);
  ?>
  
  <?php 
  if($row==0)
  {
  ?>
  <div class="carousel-item active">
  <img class="d-block img-fluid" src="<?php $Prop->ViewImage($PID); ?>"width="90%">
     
    </div>
  <?php	
  }
  else if ($i==0)
  {
	
	  
	?> 
  	<div class="carousel-item">
       <img class="d-block img-fluid" src="<?php echo 'Landlord/imageuploads/'.$row["image"] ?>" width="90%">
    </div>
 
  <?php
   }
  else
  {
	?> 
  	<div class="carousel-item">
      <img class="d-block img-fluid" src="<?php echo 'Landlord/imageuploads/'.$row["image"] ?>"  width="90%">
    </div>
 
  <?php
   }
  }
  ?>
 
    
  </div>
  
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
	


	
	<?php
	
	//$Prop->ViewImage($PID);
	echo "<br> <b>";
	$Prop->ViewStreet($PID); 
	echo ", ";
	$Prop->ViewCity($PID);
	echo ", ";
	$Prop->ViewCounty($PID);
	echo "</b><br> ";
	$Prop->ViewBedrooms($PID);
	$Prop->ViewBathrooms($PID);
	$Prop->ViewLounges($PID);
	echo "<br>";
	$Prop->ViewRoomsAvailable($PID);
	echo "<br><br>";
	$Prop->ViewDescription($PID);
	$Prop->ViewPrice($PID);
	$Prop->ViewMap($PID);
	
	
	//error_reporting(0);
	if (isset($_POST['STime'])) {
		$PID = $_GET['id'];
		$SUser=$_SESSION['login'];
		$SCheck=$_SESSION['Loggedin'];
		
		$Time = $_POST['datetime'];
		$Prop = new Properties();
		$Prop->Booking($Time,$PID,$SUser,$SCheck);
	
	
    }
	
	
	
	?>

	<br>
	
	
	


<button class ="button" id="bookBtn">Book Here</button>


<div id="book" class="Booking">

  <div class="Booking-content">
    <span class="close">&times;</span>
	<p>Book Viewing</p>
		<form action="ViewProperty.php?id=<?php echo $PID; ?>" method="POST">
			<input type="text" name="datetime" onkeydown="return false"/>
			<input type="submit" name="STime" value="Submit">
		</form>
  </div>

</div>

</div>
	
	
</div>
</div>



<script>
$(function() {
  $('input[name="datetime"]').daterangepicker({
    "singleDatePicker": true,
    "timePicker": true,
    "timePicker24Hour": true,
	"alwaysShowCalendars": true,
	"timePickerIncrement": 30,
	"autoApply": true,
	   locale: {
      format: 'Y/M/DD hh:mm A'
	  
	  
    }
	}).attr('readonly','readonly')
});


</script>


<script>
// Get the modal
var Booking = document.getElementById("book");

// Get the button that opens the modal
var btn = document.getElementById("bookBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  Booking.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  Booking.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
	
    $(window).scrollTop(0);

  if (event.target == Booking) {
    Booking.style.display = "none";
  }
}
</script>


</body>
</html>