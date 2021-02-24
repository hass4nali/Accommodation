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


<title>Landlord Reset Password</title>

</head>

<body>
<?php
include ("LandlordForgotPassword.php");

if ( isset( $_POST[ "submit1" ] ) ) {
		$email = $_POST[ 'email' ];
		$ForgotPassword = $_POST[ 'ForgotPassword' ];
		$NewPassword = $_POST[ 'NewPassword' ];
		$LF = new LandlordEmail();
		$LF->ResetPass( $email, $ForgotPassword, $NewPassword );
	}
?>
  <div class="loginbox">




	<div class="loginbox1">
		<h3>Reset Password</h3>
		<form action="LandlordResetPasswordForm.php" method="POST">
			<p>Email</p>
			<input type="text" name="email" required>
			<p>Reset Code</p>
			<input type="password" name="ForgotPassword" required><br>
			<p>New Password</p>
			<input type="password" name="NewPassword" minlength="8" required><br>
			<input type="submit" name="submit1" value="Submit">
			<br><a href="LandlordLoginForm.php">Login Here</a>
		</form>

		<br>
		<p>Check Email for reset code!</p>
	</div>

</div>

</body>
</html>

