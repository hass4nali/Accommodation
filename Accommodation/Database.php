<?php
	class Database{
		private $servername = "localhost";
		private $username = "root";
		private $password = "";
		private $dbname = "student_accommodation";
		
	public function Connect(){
		
		$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			}
			return $conn;
		}
	}
?>