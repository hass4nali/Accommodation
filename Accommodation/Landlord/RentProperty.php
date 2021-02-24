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
		  
		<div class="propbox">

			<form action="RentProperty.php" method="POST" enctype="multipart/form-data">
				Student Username
				<input type="Text" name = "SUser" />
				Property
				<select name="Street">
					<?php
					$LUser = $_SESSION['Lordlogin'];
					$Prop = new Properties();
					$Prop->LoadProperties($LUser);
					
					?>
				</select>
				Start Date
				<input type="date" id="sdate" name="SDate"/>
				End Date
				<input type="date" id="edate" name="EDate"/>
				<input type="submit" name="submit" value="Submit">
			</form>	

		</div>

	</div>
</div>

<?php


if(isset($_SESSION['LandlordLoggedin']) != TRUE){
		header("Location: LandlordLoginForm.php");
	}

if (isset($_POST["submit"])){
	
	$SUser = $_POST['SUser'];
	$Street = $_POST['Street'];
	$SDate = $_POST['SDate'];
	$EDate = $_POST['EDate'];
	
	$Prop = new Properties();
	$Prop->LetProperty($SUser, $Street, $SDate, $EDate);
	
			
	
			
	
}

?>
<script>

var sdate = document.querySelector('[id=sdate]');


function sMonday(a){

    var day = new Date( a.target.value ).getUTCDay();

    
    if( day == 1 ){

          a.target.setCustomValidity('');

    } else {
	a.target.setCustomValidity('Only Accept Mondays');
        

    }

}

sdate.addEventListener('input', sMonday);



var date = document.querySelector('[id=edate]');

function Monday(e){

    var day = new Date( e.target.value ).getUTCDay();

    
    if( day == 1 ){

          e.target.setCustomValidity('');

    } else {
	e.target.setCustomValidity('Only Accept Mondays');
        

    }

}

date.addEventListener('input', Monday);
</script>

</body>
</html>
