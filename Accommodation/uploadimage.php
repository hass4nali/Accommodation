<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Upload Image</title>
<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>


<body>

<a href="Home Page.php">Home Page</a> <a href="Upload Image2.php">Upload Image</a> <a href="Simple Login Page.php">Simple Login</a> <a href="Comments Page.php">Comments Page</a> <a href="Dynamic Login.php">Dynamic Login</a><br><br> 

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_accommodation";
  // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// checks connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql1 = "SELECT * FROM image"; // this will select the image table from the database
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) 
{
	while($row = $result1->fetch_assoc()) 
	{
		echo "<img src='". $row['image'] ."' /><br />";
	}
}



// Image Upload 

if(isset($_POST["submit1"])) 
{
	$directory = "imageuploads/";
	if(!file_exists($directory))
	{
		mkdir ($directory, 0744);
	}
	
	$images = $directory.basename($_FILES["ImageUpload"]["name"]);
	
	$images .= md5(uniqid());
	
	if(move_uploaded_file($_FILES["ImageUpload"]["tmp_name"],$images)) 
	{
		echo  "The File ". basename($_FILES["ImageUpload"]["name"]). " has been uploaded. ";
		
		$sql = "INSERT INTO image (image) VALUES ('" . $images. "')";
		if($conn->query($sql)) // query
		{
			echo  "Succesful"; // if it is successful it wil display this message
		}
		else{
			echo "Error"; // if there is an error it will display this message
		}
	
	}
	else {
		echo "Error Uploading file"; // this message will display if there is an error uploading the file
	}
}
	
 ?>
 

<form action="uploadimage.php" method="post" 
enctype="multipart/form-data">
Select image to upload: 
<input type="file" name="ImageUpload" id="ImageUpload">
<input type="submit" value="Upload" name="submit1">
</form>
