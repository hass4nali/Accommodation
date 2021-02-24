<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
<link rel="stylesheet" href="../style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300&display=swap" rel="stylesheet">


<title>Landlord Forgot Password</title>

</head>

<body>
<?php
include ("LandlordForgotPassword.php");

if (isset($_POST["submit"])){
		$email = $_POST['email'];
		$LE = new LandlordEmail();
		$LE->LFEMAIL($email);
	}
?>
  <div class="loginbox">
<h3>Forgot Password</h3>

<form action="LandlordForgotPasswordForm.php" method="POST"> 
	<p>Email: </p>
    <input type="Text" name = "email" />
    <input type="submit" name="submit" value="Submit">
	<a href="LandlordLoginForm.php">Login Here</a>
</form>



</div>

</body>
</html>

