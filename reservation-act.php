<?php
	session_start();
	
  	// check if it is a valid login, prevent unauthorised
  	if(!isset($_SESSION['login']))
    {
    	// not logged in
    	header('Location: login.php');
    	exit();
    }
	include ('includes/config.php');

	$isUpdate = false;

	$rid= "";
	$pid= "Passenger ID";
	$date= "";
	$fid= "Flight ID";
	$dep= "Departure at";
	$arr= "Arrival at";		
	$ticket= "";

	if(isset($_POST['submit'])){
		$pid= $_POST['pid'];
		$date= $_POST['date'];
		$fid= $_POST['fid'];
		$dep= $_POST['dep'];
		$arr= $_POST['arr'];
		$ticket= $_POST['ticket'];
		
		$query= "INSERT INTO reservation(pid,fid,tdate,departure,arrival,ticket)VALUES(?,?,?,?,?,?)";
		$stmt= $conn->prepare($query);
		$stmt->bind_param("iisssi", $pid,$fid,$date,$dep,$arr,$ticket);
		$stmt->execute();
		header('Location:payment.php');
		$_SESSION['response']= "Successfully inserted to the database!";
		$_SESSION['res_type']= "success";		
	}

	/*----------- Delete Reservation ------------*/
	
	if(isset($_GET['del_rid'])) {
		$rid = $_GET['del_rid'];

		$query = "DELETE FROM reservation WHERE rid =?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i", $rid);
		$stmt->execute();

		header('Location:view.php');
		$_SESSION['response']= "Record successfully deleted!";
		$_SESSION['res_type']= "danger";
	}

	/*----------- Update Reservation ------------*/
	/*----------------- retrive data from DB and show it on form -------------------------------*/

	if(isset($_GET['edt_rid'])) {
		$rid = $_GET['edt_rid'];

		$query = "SELECT * FROM reservation WHERE rid =?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i", $rid);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();

		$rid = $row['rid'];
        $pid= $row['pid'];
        $fid= $row['fid'];
		$date= $row['tdate'];		
		$dep= $row['departure'];
		$arr= $row['arrival'];
		$ticket= $row['ticket'];

        $isUpdate = true;
	}

	/*----------------- write data to DB -------------------------------*/

	if(isset($_POST['update'])) {
		$rid = $_POST['rid'];
		$pid= $_POST['pid'];
		$date= $_POST['date'];
		$fid= $_POST['fid'];
		$dep= $_POST['dep'];
		$arr= $_POST['arr'];
		$ticket= $_POST['ticket'];

		$query = "UPDATE reservation SET pid=?, fid=?, tdate=?, departure=?, arrival=?, ticket=? WHERE rid=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("iisssii", $pid,$fid,$date,$dep,$arr,$ticket,$rid);
		$stmt->execute();

		header('Location:view.php');
		$_SESSION['response']= "Record successfully updated!";
		$_SESSION['res_type']= "primary";
	}

	/*----------------- Select this flight -------------------------------*/
	/*------ Show some info of this flight in form (only some of them) --------*/

	if(isset($_GET['sel_flight'])) {
		$fid = $_GET['sel_flight'];

		$query = "SELECT * FROM flight WHERE fid =?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i", $fid);
		$stmt->execute();

		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		$fid = $row['fid'];
		$date= $row['tdate'];		
		$dep= $row['departure'];
		$arr= $row['arrival'];
	}
?>