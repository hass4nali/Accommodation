<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- jQuery -->
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript" src="payment.js"></script>

<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300&display=swap" rel="stylesheet">

<?php	
	include ("Login.php");
	include ("Properties.php");
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
<?php



if(isset($_SESSION['login']) != TRUE){
	header("Location: LoginForm.php");
}

$SUser =  $_SESSION['login'];

$Prop = new Properties();
$Prop->LoadPaymentDue($SUser);	
?>


<div class="container">	
	<div class="row">	
		
		<br><b>Card Number:</b> 4242424242424242<br> <b>CVC:</b> Any Number<br> <b>EXP Date:</b> An active card </b><br>
		<br>
		<div class="col-xs-12 col-md-4">
			<div class="panel panel-default">
			<div class="panel-body">
			<form action="process.php" method="POST" id="paymentForm">				
				<div class="form-group">
					<label>Card Number</label>
					
					<input type="text" name="cardNumber" size="20" autocomplete="off" id="cardNumber" class="form-control" />
				</div>	
				<div class="row">
				<div class="col-xs-4">
				<div class="form-group">
					<label>CVC</label>
					<input type="text" name="cardCVC" size="4" autocomplete="off" id="cardCVC" class="form-control" />
				</div>	
				</div>	
				</div>
				<div class="row">
				<div class="col-xs-10">
				<div class="form-group">
					<label>Expiration (MM/YYYY)</label>
					<div class="col-xs-6">
						<input type="text" name="cardExpMonth" placeholder="MM" size="2" id="cardExpMonth" class="form-control" /> 
					</div>
					<div class="col-xs-6">
						<input type="text" name="cardExpYear" placeholder="YYYY" size="4" id="cardExpYear" class="form-control" />
					</div>
				</div>	
				</div>
				</div>
				<br>	
				<div class="form-group">
					<input type="submit" id="makePayment" class="btn btn-success" value="Make Payment">
				</div>			
			</form>	
			</div>
			</div>
		</div>	
<span class="paymentErrors"></span>			
	</div>		
</div>

</div>
