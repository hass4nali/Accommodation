<?php
ob_start();
session_start();
?>

<?php
include ("Database.php");
Class Properties{
	public function ListProperties(){

		$Db=new Database();
		$conn = $Db->Connect();
	$sql = "SELECT * FROM properties";
		$result = $conn->query($sql);
	
		if($result->num_rows > 0) {
			while($row = mysqli_fetch_array($result)) {
				echo"<a href='ViewProperty.php?id={$row['PropertyID']}'>{$row['Street']}</a><br>\n";
			}
		}else {
			echo"<h2>No properties available!</h2>";
		}
		
			
		
	}
	
	public function ViewProperty(){
	
		$PID = $_GET['id'];
		
		$Db=new Database();
		$conn = $Db->Connect();
		$sql = "SELECT * FROM properties WHERE PropertyID ='".$PID."'";
		$result = $conn->query($sql);
		
		$row = mysqli_fetch_array($result);
		
		echo "<img src='Landlord/uploadimages/". $row['Image'] ."'  width= 50% />";
		echo "<h3>£" . $row['Price'] . " per week</h3>";
		echo "<h3>Street: " . $row['Street'] . "</h3>";
		echo "<h3>City: " . $row['City'] . "</h3>";
		echo "<h3>County: " . $row['County'] . "</h3>";
		echo  $row['Map'];
		
	}
	
	
	public function ViewImage($PID){
		
		$Db=new Database();
		$conn = $Db->Connect();
		$sql = "SELECT * FROM image WHERE PropertyID ='".$PID."'";
		$result = $conn->query($sql);
		
		$row = mysqli_fetch_array($result);
		
		echo 'Landlord/imageuploads/'. $row['image'];
		
	}
	
	public function ViewPrice($PID){
	
		//$PID = $_GET['id'];
		
		$Db=new Database();
		$conn = $Db->Connect();
		$sql = "SELECT * FROM properties WHERE PropertyID ='".$PID."'";
		$result = $conn->query($sql);
		
		$row = mysqli_fetch_array($result);
		
		echo "<h1>£" . $row['Price'] . " per week</h1>";
		
	}
	
	public function ViewStreet($PID){
	
		//$PID = $_GET['id'];
		
		$Db=new Database();
		$conn = $Db->Connect();
		$sql = "SELECT * FROM properties WHERE PropertyID ='".$PID."'";
		$result = $conn->query($sql);
		
		$row = mysqli_fetch_array($result);
		
		echo  $row['Street'];
		
	}
	
	public function ViewCity($PID){
	
				
		$Db=new Database();
		$conn = $Db->Connect();
		$sql = "SELECT * FROM properties WHERE PropertyID ='".$PID."'";
		$result = $conn->query($sql);
		
		$row = mysqli_fetch_array($result);
		
		echo  $row['City'];
		
	}
	
	public function ViewCounty($PID){
	
		
		$Db=new Database();
		$conn = $Db->Connect();
		$sql = "SELECT * FROM properties WHERE PropertyID ='".$PID."'";
		$result = $conn->query($sql);
		
		$row = mysqli_fetch_array($result);
		
		echo $row['County'];
		
	}
	
	public function ViewMap($PID){
	

		
		$Db=new Database();
		$conn = $Db->Connect();
		$sql = "SELECT * FROM properties WHERE PropertyID ='".$PID."'";
		$result = $conn->query($sql);
		
		$row = mysqli_fetch_array($result);
		
		echo  $row['Map'];
		
	}
	
	public function ViewBedrooms($PID){
	
	
		
		$Db=new Database();
		$conn = $Db->Connect();
		$sql = "SELECT * FROM properties WHERE PropertyID ='".$PID."'";
		$result = $conn->query($sql);
		
		$row = mysqli_fetch_array($result);
		
		echo "Bedrooms: " . $row['Bedrooms']. " ";
		
	}
	
	public function ViewBathrooms($PID){
	
		$Db=new Database();
		$conn = $Db->Connect();
		$sql = "SELECT * FROM properties WHERE PropertyID ='".$PID."'";
		$result = $conn->query($sql);
		
		$row = mysqli_fetch_array($result);
		
		echo "Bathrooms: " . $row['Bathrooms']. " ";
		
	}
	
	public function ViewLounges($PID){
	

		
		$Db=new Database();
		$conn = $Db->Connect();
		$sql = "SELECT * FROM properties WHERE PropertyID ='".$PID."'";
		$result = $conn->query($sql);
		
		$row = mysqli_fetch_array($result);
		
		echo "Lounges: " . $row['Lounge']. " ";
		
	}
	
	
	public function ViewDescription($PID){
	
	
		
		$Db=new Database();
		$conn = $Db->Connect();
		$sql = "SELECT * FROM properties WHERE PropertyID ='".$PID."'";
		$result = $conn->query($sql);
		
		$row = mysqli_fetch_array($result);
		
		echo $row['Description'];
		
	}
	
	public function ViewRoomsAvailable($PID){
		
		//$PID = $_GET['id'];
		
		$Db=new Database();
		$conn = $Db->Connect();
		$sql = "SELECT * FROM properties WHERE PropertyID ='".$PID."'";
		$result = $conn->query($sql);
		
		$row = mysqli_fetch_array($result);
		
		$a = $row['Bedrooms'];
		$b = $row['RoomsTaken'];
		
		$c = $a-$b;
		echo "Rooms Available: " .$c;
		
	}
	
	public function LandlordViewProperty($PID){
	
		//$PID = $_GET['id'];
		
		$Db=new Database();
		$conn = $Db->Connect();
		$sql = "SELECT * FROM properties WHERE PropertyID ='".$PID."'";
		$result = $conn->query($sql);
		
		$row = mysqli_fetch_array($result);
		
		
		
		// LOAD MULTIPLE ALL IMAGES WITH SAME PID
		$sql2 = "SELECT * FROM image WHERE PropertyID ='".$PID."'";
		$result2 = $conn->query($sql2);
				
		if($result2->num_rows > 0) {
			while($row2 = mysqli_fetch_array($result2)) {
				echo "<img src='imageuploads/". $row2['image'] ."'  />";
			echo "<a href='LandlordViewProperty.php?Delete=" . $row2['ImageID']."'\">Delete</a> <br><br>"; 
			}
		}
		
		echo "<h3>£" . $row['Price'] . " per week</h3>";
		echo "<h3>Street: " . $row['Street'] . "</h3>";
		echo "<h3>City: " . $row['City'] . "</h3>";
		echo "<h3>County: " . $row['County'] . "</h3>";
		echo "<h3>Bedrooms: " . $row['Bedrooms'] . "</h3>";
		echo "<h3>Bathrooms: " . $row['Bathrooms'] . "</h3>";
		echo "<h3>Lounges: " . $row['Lounge'] . "</h3>";
		echo  $row['Map'];
		echo "<h3>Description: " . $row['Description'] . "</h3>";
		
		
	}
	
	public function LandlordDeleteImage($PID){
		
		$Db=new Database();
		$conn = $Db->Connect();
		
		
		$sql = "DELETE FROM image WHERE ImageID='" . $_GET['Delete']."'"; 

				
			if ($conn->query($sql) === TRUE) {	
			
				header('Location: ' . $_SERVER['HTTP_REFERER']);

			}else{
				
				echo "<br>Error "; 
			}
		
	}
	
	public function AdminViewProperty(){
	
		$PID = $_GET['id'];
		
		$Db=new Database();
		$conn = $Db->Connect();
		$sql = "SELECT * FROM properties WHERE PropertyID ='".$PID."'";
		$result = $conn->query($sql);
		
		$row = mysqli_fetch_array($result);
		
		$sql2 = "SELECT * FROM image WHERE PropertyID ='".$PID."'";
		$result2 = $conn->query($sql2);
				
		if($result2->num_rows > 0) {
			while($row2 = mysqli_fetch_array($result2)) {
				echo "<img src='../Landlord/imageuploads/". $row2['image'] ."'  />";
			}
		}
		echo "<h3>£" . $row['Price'] . " per week</h3>";
		echo "<h3>Street: " . $row['Street'] . "</h3>";
		echo "<h3>City: " . $row['City'] . "</h3>";
		echo "<h3>County: " . $row['County'] . "</h3>";
		echo  $row['Map'];
		echo "<h3>Description: " . $row['Description'] . "</h3>";
		
		
	}
	
	
	public function LandlordUpdateCounty($County, $PID, $LR){
	
		//$PID = $_GET['id'];
		
		$Db=new Database();
		$conn = $Db->Connect();
		//$LR=$_SESSION['Lordlogin'];
		
		$sql1 = "SELECT LandlordID FROM landlordlogin WHERE Username = '".$LR."'";
		$result1 = $conn->query($sql1);
		$row = mysqli_fetch_array($result1);
		$LID = $row['LandlordID'];
	
	
	
		$sql2 = "SELECT LandlordID FROM properties WHERE PropertyID = '".$PID."'";
		$result2 = $conn->query($sql2);
		$row2 = mysqli_fetch_array($result2);
		$LID2 = $row2['LandlordID'];
		
		if($LID == $LID2){
			$sql = "Update properties SET County = '".$County."' WHERE PropertyID ='".$PID."'";
			//$result = $conn->query($sql);
			if ($conn->query ($sql) == TRUE) { 
				return true;
			} else {
				return false;
			}
		}	
	}
	
	
	public function LandlordUpdateCity($City, $PID, $LR){
	
		//$PID = $_GET['id'];
		
		$Db=new Database();
		$conn = $Db->Connect();
		
		
		$sql1 = "SELECT LandlordID FROM landlordlogin WHERE Username = '".$LR."'";
		$result1 = $conn->query($sql1);
		$row = mysqli_fetch_array($result1);
		$LID = $row['LandlordID'];
	
	
	
		$sql2 = "SELECT LandlordID FROM properties WHERE PropertyID = '".$PID."'";
		$result2 = $conn->query($sql2);
		$row2 = mysqli_fetch_array($result2);
		$LID2 = $row2['LandlordID'];
		
		if($LID == $LID2){
			$sql = "Update properties SET City = '".$City."' WHERE PropertyID ='".$PID."'";
			if ($conn->query ($sql) == TRUE) { 
				return true;
			} else {
				return false;
			}
		}	
	}
	
	public function LandlordUpdateStreet($Street, $PID, $LR){
	
		//$PID = $_GET['id'];
		
		$Db=new Database();
		$conn = $Db->Connect();
		
		
		$sql1 = "SELECT LandlordID FROM landlordlogin WHERE Username = '".$LR."'";
		$result1 = $conn->query($sql1);
		$row = mysqli_fetch_array($result1);
		$LID = $row['LandlordID'];
	
	
	
		$sql2 = "SELECT LandlordID FROM properties WHERE PropertyID = '".$PID."'";
		$result2 = $conn->query($sql2);
		$row2 = mysqli_fetch_array($result2);
		$LID2 = $row2['LandlordID'];
		
		if($LID == $LID2){
			$sql = "Update properties SET Street = '".$Street."' WHERE PropertyID ='".$PID."'";
			if ($conn->query ($sql) == TRUE) { 
				return true;
			} else {
				return false;
			}
		}	
	}
	
		public function LandlordUpdatePrice($Price, $PID, $LR){
	
		//$PID = $_GET['id'];
		
		$Db=new Database();
		$conn = $Db->Connect();
		
		
		$sql1 = "SELECT LandlordID FROM landlordlogin WHERE Username = '".$LR."'";
		$result1 = $conn->query($sql1);
		$row = mysqli_fetch_array($result1);
		$LID = $row['LandlordID'];
	
	
	
		$sql2 = "SELECT LandlordID FROM properties WHERE PropertyID = '".$PID."'";
		$result2 = $conn->query($sql2);
		$row2 = mysqli_fetch_array($result2);
		$LID2 = $row2['LandlordID'];
		
		if($LID == $LID2){
			$sql = "Update properties SET Price = '".$Price."' WHERE PropertyID ='".$PID."'";
			if ($conn->query ($sql) == TRUE) { 
				return true;
			} else {
				return false;
			}
		}	
	}
	
	public function LandlordUpdateBedrooms($Bedrooms, $PID, $LR){
	
		//$PID = $_GET['id'];
		
		$Db=new Database();
		$conn = $Db->Connect();
		
		
		$sql1 = "SELECT LandlordID FROM landlordlogin WHERE Username = '".$LR."'";
		$result1 = $conn->query($sql1);
		$row = mysqli_fetch_array($result1);
		$LID = $row['LandlordID'];
	
	
	
		$sql2 = "SELECT LandlordID FROM properties WHERE PropertyID = '".$PID."'";
		$result2 = $conn->query($sql2);
		$row2 = mysqli_fetch_array($result2);
		$LID2 = $row2['LandlordID'];
		
		if($LID == $LID2){
			$sql = "Update properties SET Bedrooms = '".$Bedrooms."' WHERE PropertyID ='".$PID."'";
			if ($conn->query ($sql) == TRUE) { 
				return true;
			} else {
				return false;
			}
		}	
	}
	
	public function LandlordUpdateBathrooms($Bathrooms, $PID, $LR){
	
		//$PID = $_GET['id'];
		
		$Db=new Database();
		$conn = $Db->Connect();
		
		
		$sql1 = "SELECT LandlordID FROM landlordlogin WHERE Username = '".$LR."'";
		$result1 = $conn->query($sql1);
		$row = mysqli_fetch_array($result1);
		$LID = $row['LandlordID'];
	
	
	
		$sql2 = "SELECT LandlordID FROM properties WHERE PropertyID = '".$PID."'";
		$result2 = $conn->query($sql2);
		$row2 = mysqli_fetch_array($result2);
		$LID2 = $row2['LandlordID'];
		
		if($LID == $LID2){
			$sql = "Update properties SET Bathrooms = '".$Bathrooms."' WHERE PropertyID ='".$PID."'";
			if ($conn->query ($sql) == TRUE) { 
				return true;
			} else {
				return false;
			}
		}	
	}
	
	public function LandlordUpdateLounge($Lounge, $PID, $LR){
	
		//$PID = $_GET['id'];
		
		$Db=new Database();
		$conn = $Db->Connect();
		
		
		$sql1 = "SELECT LandlordID FROM landlordlogin WHERE Username = '".$LR."'";
		$result1 = $conn->query($sql1);
		$row = mysqli_fetch_array($result1);
		$LID = $row['LandlordID'];
	
	
	
		$sql2 = "SELECT LandlordID FROM properties WHERE PropertyID = '".$PID."'";
		$result2 = $conn->query($sql2);
		$row2 = mysqli_fetch_array($result2);
		$LID2 = $row2['LandlordID'];
		
		if($LID == $LID2){
			$sql = "Update properties SET Lounge = '".$Lounge."' WHERE PropertyID ='".$PID."'";
			if ($conn->query ($sql) == TRUE) { 
				return true;
			} else {
				return false;
			}
		}	
	}
	
	public function LandlordUpdateMap($Map, $PID, $LR){
	
		//$PID = $_GET['id'];
		
		$Db=new Database();
		$conn = $Db->Connect();
		
		
		$sql1 = "SELECT LandlordID FROM landlordlogin WHERE Username = '".$LR."'";
		$result1 = $conn->query($sql1);
		$row = mysqli_fetch_array($result1);
		$LID = $row['LandlordID'];
	
	
	
		$sql2 = "SELECT LandlordID FROM properties WHERE PropertyID = '".$PID."'";
		$result2 = $conn->query($sql2);
		$row2 = mysqli_fetch_array($result2);
		$LID2 = $row2['LandlordID'];
		
		if($LID == $LID2){
			$sql = "Update properties SET Map = '".$Map."' WHERE PropertyID ='".$PID."'";
			if ($conn->query ($sql) == TRUE) { 
				return true;
			} else {
				return false;
			}
		}	
	}
	
	public function LandlordUpdateDescription($Description, $PID, $LR){
	
		//$PID = $_GET['id'];
		
		$Db=new Database();
		$conn = $Db->Connect();
		
		
		$sql1 = "SELECT LandlordID FROM landlordlogin WHERE Username = '".$LR."'";
		$result1 = $conn->query($sql1);
		$row = mysqli_fetch_array($result1);
		$LID = $row['LandlordID'];
	
	
	
		$sql2 = "SELECT LandlordID FROM properties WHERE PropertyID = '".$PID."'";
		$result2 = $conn->query($sql2);
		$row2 = mysqli_fetch_array($result2);
		$LID2 = $row2['LandlordID'];
		
		if($LID == $LID2){
			$sql = "Update properties SET Description = '".$Description."' WHERE PropertyID ='".$PID."'";
			if ($conn->query ($sql) == TRUE) { 
				return true;
			} else {
				return false;
			}
		}	
	}
	

	
	public function LandlordUpdateImage($PID){
		
		$Db=new Database();
		$conn = $Db->Connect();
				
		$filecount = count($_FILES['file']['name']);
		
		for($i=0;$i<$filecount;$i++){
		$fileName = $_FILES['file']['name'][$i];
		$fileName .= md5(uniqid());
		$sql2 = "INSERT INTO image (PropertyID, image) VALUES ('".$PID."','".$fileName."')";
			if($conn->query($sql2) === True){
				move_uploaded_file($_FILES['file']['tmp_name'][$i], 'imageuploads/'.$fileName);
				echo "FILES UPLOADED ";
				header("Refresh:0");
			} else {
				echo "ERROR";
			}
		}
	}
	
	public function LandlordEditProperty(){
	
		$PID = $_GET['id'];
		
		$Db=new Database();
		$conn = $Db->Connect();
		$sql = "Update properties SET (Street, City, County, Price, Bedrooms, Bathrooms, Lounge, Image) VALUES ('".$Street."','".$City."','".$County."','".$Price."','".$Bedrooms."','".$Bathrooms."','".$Lounge."','".$Image."') WHERE PropertyID ='".$PID."'";
		$result = $conn->query($sql);
		
		
	}
	
	public function LandlordDeleteProperty($PID, $LR){
	
	//	$PID = $_GET['id'];
		
		$Db=new Database();
		$conn = $Db->Connect();

				
		$sql1 = "SELECT LandlordID FROM landlordlogin WHERE Username = '".$LR."'";
		$result1 = $conn->query($sql1);
	
		$row = mysqli_fetch_array($result1);
		
		$LID = $row['LandlordID'];
		
		$sql2 = "SELECT LandlordID FROM properties WHERE PropertyID = '".$PID."'";
		
		$result2 = $conn->query($sql2);
		
		
		$row2 = mysqli_fetch_array($result2);
		
		$LID2 = $row2['LandlordID'];
		
		$sql3 = "SELECT * FROM propertieslet WHERE PropertyID = '".$PID."' AND EDate > CURDATE()";
		
		$result3 = $conn->query($sql3);
		
		if($LID == $LID2 AND $result3->num_rows == 0){
		
			$sql4 = "DELETE From image WHERE PropertyID ='".$PID."'";
			$result4 = $conn->query($sql4);
			
			$sql = "DELETE From properties WHERE PropertyID ='".$PID."'";
			$result = $conn->query($sql);
			
			
			if ($result && $result4 == TRUE){
					return true;
					header("Location: UpdatePropertyForm.php");
			}	else {
					return false;
			}
		}
	
	}
	
	
	public function AdminDeleteProperty($PID){
	
		//$PID = $_GET['id'];
		
		$Db=new Database();
		$conn = $Db->Connect();
		
		
		
		
			
			$sql3 = "SELECT * FROM propertieslet WHERE PropertyID = '".$PID."' AND EDate > CURDATE()";
			$result3 = $conn->query($sql3);
			
			if($result3->num_rows == 0){
			$sql4 = "DELETE From image WHERE PropertyID ='".$PID."'";
			$result4 = $conn->query($sql4);
			
			$sql = "DELETE From properties WHERE PropertyID ='".$PID."'";
			$result = $conn->query($sql);
			
			if ($result == TRUE) 
				{
					header("Location: UpdatePropertyForm.php");
					return true;
				} 
			}
	
	}
	
	
	
	public function SearchProperty($City, $Price, $Bedrooms, $Bathrooms, $Lounge){
	
	$Db=new Database();
	$conn = $Db->Connect();
	$sql = "SELECT * FROM properties WHERE City = '".$City."' AND Price <= '".$Price."' AND Bedrooms >= '".$Bedrooms."' AND Bathrooms >= '".$Bathrooms."' AND Lounge >= '".$Lounge."' AND RoomsTaken < Bedrooms ";
		$result = $conn->query($sql);
	
		if($result->num_rows > 0) {
			while($row = mysqli_fetch_array($result)) {
				echo '<div class="boxed">';
				
				$a = $row['Bedrooms'];
				$b = $row['RoomsTaken'];	
				$c = $a-$b;
				
				echo"<a href='ViewProperty.php?id={$row['PropertyID']}'>{$row['Street']}</a>";
				$PID=$row['PropertyID'];
				
				$sql2 = "SELECT * FROM image WHERE PropertyID = '".$PID."'";
				$result2 = $conn->query($sql2);
				$row2 = mysqli_fetch_array($result2);
				
				echo "<figure class='change-ratio'>";
				echo "<img src='Landlord/imageuploads/". $row2['image'] ."'/>";
				echo "</figure>";
				
				echo "<h6>Bedrooms:  " . $row['Bedrooms'] . " Bathrooms: " . $row['Bathrooms'] . " Lounges: " . $row['Lounge'] . " Rooms Available: " . $c."</h6>";
				echo "<h5>£" . $row['Price'] . " pppw</h5>";
				
				
				
				
				
				echo '</div> <br>';
			}
			return true;
		}else {
			echo"<h2>No properties available!</h2>";
			return false;
		}
		

	
		
	}
	
	
	public function LandlordSearchProperty($City, $Price, $Bedrooms, $Bathrooms, $Lounge){
	
	$Db=new Database();
	$conn = $Db->Connect();
	$sql = "SELECT * FROM properties WHERE City = '".$City."' AND Price <= '".$Price."' AND Bedrooms >= '".$Bedrooms."' AND Bathrooms >= '".$Bathrooms."' AND Lounge >= '".$Lounge."'";
		$result = $conn->query($sql);
	
		if($result->num_rows > 0) {
			while($row = mysqli_fetch_array($result)) {
				echo"<a href='LandlordViewProperty.php?id={$row['PropertyID']}'>{$row['Street']}</a><br>\n";
			}
			return true;
		}else {
			echo"<h2>No properties available!</h2>";
			return false;
		}
		
		
	}
	
	public function AdminSearchProperty($City, $Price, $Bedrooms, $Bathrooms, $Lounge){
	
	$Db=new Database();
	$conn = $Db->Connect();
	$sql = "SELECT * FROM properties WHERE City = '".$City."' AND Price <= '".$Price."' AND Bedrooms >= '".$Bedrooms."' AND Bathrooms >= '".$Bathrooms."' AND Lounge >= '".$Lounge."'";
		$result = $conn->query($sql);
	
		if($result->num_rows > 0) {
			while($row = mysqli_fetch_array($result)) {
				echo"<a href='AdminViewProperty.php?id={$row['PropertyID']}'>{$row['Street']}</a><br>\n";
			}
			return true;
		}else {
			echo"<h2>No properties available!</h2>";
			return false;
		}
	
		
	}
	
	public function InsertProperty($Street, $City, $County, $Price, $Bedrooms, $Bathrooms, $Lounge, $Description, $Map,$LUser, $LCheck){
		if(isset($LCheck) == TRUE){
			
		//$LCheck = $_SESSION['LandlordLoggedin'];
		//$LUser = $_SESSION['Lordlogin'];
		
			$Db=new Database();
			$conn = $Db->Connect();
			$sql1 = "SELECT LandlordID FROM landlordlogin WHERE Username = '".$LUser."'";  
			$result1 = $conn->query($sql1);
			$row = mysqli_fetch_array($result1);
			$LID =  $row['LandlordID'];
			
			
			
				
				$sql = "INSERT INTO properties (LandlordID, Street, City, County, Price, Bedrooms, Bathrooms, Lounge, Description, Map) VALUES ('".$LID."','".$Street."','".$City."','".$County."','".$Price."','".$Bedrooms."','".$Bathrooms."','".$Lounge."','".$Description."','".$Map."')"; 
				if ($conn->query ($sql) == TRUE) { 
				
				$sql3 = "SELECT LAST_INSERT_ID()";  
				
					$result3 = $conn->query($sql3);
					$row = mysqli_fetch_array($result3);
					$PID =  $row['LAST_INSERT_ID()'];

					$filecount = count($_FILES['file']['name']);
	
					
				
	
					for($i=0;$i<$filecount;$i++){
						$fileName = $_FILES['file']['name'][$i];
						$fileName .= md5(uniqid());
						$sql2 = "INSERT INTO image (PropertyID, image) VALUES ('".$PID."','".$fileName."')";
						if($conn->query($sql2) === True){
							move_uploaded_file($_FILES['file']['tmp_name'][$i], 'imageuploads/'.$fileName);
						//	echo "FILES UPLOADED ";
						} else {
							echo "ERROR";
						}
					}
				
				
				
				
				
				
					echo "<p>Property Uploaded</p>"; 
				} else {
						echo "<p>Failed to Upload</p>";
					}
				
			
		}
	}
	
	public function UploadImages($Street){
		$Db=new Database();
		$conn = $Db->Connect();
		
		$directory = "imageuploads/";
		if(!file_exists($directory))
		{
			mkdir ($directory, 0744);
		}
		
		$Image = $directory.basename($_FILES["Image"]["name"]);
		
		$Image .= md5(uniqid());
		
		if(move_uploaded_file($_FILES["Image"]["tmp_name"],$Image)) 
		{
			echo  "The File ". basename($_FILES["Image"]["name"]). " has been uploaded. ";
			
			
			$sql1 = "SELECT * FROM  Properties WHERE Street = '".$Street."'";
			$result2 = $conn->query($sql1);
			
			$PID =  $row['PropertyID'];
			
	
			$sql2 = "INSERT INTO image (PropertyID, Image) VALUES ('".$PID."','".$Image."')";
			if ($conn->query ($sql2) == TRUE) 
			{
				echo  "Succesful"; 
			}
			else{
				echo "Error";
			}
		
		}
		else {
			echo "Error Uploading file";
		}
	}
	
	
	// BOOKING
	
	public function Booking($Time,$PID,$SUser,$SCheck){
	
		//PID = $_GET['id'];
		//$SUser=$_SESSION['login'];
		//$SCheck=$_SESSION['Loggedin'];
		
		$Db=new Database();
		$conn = $Db->Connect();
		
		if(isset($SCheck) == TRUE){
			
			$sql1 = "SELECT * FROM login WHERE Username = '".$SUser."'";
			$result1 = $conn->query($sql1);
			$row = mysqli_fetch_array($result1);
			$SID = $row['StudentID'];
			$email = $row['Email'];
		}
		
		
		if(isset($SCheck) == TRUE){

		
		$HTime = date("H", strtotime($Time));
		$MTime = date("i", strtotime($Time));
	

		$MinTime ="9";
		$MaxTime ="18";
		$MinsTime ="30";

		if ($HTime>=$MinTime){
			if($HTime<=$MaxTime){
				if($MinsTime!=$MTime){
				
					$NTime = date("Y-m-d H:i:s", strtotime($Time));
					$EndTime = date('Y-m-d H:i:s',strtotime('+30 minutes',strtotime($NTime)));

						$sql2 = "SELECT * FROM enquiries WHERE Time BETWEEN '".$NTime."' AND  '".$EndTime."'";
						$result2 = $conn->query($sql2);
						if($result2->num_rows == 0) {
							
							
							$sql3 = "SELECT * FROM enquiries WHERE EndTime BETWEEN '".$NTime."' AND  '".$EndTime."'";
							$result3 = $conn->query($sql3);
							if($result3->num_rows == 0) {
													
								$sql4 = "SELECT * FROM enquiries WHERE StudentID='".$SID."' AND PropertyID='".$PID."'";
								$result4 = $conn->query($sql4);
								if($result4->num_rows == 0) {
									
									echo " <br> Booking made.";
													
									$sql = "INSERT INTO enquiries (PropertyID, StudentID, Time, EndTime) VALUES ('".$PID."','".$SID."','".$NTime."','".$EndTime."')";
									$result = $conn->query($sql);
									return true;
									
								} else {
									echo "Booking already made for this property";
								}
						
							} else {
								while($row = mysqli_fetch_array($result3)) {
									
									$atime = $row['Time'];
									$AOTime = date('H:i:s',strtotime($atime));				
									$etime = $row['EndTime'];
									$EndeTime = date('H:i:s',strtotime($etime));
									
									echo " <br> Booking time taken from ".$AOTime. " to " .$EndeTime; 
								}
								
							}
						
						} else {
							while($row = mysqli_fetch_array($result2)) {
													
								$atime = $row['Time'];
								$AOTime = date('H:i:s',strtotime($atime));
								$etime = $row['EndTime'];
								$EndeTime = date('H:i:s',strtotime($etime));

								echo " <br> Booking time taken from ".$AOTime. " to " .$EndeTime; 
							}
						}	
				}
				else{
					echo "Select a time between 9 AM - 6 PM";
				}
			} else {
			echo "Select a time between 9 AM - 6 PM";
		}
				
		} else {
			echo "Select a time between 9 AM - 6 PM";
		}
		
		} else {
			echo " <br> Login to make a booking." ;
		}
	}

	public function AvailableCheck(){
	
		$PID = $_GET['id'];
		
		$Db=new Database();
		$conn = $Db->Connect();
	
		$sql = "SELECT * FROM properties WHERE PropertyID = '".$PID."' AND RoomsTaken < Bedrooms ";
		$result = $conn->query($sql);
		if($result->num_rows == 0) {
			header("Location: Property.php");
		}
		
		
	}
	
	public function LoadProperties($LUser){
		$Db=new Database();
		$conn = $Db->Connect();
		
		//$LUser = $_SESSION['Lordlogin'];
		$sql = "SELECT LandlordID FROM landlordlogin WHERE Username = '".$LUser."'";  
		$result = $conn->query($sql);
		$row = mysqli_fetch_array($result);
		$LID =  $row['LandlordID'];
	//	echo $LID;
		$sql1 = "SELECT * FROM properties WHERE LandlordID = '".$LID."' AND RoomsTaken < Bedrooms";  
		$result1 = $conn->query($sql1);
		
		while($row1 = mysqli_fetch_array($result1)){
			$Street = $row1['Street'];
			echo "<option value='$Street'>$Street</option>";
		}
		
	}
	
	public function LetProperty($SUser, $Street, $SDate, $EDate){
		
		$Db=new Database();
		$conn = $Db->Connect();
		
		$sql1 = "SELECT * FROM login WHERE Username = '".$SUser."'";  
		$result1 = $conn->query($sql1);
		$row = mysqli_fetch_array($result1);
		$SID =  $row['StudentID'];
		
		$sql2 = "SELECT * FROM properties WHERE Street = '".$Street."'";  
		$result2 = $conn->query($sql2);
		$row = mysqli_fetch_array($result2);
		$PID =  $row['PropertyID'];
		$RR =  $row['Price'];
		
		$sql4 = "SELECT * FROM propertieslet WHERE StudentID = '".$SID."'";  
		$result4 = $conn->query($sql4);
		
		$sql7 = "SELECT * FROM login WHERE StudentID = '".$SID."'";  
		$result7 = $conn->query($sql7);
		
		$sql8 = "SELECT * FROM propertieslet WHERE StudentID = '".$SID."' AND EDate > CURDATE()";  
		$result8 = $conn->query($sql8);
		
		
		if($result7->num_rows == 1 AND $SDate != NULL AND $EDate != NULL AND $result8->num_rows == 0 AND $result4->num_rows == 0) {
		
			$sql = "INSERT INTO propertieslet (StudentID, PropertyID, SDate, EDate) VALUES ('".$SID."','".$PID."','".$SDate."','".$EDate."')"; 
			$result = $conn->query($sql);
		
			$sql3 = "Update properties SET RoomsTaken = RoomsTaken+1 WHERE PropertyID ='".$PID."'";
			$result3 = $conn->query($sql3);
			
			$sql5 = "SELECT * FROM propertieslet WHERE StudentID = '".$SID."' AND PropertyID = '".$PID."'";  
			$result5 = $conn->query($sql5);
			
			$row = mysqli_fetch_array($result5);
			$PayID =  $row['PaymentID'];
			
			
			$sql6 = "INSERT INTO payment (PaymentID, RentRate) VALUES ('".$PayID."','".$RR."')"; 
			$result6 = $conn->query($sql6);
			return true;
			
		
		}else {
			echo "Error!";
		}
	}
	
	public function ListBookings($SUser){
		$Db=new Database();
		$conn = $Db->Connect();
		
		//$SUser =  $_SESSION['login'];
		
		$sql1 = "SELECT * FROM login WHERE Username = '".$SUser."'";  
		$result1 = $conn->query($sql1);
		$row = mysqli_fetch_array($result1);
		$SID =  $row['StudentID'];
		
		
		
		
		$sql = "SELECT * FROM enquiries WHERE StudentID = '".$SID."'";
		$result = $conn->query($sql);
		
		if($result->num_rows > 0) {
			while($row = mysqli_fetch_array($result)) {
				echo '<div class="deleteboxed">';
				$sql2 = "SELECT * FROM properties WHERE PropertyID = '". $row['PropertyID']."'";
				$sql3 = "SELECT * FROM enquiries WHERE PropertyID = '". $row['PropertyID']."' AND StudentID = '".$SID."'"; 
				$result3 = $conn->query($sql3);
				$row3 = $result3->fetch_assoc();
				
				$result2 = $conn->query($sql2);
				$row = $result2->fetch_assoc();
				echo "<b>Street: </b>".$row['Street']. "<br>";
				echo "<b>City: </b>".$row['City']. "<br>";
				echo "<b>County: </b>".$row['County']. "<br>";
				echo "<b>Date and Time: </b>".$row3['Time']. "<br>";
				echo "<a href='DeleteBookingForm.php?Delete=" . $row['PropertyID']."'class='button' OnClick=\"return confirm('Are you sure you want to delete booking " .$row['PropertyID']."');\">Delete Booking</a> <br><br>"; 
				echo '</div>';
				
			}
			return true;
		} else {
			echo "No bookings made. "; 
		}
	}
	
	public function DeleteBooking($SUser,$Del){
		$Db=new Database();
		$conn = $Db->Connect();	
		//$SUser =  $_SESSION['login'];
      	$sql1 = "SELECT * FROM login WHERE Username = '".$SUser."'";  
		$result1 = $conn->query($sql1);
		$row = mysqli_fetch_array($result1);
		$SID =  $row['StudentID'];
		//$Del=$_GET['Delete'];
		$sql = "SELECT * FROM enquiries";  
		$sql = "DELETE FROM enquiries WHERE PropertyID=" . $Del ." AND StudentID= '".$SID."'"; 

				
			if ($conn->query($sql) === TRUE) {
				header('Location: DeleteBookingForm.php');		
				
				return true;
			}else{
				echo "<br>Error "; 
			}
	}
	
	public function SendMaintenance($Title, $MSG, $SUser){
		$Db=new Database();
		$conn = $Db->Connect();	
		
		//$SUser =  $_SESSION['login'];
      	$sql1 = "SELECT * FROM login WHERE Username = '".$SUser."'";  
		$result1 = $conn->query($sql1);
		$row = mysqli_fetch_array($result1);
		$SID =  $row['StudentID'];
		
		
      	$sql2 = "SELECT * FROM propertieslet WHERE StudentID = '".$SID."'";
		$result2 = $conn->query($sql2);
		$row2 = mysqli_fetch_array($result2);		
		$PID =  $row2['PropertyID'];
		
		$sql4 = "SELECT * FROM properties WHERE PropertyID = '".$PID."'";
		$result4 = $conn->query($sql4);
		$row4 = mysqli_fetch_array($result4);		
		$LID =  $row4['LandlordID'];
		
		$sql5 = "SELECT * FROM propertieslet WHERE StudentID = '".$SID."' AND SDate <= '".date("Y-m-d")."' AND EDate >= '".date("Y-m-d")."'"; 
		$result5 = $conn->query($sql5);
		$row5 = mysqli_fetch_array($result5);
	
		if($result5->num_rows > 0) {
					
			$Time = date('Y-m-d H:i:s');
			$Status = "Active";
			if($Title != NULL AND $MSG != NULL) {
				$sql3 = "INSERT INTO maintenance (StudentID, LandlordID, PropertyID, Title, Message, Status, Time) VALUES ('".$SID."','".$LID."','".$PID."','".$Title."','".$MSG."','".$Status."','".$Time."')"; 
				$result3 = $conn->query($sql3);
				return true;
			} else {
				echo "Fill in all fields.";
			}
		} else {
			echo "Error!";
		}

	}
	
	public function ViewMaintenance($LUser){
		$Db=new Database();
		$conn = $Db->Connect();	
		
		
		//$LUser =  $_SESSION['Lordlogin'];
      	$sql1 = "SELECT * FROM landlordlogin WHERE Username = '".$LUser."'";  
		$result1 = $conn->query($sql1);
		$row = mysqli_fetch_array($result1);
		$LID =  $row['LandlordID'];
		
      	$sql2 = "SELECT * FROM maintenance WHERE LandlordID = '".$LID."' AND Status = 'Active'"; 
		$result2 = $conn->query($sql2);

	
		if($result2->num_rows > 0) {
		echo "<form action='Maintenance.php' method='POST' enctype='multipart/form-data'>";
			while($row2 = mysqli_fetch_array($result2)) {

				echo '<div class="msgboxed">';

				$MID = $row2['MaintenanceID'];
				
				$PID=$row2['PropertyID'];
				
				$sql3 = "SELECT * FROM properties WHERE PropertyID = '".$PID."'";
				$result3 = $conn->query($sql3);
				$row3 = mysqli_fetch_array($result3);	
				
				
				echo "<b>Street: </b>".$row3['Street']. "<br>";
				echo "<b>Title: </b>".$row2['Title']. "<br>";
				echo "<b>Message: </b>".$row2['Message']. "<br>";
				echo "<b>Status: </b>".$row2['Status'];
				echo"<input type='submit' name='$MID' value='Resolved'>";
				echo '</div>';
				
				
				
				if (isset($_POST["$MID"])){
					
					$Status = "Resolved";
					
					$sql4 = "Update maintenance SET Status = '".$Status."' WHERE MaintenanceID ='".$MID."'";
					$result4 = $conn->query($sql4);
					
					header("Refresh:0");
	
				}
				
			}
			echo "</form>";
			return true;
		} else {
			echo "No maintenance needed. "; 
		}
	
	}
	
	
	public function StudentViewMaintenance($SUser){
		$Db=new Database();
		$conn = $Db->Connect();	
		
		

      	$sql1 = "SELECT * FROM login WHERE Username = '".$SUser."'";  
		$result1 = $conn->query($sql1);
		$row = mysqli_fetch_array($result1);
		$SID =  $row['StudentID'];
		
      	$sql2 = "SELECT * FROM maintenance WHERE StudentID = '".$SID."' AND Status = 'Active'"; 
		$result2 = $conn->query($sql2);

	
		if($result2->num_rows > 0) {
		echo "<form action='Maintenance.php' method='POST' enctype='multipart/form-data'>";
			while($row2 = mysqli_fetch_array($result2)) {

				echo '<div class="msgboxed">';

				$MID = $row2['MaintenanceID'];
				
				$PID=$row2['PropertyID'];
				
				$sql3 = "SELECT * FROM properties WHERE PropertyID = '".$PID."'";
				$result3 = $conn->query($sql3);
				$row3 = mysqli_fetch_array($result3);	
				
				
				echo "<b>Street: </b>".$row3['Street']. "<br>";
				echo "<b>Title: </b>".$row2['Title']. "<br>";
				echo "<b>Message: </b>".$row2['Message']. "<br>";
				echo "<b>Status: </b>".$row2['Status'];
				echo"<input type='submit' name='$MID' value='Resolved'>";
				echo '</div>';
				
				
				
				if (isset($_POST["$MID"])){
					
					$Status = "Resolved";
					
					$sql4 = "Update maintenance SET Status = '".$Status."' WHERE MaintenanceID ='".$MID."'";
					$result4 = $conn->query($sql4);
					
					header("Refresh:0");
	
				}
				
			}
			echo "</form>";
			return true;
		} else {
			echo "No maintenance needed. "; 
		}
	
	}

	public function LoadRentedProperties($LUser){
		$Db=new Database();
		$conn = $Db->Connect();
		
		//$LUser = $_SESSION['Lordlogin'];
		$sql = "SELECT * FROM landlordlogin WHERE Username = '".$LUser."'";  
		$result = $conn->query($sql);
		$row = mysqli_fetch_array($result);
		$LID =  $row['LandlordID'];
		echo $LID;
		
		$sql1 = "SELECT * FROM properties WHERE LandlordID = '".$LID."'";  
		$result1 = $conn->query($sql1);
			
	
	while($row1 = mysqli_fetch_array($result1)){
		$PID = $row1['PropertyID'];
		$sql3 = "SELECT * FROM propertieslet WHERE PropertyID = '".$PID."'";  
		$result3 = $conn->query($sql3);
		
			while($row3 = mysqli_fetch_array($result3)){
				$SID = $row3['StudentID'];
				
				$sql2 = "SELECT * FROM login WHERE StudentID = '".$SID."'";  
				$result2 = $conn->query($sql2);
				$row2 = mysqli_fetch_array($result2);
				$User = $row2['Username'];
				$fName = $row2['fName'];
				$lName = $row2['lName'];
				
				$sql4 = "SELECT * FROM properties WHERE PropertyID = '".$PID."'"; 
				$result4 = $conn->query($sql4);
				$row4 = mysqli_fetch_array($result4);
				$Street = $row4['Street'];
				
	
				
				
				echo "<option value='$SID'>$User, $fName, $lName, $Street</option>";
			}
		}
		
	}

	
	
	public function ChangeDate($SID, $EDate){
		
		$Db=new Database();
		$conn = $Db->Connect();
		
		
		$sql1 = "SELECT * FROM propertieslet WHERE StudentID = '".$SID."'";  
		$result1 = $conn->query($sql1);
		$row = mysqli_fetch_array($result1);
		$SDate =  $row['SDate'];
		
			if(date("Y-m-d") < $EDate){
				
				if($SID != NULL AND $EDate != NULL AND $EDate > $SDate) {
				
					$sql = "Update propertieslet SET EDate = '".$EDate."' WHERE StudentID ='".$SID."'";
					$result = $conn->query($sql);
						
					echo "Date Changed.";
					return true;
					
				}else {
					echo "Error!";
				}
				
			} else {
				echo "Can't set date same as today or before!";
			}
		
		
	}
	
	
	public function LoadPaymentDue($SUser){
		
		$Db=new Database();
		$conn = $Db->Connect();
		
		//$SUser =  $_SESSION['login'];
		

		
		$sql1 = "SELECT * FROM login WHERE Username = '".$SUser."'";  
		$result1 = $conn->query($sql1);
		$row = mysqli_fetch_array($result1);
		$SID =  $row['StudentID'];

		
		$sql2 = "SELECT * FROM propertieslet WHERE StudentID = '".$SID."'";  
		$result2 = $conn->query($sql2);
		$row2 = mysqli_fetch_array($result2);
		$PayID =  $row2['PaymentID'];
		
		
		$sql3 = "SELECT * FROM payment WHERE PaymentID = '".$PayID."'";  
		$result3 = $conn->query($sql3);
		$row3 = mysqli_fetch_array($result3);
		$TotalDue =  $row3['TotalDue'];
		$TotalPaid =  $row3['TotalPaid'];
		$PaidID =  $row3['PaidID'];
		
		$Price=$TotalDue-$TotalPaid;
		//$Price=$Price*100;
		
		echo "<b>Total Due: </b>£".$Price."";
		
	}
	

}

		
				

	
	
	



?>
  

