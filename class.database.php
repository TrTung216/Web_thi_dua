<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "web_thidua";
	global $conn;
		
	$conn= mysqli_connect($servername,$username, $password);
	if( !$conn){
		die('Could not connect: ' . mysqli_error($conn));
	}
	mysqli_select_db($conn,$db);
?>