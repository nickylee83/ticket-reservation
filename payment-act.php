<?php
	session_start();
	include ('includes/config.php');

	if(isset($_POST['submit'])){
		// take reservation ID of the last record in Reservation table
    	$query = "SELECT rid FROM reservation ORDER BY rid DESC LIMIT 1;";
        $result= $conn->query($query);

        while($row = mysqli_fetch_array($result)) {
        	$rid = $row['rid'];
    	}
    	// take today's date
    	$date = date("Y-m-d");
    						
		$query= "INSERT INTO payment(rid,pdate)VALUES(?,?)";
		$stmt= $conn->prepare($query);
		$stmt->bind_param("is", $rid,$date);
		$stmt->execute();

		header('Location:payment.php');
		$_SESSION['response']= "Thank you. Your payment has been successfully received";
		$_SESSION['res_type']= "success";		
	}

	/*----------- Delete Payment ------------*/
	
	if(isset($_GET['del_pyid'])) {
		$pyid = $_GET['del_pyid'];

		$query = "DELETE FROM payment WHERE pyid =?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i", $pyid);
		$stmt->execute();

		header('Location:view.php');
		$_SESSION['response']= "Record successfully deleted!";
		$_SESSION['res_type']= "danger";
	}
?>