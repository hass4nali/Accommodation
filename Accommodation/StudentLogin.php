<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html>
<head>
 <title>Login Form</title>
    
<body>
   <div class="loginbox">
   <a href="Index.php">Back</a>
   
<form action="StudentLogin.php" method="POST">
<p>Username</p>
<input type="text" name="User">
<p>Password</p>
<input type="password" name="Pass"><br>
<input type="submit" name="submit" value="Login">

<input type="submit" name="logout" value="Log Out">
<a href="StudentForgotPassword.php">Lost your password?</a><br><br>
<a href="StudentRegister.php">Not registered? Create an account</a><br>
</form>
</div>

<?php

 include ("Database.php");



if(isset($_SESSION['Loggedin']) == TRUE){
	echo 'User logged in as: ',$_SESSION['login'];
}

Class Student{
	public function StudentLogin($User, $Pass){
		$Db=new Database();
		$conn = $Db->Connect();
		$sql = "SELECT * FROM login WHERE Username = '".$User."'";  
		
		$result = $conn->query($sql);
		$numrows = $result->num_rows;
		
		if($numrows == 0) 
	{
		echo ("Username is incorrect! \n"); 
	}
	else 
	{ 
		$row = $result->fetch_assoc();
		
		$hashpass = password_verify($Pass, $row['Password']); //decrypts password to check if its true or false
		if($hashpass == TRUE) //if password returns true
		{ 	
			$_SESSION['login'] = $User; // storing user in adminlogin
			echo ("LOGGED IN");
			$_SESSION['Loggedin'] = TRUE;
			header("Location: StudentLogin.php");
			die();
		}
		else {
			echo ("Password is incorrect! \n"); 
		}
	}$conn->close();
	}
	
}

if (isset($_POST["submit"])){
		$User = $_POST['User'];
		$Pass = $_POST['Pass'];
		$SL = new Student();
		$SL->StudentLogin($User, $Pass);
	}

if (isset($_POST["logout"]))
{
	session_destroy(); 
	header("Location: StudentLogin.php");
}


?>
