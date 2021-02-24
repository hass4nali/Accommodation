<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300&display=swap" rel="stylesheet">


</head>

<body>
<div id ="textbox">
	<div class="container">
<?php
ob_start();
session_start();
//check if stripe token exist to proceed with payment


if(!empty($_POST['stripeToken'])){
	include_once("Database.php");
		$Db=new Database();
		$conn = $Db->Connect();
		
		$SUser =  $_SESSION['login'];
		
		$sql1 = "SELECT * FROM login WHERE Username = '".$SUser."'";  
		$result1 = $conn->query($sql1);
		$row = mysqli_fetch_array($result1);
		$SID =  $row['StudentID'];
		$name =  $row['fName'];
		$email =  $row['Email'];
		
		$sql2 = "SELECT * FROM propertieslet WHERE StudentID = '".$SID."'";  
		$result2 = $conn->query($sql2);
		$row2 = mysqli_fetch_array($result2);
		$PayID =  $row2['PaymentID'];
		$PID =  $row2['PropertyID'];
		
		
		$sql3 = "SELECT * FROM payment WHERE PaymentID = '".$PayID."'";  
		$result3 = $conn->query($sql3);
		$row3 = mysqli_fetch_array($result3);
		$TotalDue =  $row3['TotalDue'];
		$TotalPaid =  $row3['TotalPaid'];
		$PaidID =  $row3['PaidID'];
		$Price=$TotalDue-$TotalPaid;
		$Price=$Price*100;
		
		$sql4 = "SELECT * FROM properties WHERE PropertyID = '".$PID."'";  
		$result4 = $conn->query($sql4);
		$row4 = mysqli_fetch_array($result4);
		$Street =  $row4['Street'];
		
		
		if ($Price>0){
		
			// get token and user details
			$stripeToken  = $_POST['stripeToken'];
			$custName = $name;
			$custEmail = $email;
			$cardNumber = $_POST['cardNumber'];
			$cardCVC = $_POST['cardCVC'];
			$cardExpMonth = $_POST['cardExpMonth'];
			$cardExpYear = $_POST['cardExpYear'];    
			//include Stripe PHP library
			require_once('stripe-php/init.php');    
			//set stripe secret key and publishable key
			$stripe = array(
			  "secret_key"      => "sk_test_gaQ5VKmVXve1B3mfqNpJBpow00gi9KCkpF",
			  "publishable_key" => "pk_test_2ZWpS3rtJz3W1EDkqdwoMzx200Wdxy0UDk"
			);    
			\Stripe\Stripe::setApiKey($stripe['secret_key']);    
			//add customer to stripe
			$customer = \Stripe\Customer::create(array(
				'name' => $custName,
				'email' => $custEmail,
				'source'  => $stripeToken
			));    
			// item details for which payment made
			$itemName = $Street;
			//$itemNumber = "Test987654321";
			$itemPrice = $Price;
			$currency = "gbp";
			$orderID = $PID;    
			// details for which payment performed
			$payDetails = \Stripe\Charge::create(array(
				'customer' => $customer->id,
				'amount'   => $itemPrice,
				'currency' => $currency,
				'description' => $itemName,
				'metadata' => array(
					'order_id' => $orderID
				)
			));    
			// get payment details
			$paymenyResponse = $payDetails->jsonSerialize();
			// check whether the payment is successful
			if($paymenyResponse['amount_refunded'] == 0 && empty($paymenyResponse['failure_code']) && $paymenyResponse['paid'] == 1 && $paymenyResponse['captured'] == 1){
				// transaction details 
				$amountPaid = $paymenyResponse['amount'];
				$balanceTransaction = $paymenyResponse['balance_transaction'];
				$paidCurrency = $paymenyResponse['currency'];
				$paymentStatus = $paymenyResponse['status'];
				$paymentDate = date("Y-m-d H:i:s");        
				
				$itemPrice=$itemPrice/100;
				$amountPaid=$amountPaid/100;
				
				$sql5 = "Update payment SET TotalPaid = TotalPaid+'".$amountPaid."' WHERE PaymentID ='".$PayID."'";
				$result5 = $conn->query($sql5);

				//insert tansaction details into database
				$sql = "INSERT INTO transaction(PaidID, ItemName, ItemPrice, ItemPriceCurrency, PaidAmount, PaidAmountCurrency, TxnID, PaymentStatus, Created, Modified) 
				VALUES('".$PaidID."','".$itemName."','".$itemPrice."','".$paidCurrency."','".$amountPaid."','".$paidCurrency."','".$balanceTransaction."','".$paymentStatus."','".$paymentDate."','".$paymentDate."')";
				$result = $conn->query($sql);
				
				
				
				$lastInsertId = mysqli_insert_id($conn); 
			   //if order inserted successfully
			   if($lastInsertId && $paymentStatus == 'succeeded'){
					$paymentMessage = "<strong>The payment was successful.</strong><strong> Order ID: {$lastInsertId}</strong>";
			   } else{
				  $paymentMessage = "Payment failed!";
			   }
			} else{
				$paymentMessage = "Payment failed!";
			}
	} else {
		$paymentMessage = "Nothing Due!";
	}
} else{
    $paymentMessage = "Payment failed!";
}
echo $paymentMessage;
?>
<br></div>
<a href="Payment.php">Back</a>

</div>

</body>
</html>