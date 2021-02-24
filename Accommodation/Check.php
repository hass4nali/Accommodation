<?php
ob_start();
session_start();
?>


<?php
include ("Database.php");
	class Check{

		public function PaymentUpdate(){
			
			$timestamp = time();
			
			if(date('D', $timestamp) === 'Sun') {
				
				$Db=new Database();
				$conn = $Db->Connect();	
				
				$sql = "SELECT * FROM updatecheck WHERE Date = CURDATE()";  
				$result = $conn->query($sql);
				$numrows = $result->num_rows;
				if($numrows == 0) {

					$sql2 = "SELECT * FROM propertieslet WHERE NOW() BETWEEN SDate AND EDate"; 
					
					$result2 = $conn->query($sql2);

					
					if($result2->num_rows > 0) {
						while($row2 = mysqli_fetch_array($result2)) {
							$PID = $row2['PaymentID'];
							
							$sql3 = "SELECT * FROM payment WHERE PaymentID = '".$PID."'"; 
							$result3 = $conn->query($sql3);
							$row3 = mysqli_fetch_array($result3);
							
							$RR = $row3['RentRate'];
							
							$sql4="UPDATE payment SET TotalDue = TotalDue + '".$RR."' Where PaymentID = '".$PID."'";
							
							$result4 = $conn->query($sql4);
			
						}
					}
					
					
					$sql5="INSERT INTO updatecheck (Date) VALUES (NOW())";
					$result5 = $conn->query($sql5);

					
				}
			}
    	}
		
		public function RoomsTakenUpdate(){
			
			$Db=new Database();
			$conn = $Db->Connect();
			
			$sql2 = "SELECT * FROM updatecheck WHERE Date = CURDATE()";  
			$result2 = $conn->query($sql2);
			$numrows = $result2->num_rows;
			if($numrows == 0) {
			
			
				$sql = "SELECT * FROM propertieslet WHERE EDate = CURDATE()"; 
				
				$result = $conn->query($sql);
				if($result->num_rows > 0) {
					while($row = mysqli_fetch_array($result)) {
						$PID = $row['PropertyID'];
						$PayID = $row['PaymentID'];
						
						$sql1 = "SELECT * FROM payment WHERE PaymentID = '".$PID."'"; 
						$result1 = $conn->query($sql1);
						$row1 = mysqli_fetch_array($result1);
						$TotalDue = $row1['TotalDue'];
						$TotalPaid = $row1['TotalPaid'];
						
						if ($TotalPaid >= $TotalDue){
							
							$sql4="UPDATE properties SET RoomsTaken = RoomsTaken - '1' Where PropertyID = '".$PID."'";
							$result4 = $conn->query($sql4);
							
						}
							
					}
				}
				
					$sql5="INSERT INTO updatecheck (Date) VALUES (NOW())";
					$result5 = $conn->query($sql5);
			
			}
		
		}

	}
	
	
	$Ch = new Check();
	$Ch->PaymentUpdate();
	
	$Ch = new Check();
	$Ch->RoomsTakenUpdate();
	
    function refresh( $time ){
        $current_url = $_SERVER[ 'REQUEST_URI' ];
        return header( "Refresh: " . $time . "; URL=$current_url" );
    }

    refresh( 60 );   
	
	
	/*
	$timestamp = time();
	if(date('D', $timestamp) === 'Sun') {
		 echo "It is Sunday today\n";
	}
   */
	


?>