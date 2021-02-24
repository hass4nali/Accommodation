<?php
include ("Properties.php");

class unitTest extends PHPUnit\Framework\TestCase {


	

				
	public function testImage(){
		$PID= "60";
		
		$Prop = new Properties();
		$Prop->ViewImage($PID);
		
		$this->expectOutputString("Landlord/imageuploads/4head.pngfd2e70a46284e3ed341b1ed9ad890734");

	}
	
	public function testPrice(){
		$PID= "60";
		
		$Prop = new Properties();
		$Prop->ViewPrice($PID);

		$this->expectOutputString("<h1>£1.00 per week</h1>");

	}
	
	public function testStreet(){
		$PID= "60";
		
		$Prop = new Properties();
		$Prop->ViewStreet($PID);

		$this->expectOutputString("Street");

	}

	public function testCity(){
		$PID= "60";
		
		$Prop = new Properties();
		$Prop->ViewCity($PID);

		$this->expectOutputString("Bradford");

	}
	
	public function testMap(){
		$PID= "60";
		
		$Prop = new Properties();
		$Prop->ViewMap($PID);

		$this->expectOutputString("");

	}
	
	public function testCounty(){
		$PID= "60";
		
		$Prop = new Properties();
		$Prop->ViewCounty($PID);

		$this->expectOutputString("West Yorkshire");

	}
		

	public function testRoomsAvailable(){
		$PID= "60";
		
		$Prop = new Properties();
		$Prop->ViewRoomsAvailable($PID);

		$this->expectOutputString("Rooms Available: 1");

	}	
	
	
	public function testBedrooms(){
		$PID= "60";
		
		$Prop = new Properties();
		$Prop->ViewBedrooms($PID);

		$this->expectOutputString("Bedrooms: 1 ");

	}	
	
	public function testBathroms(){
		$PID= "60";
		
		$Prop = new Properties();
		$Prop->ViewBathrooms($PID);

		$this->expectOutputString("Bathrooms: 1 ");

	}

	public function testLounges(){
		$PID= "60";
		
		$Prop = new Properties();
		$Prop->ViewLounges($PID);

		$this->expectOutputString("Lounges: 1 ");

	}
	
	public function testDescription(){
		$PID= "60";
		
		$Prop = new Properties();
		$Prop->ViewDescription($PID);

		$this->expectOutputString("1");

	}
	

	
	public function testLandlordUpdateCounty(){
		$PID= "61";
		$County= "West Yorkshire";
		$LR="hassan";
		$Prop = new Properties();
		$UpdateCounty=$Prop->LandlordUpdateCounty($County, $PID, $LR);

		if ( $UpdateCounty ) {
			$this->assertTrue(True);
		} else {
			$this->assertTrue(False);
		}

	}
	
	public function testLandlordUpdateCity(){
		$PID= "61";
		$City= "Bradford";
		$LR="hassan";
		$Prop = new Properties();
		$UpdateCity=$Prop->LandlordUpdateCity($City, $PID, $LR);

		if ( $UpdateCity ) {
			$this->assertTrue(True);
		} else {
			$this->assertTrue(False);
		}

	}
	
	public function testLandlordUpdateStreet(){
		$PID= "61";
		$Street= "UnitTestStreet";
		$LR="hassan";
		$Prop = new Properties();
		$UpdateCity=$Prop->LandlordUpdateStreet($Street, $PID, $LR);

		if ( $UpdateCity ) {
			$this->assertTrue(True);
		} else {
			$this->assertTrue(False);
		}

	}

	public function testLandlordUpdatePrice(){
		$PID= "61";
		$Price= "1";
		$LR="hassan";
		$Prop = new Properties();
		$UpdatePrice=$Prop->LandlordUpdatePrice($Price, $PID, $LR);

		if ( $UpdatePrice ) {
			$this->assertTrue(True);
		} else {
			$this->assertTrue(False);
		}

	}
	
	public function testLandlordUpdateBedrooms(){
		$PID= "61";
		$Bedrooms= "1";
		$LR="hassan";
		$Prop = new Properties();
		$UpdateBedrooms=$Prop->LandlordUpdateBedrooms($Bedrooms, $PID, $LR);

		if ( $UpdateBedrooms ) {
			$this->assertTrue(True);
		} else {
			$this->assertTrue(False);
		}

	}
	
	public function testLandlordUpdateBathrooms(){
		$PID= "61";
		$Bathrooms= "1";
		$LR="hassan";
		$Prop = new Properties();
		$UpdateBathrooms=$Prop->LandlordUpdateBathrooms($Bathrooms, $PID, $LR);

		if ( $UpdateBathrooms ) {
			$this->assertTrue(True);
		} else {
			$this->assertTrue(False);
		}

	}
	
	public function testLandlordUpdateLounge(){
		$PID= "61";
		$Lounge= "1";
		$LR="hassan";
		$Prop = new Properties();
		$UpdateLounge=$Prop->LandlordUpdateLounge($Lounge, $PID, $LR);

		if ( $UpdateLounge ) {
			$this->assertTrue(True);
		} else {
			$this->assertTrue(False);
		}

	}
	
	public function testLandlordUpdateMap(){
		$PID= "61";
		$Map= '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2356.917551817035!2d-1.763110340024679!3d53.790954960714!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487be6b5896a3c2b%3A0x3e1c202b0be48ed2!2sUniversity%20of%20Bradford!5e0!3m2!1sen!2suk!4v1582490678219!5m2!1sen!2suk" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>';
		$LR="hassan";
		$Prop = new Properties();
		$UpdateMap=$Prop->LandlordUpdateMap($Map, $PID, $LR);

		if ( $UpdateMap ) {
			$this->assertTrue(True);
		} else {
			$this->assertTrue(False);
		}

	}
	
	public function testLandlordUpdateDescription(){
		$PID= "61";
		$Description= "This is a discription.";
		$LR="hassan";
		$Prop = new Properties();
		$UpdateDescription=$Prop->LandlordUpdateDescription($Description, $PID, $LR);

		if ( $UpdateDescription ) {
			$this->assertTrue(True);
		} else {
			$this->assertTrue(False);
		}

	}
	/*
	public function testLandlordDeleteProperty(){
		$PID= "62";
		$LR="unittest5e5aa3c9bbf5a";
		$Prop = new Properties();
		$DeleteProperty=$Prop->LandlordDeleteProperty($PID, $LR);

		if ( $DeleteProperty ) {
			$this->assertTrue(True);
		} else {
			$this->assertTrue(False);
		}

	}
*/
	public function testLandlordSearchProperty(){
		$City= "Bradford";
		$Price="1";
		$Bedrooms="1";
		$Bathrooms="2";
		$Bathrooms="1";
		$Lounge="1";
		$Prop = new Properties();
		$SearchProperty=$Prop->LandlordSearchProperty($City, $Price, $Bedrooms, $Bathrooms, $Lounge);

		if ( $SearchProperty ) {
			$this->assertTrue(True);
		} else {
			$this->assertTrue(False);
		}

	}
	
	public function testAdminSearchProperty(){
		$City= "Bradford";
		$Price="1";
		$Bedrooms="1";
		$Bathrooms="1";
		$Bathrooms="1";
		$Lounge="1";
		$Prop = new Properties();
		$SearchProperty=$Prop->AdminSearchProperty($City, $Price, $Bedrooms, $Bathrooms, $Lounge);

		if ( $SearchProperty ) {
			$this->assertTrue(True);
		} else {
			$this->assertTrue(False);
		}

	}
	
	public function testSearchProperty(){
		$City= "Bradford";
		$Price="1";
		$Bedrooms="1";
		$Bathrooms="1";
		$Bathrooms="1";
		$Lounge="1";
		$Prop = new Properties();
		$SearchProperty=$Prop->SearchProperty($City, $Price, $Bedrooms, $Bathrooms, $Lounge);

		if ( $SearchProperty ) {
			$this->assertTrue(True);
		} else {
			$this->assertTrue(False);
		}

	}
	
	public function testBooking(){
		
		$PID = "61";
		$SUser="hassan";
		$SCheck=TRUE;
		$Time = "2020-06-22 15:20:00";
		$Prop = new Properties();
		$Booking =$Prop->Booking($Time,$PID,$SUser,$SCheck);

		if ( $Booking ) {
			$this->assertTrue(True);
		} else {
			$this->assertTrue(False);
		}

	}
	/*
	public function testLetProperty(){
		$Street="UnitTestStreet";
		$SUser="unittest";
		$SDate = "2020-04-22";
		$EDate = "2021-04-22";
		$Prop = new Properties();
		$Property =$Prop->LetProperty($SUser, $Street, $SDate, $EDate);

		if ( $Property ) {
			$this->assertTrue(True);
		} else {
			$this->assertTrue(False);
		}

	}
	
	*/
	public function testSendMaintenance(){
		
		$Title = "Other";
		$MSG = "Water leak";
		$SUser = "hassan"; 
		
		$Prop = new Properties();
		$Maintenance=$Prop->SendMaintenance($Title, $MSG, $SUser);
		
		if ( $Maintenance ) {
			$this->assertTrue(True);
		} else {
			$this->assertTrue(False);
		}
	}

	public function testLoadRentedProperties(){
		
		$LUser = "hassan";
		
		$Prop = new Properties();
		$Prop->LoadRentedProperties($LUser);
		
		$this->expectOutputString("9<option value='5'>hassan, Hassan, Ali, The Old Barn, Sunny Bank Lane</option><option value='7'>aname, a, a, The Old Barn, Sunny Bank Lane</option><option value='11'>test, , , Street</option><option value='8'>unittest, test, 321321, UnitTestStreet</option>");
	}
	
	public function testChangeDate(){
		
		$SID = "11";
		$EDate = "2020-08-24";
		
		$Prop = new Properties();
		$Change=$Prop->ChangeDate($SID, $EDate);
		
		if ( $Change ) {
			$this->assertTrue(True);
		} else {
			$this->assertTrue(False);
		}
		
	}
	
	public function testListBookings(){
		$SUser= "hassan";
		
		$Prop = new Properties();
		$List=$Prop->ListBookings($SUser);
		
		if ( $List ) {
			$this->assertTrue(True);
		} else {
			$this->assertTrue(False);
		}

	}
	
	public function testLoadProperties(){
		$LUser= "hassan";
		
		$Prop = new Properties();
		$Prop->LoadProperties($LUser);
		
		$this->expectOutputString("<option value='Street'>Street</option><option value='test2321'>test2321</option>");

	}
	
	public function testDeleteBooking(){
		
		$SUser= "hassan";
		$Del = "61";
		
		$Prop = new Properties();
		$Delete=$Prop->DeleteBooking($SUser, $Del);
		
		if ( $Delete ) {
			$this->assertTrue(True);
		} else {
			$this->assertTrue(False);
		}

	}
	
	public function testViewMaintenance(){
		
		$LUser= "hassan";
		
		$Prop = new Properties();
		$View=$Prop->ViewMaintenance($LUser);
		
		if ( $View ) {
			$this->assertTrue(True);
		} else {
			$this->assertTrue(False);
		}

	}
	
	
	public function testAdminDeleteProperty(){
		$PID= "70";
		$Prop = new Properties();
		$DeleteProperty=$Prop->AdminDeleteProperty($PID);

		if ( $DeleteProperty ) {
			$this->assertTrue(True);
		} else {
			$this->assertTrue(False);
		}

	}

	public function testViewPrice(){
		$SUser= "hassan";
		
		$Prop = new Properties();
		$Prop->LoadPaymentDue($SUser);	

		$this->expectOutputString("<b>Total Due: 0</b>");
	}
}




?>