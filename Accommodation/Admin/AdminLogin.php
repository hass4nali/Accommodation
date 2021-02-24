<?php
ob_start();
session_start();
?>


<?php
include ("../Database.php");
	class Admin{




		public function AdminRegister($AUser, $APass, $Aemail, $ALogin, $RPass){
			
			$ALogin=$_SESSION['AdminLoggedin'];
			
			if(isset($ALogin) == TRUE){
				$Db=new Database();
				$conn = $Db->Connect();	
		
				$sql="SELECT * FROM adminlogin WHERE Username='".$AUser."'";

				//checking if the username or email is available in db
				$result = $conn->query($sql);
				$numrows = $result->num_rows;

				
				$sql1 = "SELECT * FROM adminlogin WHERE Email = '".$Aemail."'";
				$result1 = $conn->query($sql1);
				$numrows1 = $result1->num_rows;
				
				//if the username is not in db then insert to the table
				if($APass == $RPass){
					if (filter_var($Aemail, FILTER_VALIDATE_EMAIL)) { 
						if ($numrows==0){
							if ($numrows1==0){
							$hashpass = password_hash($APass, PASSWORD_DEFAULT); // hashes password which user entered stored in pass and stores in hashpass
							$sql1="INSERT INTO adminlogin (Username, Email, Password) VALUES ('".$AUser."','".$Aemail."','".$hashpass."')"; // if the submit button is pressed it will insert the username and password into the database
							
								if ($conn->query ($sql1) == TRUE) { 
									//echo "<p>Login Created</p>";
									$to = $Aemail;
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
			}else{return false;}
		}
		
		
		
		
		
	
		public function AdminLogin($AUser, $APass){
			$Db=new Database();
			$conn = $Db->Connect();	
        	
			$sql2 = "SELECT * FROM adminlogin WHERE Username = '".$AUser."'";  
	
			$result2 = $conn->query($sql2);
			$numrows2 = $result2->num_rows;
			$row = $result2->fetch_assoc();
			$hashpass = password_verify($APass, $row['Password']); //decrypts password to check if its true or false
			
	        if ($numrows2 == 1 and $hashpass == TRUE) {
	     
				$_SESSION['adminlogin'] = $AUser; // storing user in adminlogin
				$_SESSION['AdminLoggedin'] = TRUE;
	            return true;
					
	        }
	        else{
			    return false;
			}
    	}
		
		
		
		
		public function AdminListAccount(){
			$Db=new Database();
			$conn = $Db->Connect();	
        	
			$sql = "SELECT * FROM landlordlogin";  
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()){
					
				echo '<div class="deleteboxed">';
					echo "<b>Name:</b> ". $row['fName']. " ".$row['lName']; 
					echo '<br>';
					echo "<b>Username:</b> " . $row['Username'];
					echo '<br>';
					echo "<b>Email:</b> " . $row['Email'];
					echo '<br>';

					
					echo "<a href='DeleteAccountForm.php?Delete=" . $row['LandlordID']."'class='button' OnClick=\"return confirm('Are you sure you want to delete " .$row['Username']."');\">Delete</a> <br><br>"; 
				
				echo '</div>';
				}
			
			}
			
		}
		
		public function AdminDeleteAccount($DEL){			
			$Db=new Database();
			$conn = $Db->Connect();	
        	
			//$DEL=$_GET['Delete'];
			
			$sql = "SELECT * FROM landlordlogin";  
				$sql = "DELETE FROM landlordlogin WHERE LandlordID=" . $DEL; 

				if ($conn->query($sql) === TRUE) {
					echo "Deleted Account"; 
					return true;
					
				}else{
					echo "Landlord owns a property!";
					//echo "<br>Error: " .$sql . "<br>" . $conn->error; 
				}
		}
		
		
		public function AdminEmailChange($Aemail, $AUser){
			
			$Db=new Database();
			$conn = $Db->Connect();	
			
			//$AUser =  $_SESSION['adminlogin'];
			
			$sql2="SELECT * from adminlogin WHERE Username='".$AUser."'";
			$result2 = $conn->query($sql2);
			$numrows2 = $result2->num_rows;
			
			$sql1 = "SELECT * FROM adminlogin WHERE Email = '".$Aemail."'";
			$result1 = $conn->query($sql1);
			$numrows1 = $result1->num_rows;
			
			if (filter_var($Aemail, FILTER_VALIDATE_EMAIL)) { 
				if ($numrows1==0 AND $Aemail != NULL AND $numrows2 == 1){
					$sql = "Update adminlogin SET Email = '".$Aemail."' WHERE Username ='".$AUser."'";
					if ($conn->query ($sql) == TRUE) { 
						return true;
					} else {
						return false;
					}
				}
			}
		
		}
		
		public function AdminPasswordChange($Pass, $AUser , $Pass2){
			
			$Db=new Database();
			$conn = $Db->Connect();	
			
			
			$sql2="SELECT * from adminlogin WHERE Username='".$AUser."'";
			$result2 = $conn->query($sql2);
			$numrows2 = $result2->num_rows;
			
		//	$AUser =  $_SESSION['adminlogin'];
		
			if ($Pass != NULL AND $Pass == $Pass2 AND $numrows2 == 1){
				$hashpass = password_hash($Pass, PASSWORD_DEFAULT);	
					
				$sql = "Update adminlogin SET Password = '".$hashpass."' WHERE Username ='".$AUser."'";
				if ($conn->query ($sql) == TRUE) { 
					return true;
				} else {
					return false;
				}
			}
		}	

		
		
		
		
		
		
	    public function AdminLogout() {
	        $_SESSION['login'] = FALSE;
	        session_destroy();
			echo "logged out";
	    }

	}
	
	


	
	
		
if(isset($_SESSION['AdminLoggedin']) == TRUE){
	
	//echo 'Admin logged in as: ',$_SESSION['adminlogin'];
}
	
	
	
	
	
	
	
	
	if (isset($_POST["logout"])){
	$AL = new Admin();
		//$Us->StudentLogin($User, $Pass);
		
    $AL->AdminLogout();
	header("Location: AdminLoginForm.php");
//	session_destroy(); 
	//header("Location: StudentLogin.php");
}

?>