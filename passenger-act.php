<?php
	session_start();
	include ('includes/config.php');

	$isUpdate = false;

	$pid= "";
	$fname= "";
	$lname= "";
	$gender= "";
	$dob= "";
	$passport= "";
	$nationality= "Nationality";		
	$phone= "";
	$email= "";

	if(isset($_POST['submit'])){
		$fname= $_POST['fname'];
		$lname= $_POST['lname'];
		$gender= $_POST['radioGender'];
		$dob= $_POST['dob'];
		$passport= $_POST['passport'];
		$nationality= $_POST['nationality'];
		$phone= $_POST['phone'];
		$email= $_POST['email'];
		
		$query= "INSERT INTO passenger(fname,lname,gender,dob,passport,nationality,phone,email)VALUES(?,?,?,?,?,?,?,?)";
		$stmt= $conn->prepare($query);
		$stmt->bind_param("ssssssss", $fname,$lname,$gender,$dob,$passport,$nationality,$phone,$email);
		$stmt->execute();
		header('Location:passenger.php');
		$_SESSION['response']= "Successfully inserted to the database!";
		$_SESSION['res_type']= "success";
	}

	/*----------- Delete Passenger ------------*/
	
	if(isset($_GET['del_pid'])) {
		$pid = $_GET['del_pid'];

		$query = "DELETE FROM passenger WHERE pid =?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i", $pid);
		$stmt->execute();

		header('Location:view.php');
		$_SESSION['response']= "Record successfully deleted!";
		$_SESSION['res_type']= "danger";
	}

	/*----------- Update Passenger ------------*/
	/*----------------- retrive data from DB and show it on form -------------------------------*/
	if(isset($_GET['edt_pid'])) {
		$pid = $_GET['edt_pid'];

		$query = "SELECT * FROM passenger WHERE pid =?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i", $pid);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();

		$fid = $row['pid'];
        $fname= $row['fname'];
		$lname= $row['lname'];
		$gender= $row['gender'];
		$dob= $row['dob'];
		$passport= $row['passport'];
		$nationality= $row['nationality'];
		$phone= $row['phone'];
		$email= $row['email'];

        $isUpdate = true;
	}

	/*----------------- write data to DB -------------------------------*/

	if(isset($_POST['update'])) {
		$pid = $_POST['pid'];
		$fname= $_POST['fname'];
		$lname= $_POST['lname'];
		$gender= $_POST['radioGender'];
		$dob= $_POST['dob'];
		$passport= $_POST['passport'];
		$nationality= $_POST['nationality'];
		$phone= $_POST['phone'];
		$email= $_POST['email'];

		$query = "UPDATE passenger SET fname=?, lname=?, gender=?, dob=?, passport=?, nationality=?, phone=?, email=? WHERE pid=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("ssssssssi", $fname,$lname,$gender,$dob,$passport,$nationality,$phone,$email,$pid);
		$stmt->execute();

		header('Location:view.php');
		$_SESSION['response']= "Record successfully updated!";
		$_SESSION['res_type']= "primary";
	}
?>