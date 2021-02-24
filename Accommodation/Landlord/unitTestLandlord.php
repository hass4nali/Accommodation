<?php
include ("LandLordLogin.php");

class unitTestLandlord extends PHPUnit\Framework\TestCase {

	public function testLandlordLogin(){
		$LUser = "hassan";
		$LPass = "ali";
		$LL = new Landlord();
		$login=  $LL->LandlordLogin($LUser, $LPass);	
		
		if ( $login  ) {
			$this->assertTrue(True);
		} else {
			$this->assertTrue(False);
		}
			
	}
	
	public function testLandlordRegister(){
		$LUser = "unittest".uniqid();
		$LPass = "pass";
		$AUser = "hassan";
		$ACheck = TRUE;
		$Lemail = "unittest".uniqid()."@gmail.co.uk";
		$LFName = "firstname";
		$LLName = "lastname";
		$RPass = "pass";
		
		$LL = new Landlord();
		$register = $LL->LandlordRegister($LUser, $LPass, $Lemail, $LFName, $LLName, $AUser, $ACheck, $RPass);	
		
		if ( $register ) {
			$this->assertTrue(True);
		} else {
			$this->assertTrue(False);
		}
			
	}
	
	public function testLandlordEmailChange(){
	
		
		$email = "unittestemail".uniqid()."@gmail.co.uk";
		
		$LUser = "unittest";
					
		$LR = new Landlord();
		$ChangeEmail=  $LR->LandlordEmailChange($email, $LUser);	
		
		if ( $ChangeEmail ) {
			$this->assertTrue(True);
		} else {
			$this->assertTrue(False);
		}
			
	}
	
	public function testLandlordPasswordChange(){
	
		$LUser = "unittest";
		$Pass = "newpassword";
		$Pass2 = "newpassword";
		
		$LR = new Landlord();
		$ChangePass=  $LR->LandlordPasswordChange($Pass, $LUser ,$Pass2);	
		
		if ( $ChangePass ) {
			$this->assertTrue(True);
		} else {
			$this->assertTrue(False);
		}
			
	}
	
	
}




?>