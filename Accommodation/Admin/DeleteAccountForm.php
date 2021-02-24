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
		<a href="DeleteAccountForm.php">Delete Accounts</a>
		<a href="UpdatePropertyForm.php">Edit Property</a>
		<a href="Settings.php">Settings</a>
		<a href="AdminLoginForm.php">Login</a>
	</div>
</div>


 <script type="text/javascript">
   
  </script>

  


<div id ="textbox">

	<?php
	include ("AdminLogin.php");

	if(isset($_SESSION['AdminLoggedin']) != TRUE){
		header("Location: AdminLoginForm.php");
	}
	
	
	$DAcc = new Admin();
	$DAcc->AdminListAccount();	
	
	if (isset($_GET['Delete'])){
		$DEL=$_GET['Delete'];
		$DAcc->AdminDeleteAccount($DEL);	
	}
	
	
	?>

</div>



</body>
</html>
