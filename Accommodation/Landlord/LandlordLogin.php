<?php
ob_start();
session_start();
?>

<?php
include ("../Database.php");
	class Landlord{

		
		public function LandlordRegister($LUser, $LPass, $Lemail, $LFName, $LLName, $AUser, $ACheck, $RPass){
			if(isset($ACheck) == TRUE){
			//	$AUser = $_SESSION['adminlogin'];	
			//	$ACheck=$_SESSION['AdminLoggedin'];
				$Db=new Database();
				$conn = $Db->Connect();	
				
				$sql4 = "SELECT * FROM adminlogin WHERE Username = '".$AUser."'";
				$result4 = $conn->query($sql4);
				$numrows4 = $result4->num_rows;
		
		
		
				if ($result4->num_rows > 0) {
					while($row = $result4->fetch_assoc()) {
						$AID = $row["AdminID"];
					}
				}
				
				$sql="SELECT * FROM landlordlogin WHERE Username='".$LUser."'";

				//checking if the username or email is available in db
				$result = $conn->query($sql);
				$numrows = $result->num_rows;

				
				$sql1 = "SELECT * FROM landlordlogin WHERE Email = '".$Lemail."'";
				$result1 = $conn->query($sql1);
				$numrows1 = $result1->num_rows;
				
				//if the username is not in db then insert to the table
				if($APass == $RPass){
					if (filter_var($Lemail, FILTER_VALIDATE_EMAIL)) { 
						if ($numrows==0){
							if ($numrows1==0){
							$hashpass = password_hash($LPass, PASSWORD_DEFAULT); // hashes password which user entered stored in pass and stores in hashpass
							$sql1="INSERT INTO landlordlogin (AdminID, Username, Email, Password, fName, lName) VALUES ('".$AID."','".$LUser."','".$Lemail."','".$hashpass."','".$LFName."','".$LLName."')"; // if the submit button is pressed it will insert the username and password into the database
								if ($conn->query ($sql1) == TRUE) { 
									//echo "<p>Login Created</p>";
									$to = $Lemail;
									$subject = "Student Accommodation";
									$txt = "You have signed up to Student Accommodation";
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
			}else{header("Location: ../Admin/AdminLoginForm.php");}
		}
		
		
		
		public function LandlordLogin($LUser, $LPass){
			$Db=new Database();
			$conn = $Db->Connect();	
        	
			$sql2="SELECT * from landlordlogin WHERE Username='".$LUser."'";
	
			$result2 = $conn->query($sql2);
			$numrows2 = $result2->num_rows;
			$row = $result2->fetch_assoc();
			$hashpass = password_verify($LPass, $row['Password']); //decrypts password to check if its true or false
			
	        if ($numrows2 == 1 and $hashpass == TRUE) {
	     
				$_SESSION['Lordlogin'] = $LUser; // storing user in adminlogin
				$_SESSION['LandlordLoggedin'] = TRUE;
				
	            return true;
	        }
	        else{
			    return false;
			}
    	}
		

		public function LandlordEmailChange($email, $LUser){
			
			$Db=new Database();
			$conn = $Db->Connect();	
			
			//$LUser =  $_SESSION['Lordlogin'];
			
			$sql2="SELECT * from landlordlogin WHERE Username='".$LUser."'";
			$result2 = $conn->query($sql2);
			$numrows2 = $result2->num_rows;
			
			$sql1 = "SELECT * FROM landlordlogin WHERE Email = '".$email."'";
			$result1 = $conn->query($sql1);
			$numrows1 = $result1->num_rows;
			
			if (filter_var($email, FILTER_VALIDATE_EMAIL)) { 
				if ($numrows1==0 AND $email != NULL AND $numrows2 == 1){
					$sql = "Update landlordlogin SET Email = '".$email."' WHERE Username ='".$LUser."'";
					if ($conn->query ($sql) == TRUE) { 
						return true;
					} else {
						return false;
					}
				}
			}
		
		}
		
		public function LandlordPasswordChange($Pass, $LUser , $Pass2){
			
			$Db=new Database();
			$conn = $Db->Connect();	
			
			
			$sql2="SELECT * from landlordlogin WHERE Username='".$LUser."'";
			$result2 = $conn->query($sql2);
			$numrows2 = $result2->num_rows;
			
		//	$LUser =  $_SESSION['Lordlogin'];
		
			if ($Pass != NULL AND $Pass == $Pass2 AND $numrows2 == 1){
				$hashpass = password_hash($Pass, PASSWORD_DEFAULT);	
					
				$sql = "Update landlordlogin SET Password = '".$hashpass."' WHERE Username ='".$LUser."'";
				if ($conn->query ($sql) == TRUE) { 
					return true;
				} else {
					return false;
				}
			}
		}    	

		
		
		
		
		
		
		
		
		

	    public function LandlordLogout() {
	        $_SESSION['LandlordLoggedin'] = FALSE;
	        session_destroy();
			echo "logged out";
	    }

	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	if (isset($_POST["logout"])){
	$LS = new Landlord();
		//$Us->StudentLogin($User, $Pass);
		
    $LS->LandlordLogout();
//	session_destroy(); 
	//header("Location: StudentLogin.php");
}

?>