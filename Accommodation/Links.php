<?php
class Links{
		
	public function BookingsLink(){
		if(isset($_SESSION['login']) == TRUE){
			echo '<a href="#">Bookings</a>';
		}
	}
	public function PaymentsLink(){
		if(isset($_SESSION['login']) == TRUE){
			echo '<a href="#">Payment</a>';
		}
	}
	public function MaintenanceLink(){
		if(isset($_SESSION['login']) == TRUE){
			echo '<a href="#">Maintenance</a>';
		}
	}

}
	
	

?>