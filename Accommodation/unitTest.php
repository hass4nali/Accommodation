<?php
include ("Login.php");
include ("Database.php");

class unitTest extends PHPUnit\Framework\TestCase {



	public function testStudentLogin(){
		$User = "hassan";
		$Pass = "ali";
		$Us = new User();
		$login=  $Us->StudentLogin($User, $Pass);	
		
		if ( $login  ) {
			$this->assertTrue(True);
		} else {
			$this->assertTrue(False);
		}
			
	}
		
	public function testStudentRegister(){
		$User = "unittest".uniqid();
		$Pass = "ali";
		$email = "unittest".uniqid()."@gmail.co.uk";
		$fName = "unittest";
		$lName = "ali";
		$RPass = "ali";
		
		$Us = new User();
		$Register=  $Us->StudentRegister($User, $Pass, $email, $fName, $lName, $RPass);	
		
		if ( $Register ) {
			$this->assertTrue(True);
		} else {
			$this->assertTrue(False);
		}
			
	}
	
	public function testStudentEmailChange(){
	
		
		$email = "unittestemail".uniqid()."@gmail.co.uk";
		
		$SUser = "unittest";
					
		$Us = new User();
		$ChangeEmail=  $Us->StudentEmailChange($email, $SUser);	
		
		if ( $ChangeEmail ) {
			$this->assertTrue(True);
		} else {
			$this->assertTrue(False);
		}
			
	}
	
	public function testStudentPasswordChange(){
	
		$SUser = "unittest";
		$Pass = "newpassword";
		$Pass2 = "newpassword";
		
		$Us = new User();
		$ChangePass=  $Us->StudentPasswordChange($Pass, $SUser ,$Pass2);	
		
		if ( $ChangePass ) {
			$this->assertTrue(True);
		} else {
			$this->assertTrue(False);
		}
			
	}
	
	
}




?>