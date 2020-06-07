<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "atrms";
    
	$conn = new mysqli($host,$user,$password,$db);
	if($conn->connect_error) {
		die("Could not connect to the database!".$conn->connect_error);
	}

	/*
	Remeber to change this setting in 000webhost.com
	 
	$host = "localhost";
    $user = "id13545506_admin";
    $password = "Nickylee831@";
    $db = "id13545506_atrms";
	*/ 
?>