<?php
include ("AdminLogin.php");

class unitTestLandlord extends PHPUnit\Framework\TestCase {

	public function testAdminLogin(){
		$AUser = "hassan";
		$APass = "ali";
		$AD = new Admin();
		$login=  $AD->AdminLogin($AUser, $APass);	
		
		if ( $login  ) {
			$this->assertTrue(True);
		} else {
			$this->assertTrue(False);
		}
			
	}
	
	public function testAdminRegister(){
		$AUser = "unittest".uniqid();
		$APass = "pass";
		$ALogin = TRUE;
		$Aemail = "unittest".uniqid()."@gmail.co.uk";
		$RPass = "pass";
		
		$AD = new Admin();
		$register = $AD->AdminRegister($AUser, $APass, $Aemail, $ALogin, $RPass);	
		
		if ( $register ) {
			$this->assertTrue(True);
		} else {
			$this->assertTrue(False);
		}
			
	}
	
	public function testAdminEmailChange(){
	
		
		$Aemail = "unittestemail".uniqid()."@gmail.co.uk";
		
		$AUser = "unittest";
					
		$AD = new Admin();
		$ChangeEmail=  $AD->AdminEmailChange($Aemail, $AUser);	
		
		if ( $ChangeEmail ) {
			$this->assertTrue(True);
		} else {
			$this->assertTrue(False);
		}
			
	}
	
	public function testAdminPasswordChange(){
	
		$AUser = "unittest";
		$Pass = "newpassword";
		$Pass2 = "newpassword";
		
		$AD = new Admin();
		$ChangePass=  $AD->AdminPasswordChange($Pass, $AUser ,$Pass2);	
		
		if ( $ChangePass ) {
			$this->assertTrue(True);
		} else {
			$this->assertTrue(False);
		}
			
	}
	
	public function testAdminDeleteAccount(){
		
		$DEL="15";
		
		$AD = new Admin();
		$Delete=  $AD->AdminDeleteAccount($DEL);	
		
		if ( $Delete ) {
			$this->assertTrue(True);
		} else {
			$this->assertTrue(False);
		};
			
	}
	
	
}




?>