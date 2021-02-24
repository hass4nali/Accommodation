<?php
ob_start();
?>

<?php
include ("Database.php");

Class StudentEmail{
	public function SFEmail($email){
		$Db=new Database();
		$conn = $Db->Connect();
		$sql = "SELECT * FROM login WHERE Email = '".$email."'";  //selects email from database
		
		$result = $conn->query($sql);
		$numrows = $result->num_rows;
		if($numrows == 0) {
			echo ("Email does not exist! \n"); 
		} else {	
		
				$ResetCode =  md5(uniqid()); // CREATES RESET CODE
				$ResetCodeHash = password_hash($ResetCode, PASSWORD_DEFAULT); // ENCRYPTS RESET CODE
				$sql = "UPDATE login SET ForgotPassword ='".$ResetCodeHash."', ForgotPasswordTime=DATE_ADD(NOW(),INTERVAL 5 MINUTE) WHERE Email = '".$email."'"; //updates logindetails with reset code and adds 5 mins on timer from the email given
						$result = $conn->query($sql);
				
				$to = $email;
				$subject = "Forgot Password";
				$txt = "Code: ".$ResetCode."";
				$from = "From: StudentAccommodation";
				
				mail($to,$subject,$txt,$from); //SENDS EMAIL WITH RESET CODE
				header("Location: StudentResetPasswordForm.php"); //REDIRECTS USER TO RESET PASSWORD
		}
	}
	
	
	public function ResetPass( $email, $ForgotPassword, $NewPassword ) {
			$Db = new Database();
			$conn = $Db->Connect();
			
			$sql1 = "SELECT * FROM login WHERE Email = '" . $email . "'"; // selects email from database
			$result1 = $conn->query( $sql1 );
			$numrows1 = $result1->num_rows;
			if ( $numrows1 == 0 ) //checks if email exists
			{
				echo( "Email does not exist! \n" );
			} else {
				$row = $result1->fetch_assoc();
				$hashcode = password_verify( $ForgotPassword, $row[ 'ForgotPassword' ] ); //unhashes reset code to check if its true or false
				if ( $hashcode == TRUE ) //checks if hashcode returns true
				{
					$hashpass = password_hash( $NewPassword, PASSWORD_DEFAULT ); //hashes new password user has given
					$sql1 = "UPDATE login SET Password ='" . $hashpass . "' WHERE Email = '" . $email . "'"; //updates password in database with new password
					$result1 = $conn->query( $sql1 );
					echo( "Password Reset" );
				} else {
					echo( "Reset Code Invalid! \n" );
				}
			}
			$conn->close();
		}
	
}

/*
if (isset($_POST["submit"])){
		$email = $_POST['email'];
		$SE = new StudentEmail();
		$SE->SFEMAIL($email);
	}
	
	
	
if ( isset( $_POST[ "submit1" ] ) ) {
		$email = $_POST[ 'email' ];
		$ForgotPassword = $_POST[ 'ForgotPassword' ];
		$NewPassword = $_POST[ 'NewPassword' ];
		$SF = new StudentEmail();
		$SF->ResetPass( $email, $ForgotPassword, $NewPassword );
	}*/
?>

