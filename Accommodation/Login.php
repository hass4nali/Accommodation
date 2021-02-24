<?php
ob_start();

?>


<?php

	class User{

		public function StudentRegister($User, $Pass, $email, $fName, $lName, $RPass){
			$Db=new Database();
			$conn = $Db->Connect();	
	
			$sql="SELECT * FROM login WHERE Username='".$User."'";

			//checking if the username or email is available in db
			$result = $conn->query($sql);
			$numrows = $result->num_rows;

			
			$sql1 = "SELECT * FROM login WHERE Email = '".$email."'";
			$result1 = $conn->query($sql1);
			$numrows1 = $result1->num_rows;
			
			//if the username is not in db then insert to the table
			if($Pass == $RPass){
				if (filter_var($email, FILTER_VALIDATE_EMAIL)) { 
					if ($numrows==0){
						if ($numrows1==0){
						$hashpass = password_hash($Pass, PASSWORD_DEFAULT); // hashes password which user entered stored in pass and stores in hashpass
						$sql1="INSERT INTO login (Username, Email, Password, fName, lName) VALUES ('".$User."','".$email."','".$hashpass."','".$fName."','".$lName."')"; // if the submit button is pressed it will insert the username and password into the database
							if ($conn->query ($sql1) == TRUE) { 
								$to = $email;
								$subject = "Student Accommodation";
								$txt = "You have signed up to Student Accommodation, ".$User;
								$from = "From: StudentAccommodation";
								
								//mail($to,$subject,$txt,$from);
								//return $result;
								return true;
							} else{return false;}
						}else{return false;}
					}else{return false;}
				}else{return false;}
			} else {
				echo "Password does not match!";
			}
		}
		
		
		
	
		public function StudentLogin($User, $Pass){
			$Db=new Database();
			$conn = $Db->Connect();	
        	
			$sql2="SELECT * from login WHERE Username='".$User."'";
	
			$result2 = $conn->query($sql2);
			$numrows2 = $result2->num_rows;
			$row = $result2->fetch_assoc();
			$hashpass = password_verify($Pass, $row['Password']); //decrypts password to check if its true or false
			
	        if ($numrows2 == 1 and $hashpass == TRUE) {
	     
				$_SESSION['login'] = $User; // storing user in adminlogin
				$_SESSION['Loggedin'] = TRUE;
				header("Refresh:0");
				
	            return true;
	        }
	        else{
			    return false;
			}
    	}

   
	    

	    public function StudentLogout() {
	        $_SESSION['login'] = FALSE;
	        session_destroy();
			echo "logged out";
			header("Refresh:0");
	    }

		public function BookingsLink(){
			if(isset($_SESSION['login']) == TRUE){
				echo '<a href="DeleteBookingForm.php">Bookings</a>';
			}
		}
		
		public function PaymentsLink(){
			if(isset($_SESSION['login']) == TRUE){
				echo '<a href="Payment.php">Payment</a>';
			}
		}
		public function MaintenanceLink(){
			if(isset($_SESSION['login']) == TRUE){
				echo '<a href="Maintenance.php">Maintenance</a>';
			}
		}
		public function SettingsLink(){
			if(isset($_SESSION['login']) == TRUE){
				echo '<a href="Settings.php">Settings</a>';
			}
		}
		
		public function StudentEmailChange($email, $SUser){
			
			$Db=new Database();
			$conn = $Db->Connect();	
			
			//$SUser =  $_SESSION['login'];
			
			$sql2="SELECT * from login WHERE Username='".$SUser."'";
			$result2 = $conn->query($sql2);
			$numrows2 = $result2->num_rows;
			
			$sql1 = "SELECT * FROM login WHERE Email = '".$email."'";
			$result1 = $conn->query($sql1);
			$numrows1 = $result1->num_rows;
			
			if (filter_var($email, FILTER_VALIDATE_EMAIL)) { 
				if ($numrows1==0 AND $email != NULL AND $numrows2 == 1){
					$sql = "Update login SET Email = '".$email."' WHERE Username ='".$SUser."'";
					if ($conn->query ($sql) == TRUE) { 
						return true;
					} else {
						return false;
					}
				}
			}
		
		}
		
		public function StudentPasswordChange($Pass, $SUser , $Pass2){
			
			$Db=new Database();
			$conn = $Db->Connect();	
			
			
			$sql2="SELECT * from login WHERE Username='".$SUser."'";
			$result2 = $conn->query($sql2);
			$numrows2 = $result2->num_rows;
			
		//	$SUser =  $_SESSION['login'];
		
			if ($Pass != NULL AND $Pass == $Pass2 AND $numrows2 == 1){
				$hashpass = password_hash($Pass, PASSWORD_DEFAULT);	
					
				$sql = "Update login SET Password = '".$hashpass."' WHERE Username ='".$SUser."'";
				if ($conn->query ($sql) == TRUE) { 
					return true;
				} else {
					return false;
				}
			}
		}
		
	}
	
	
	


?>