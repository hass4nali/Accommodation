<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
<link rel="stylesheet" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300&display=swap" rel="stylesheet">


<title>Student Forgot Password</title>

</head>

<body>
<?php
include ("StudentForgotPassword.php");

if (isset($_POST["submit"])){
		$email = $_POST['email'];
		$SE = new StudentEmail();
		$SE->SFEMAIL($email);
	}
?>
  <div class="loginbox">
<h3>Forgot Password</h3>

<form action="StudentForgotPasswordForm.php" method="POST"> 
	<p>Email: </p>
    <input type="Text" name = "email" />
    <input type="submit" name="submit" value="Submit">
	<a href="LoginForm.php">Login Here</a>
</form>



</div>

</body>
</html>

