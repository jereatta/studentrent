<?php
	
	function  ConnectToMySQL(){
	$conn = mysqli_connect("localhost", "root", "root", "AlastairMicallef_4.2B"); if (mysqli_connect_errno()){
		echo "Error: Could not connect to database. Please try again later";
		exit; }


	return $conn;

	}

?>

