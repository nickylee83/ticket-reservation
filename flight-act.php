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
	// put default values when form-load
	$fid= "";
	$name= "";
	$origin= "From";
	$dest= "To";
	$date= "";
	$dep= "Departure at";
	$arr= "Arrival at";		
	$seat= "Seat";
	$price= "";

	if(isset($_POST['submit'])){
		$name= $_POST['name'];
		$from= $_POST['from'];
		$to= $_POST['to'];
		$date= $_POST['date'];
		$dep= $_POST['dep'];
		$arr= $_POST['arr'];		
		$seat= $_POST['seat'];
		$price= $_POST['price'];
		
		// insert into database
		$query= "INSERT INTO flight(name,origin,destination,tdate,departure,arrival,seat,price)VALUES(?,?,?,?,?,?,?,?)";
		$stmt= $conn->prepare($query);
		$stmt->bind_param("ssssssid", $name,$from,$to,$date,$dep,$arr,$seat,$price);
		$stmt->execute();
		// navigate back to flight page and show message
		header('Location:flight.php');
		$_SESSION['response']= "Successfully inserted to the database!";
		$_SESSION['res_type']= "success";
	}

	/*----------- Delete Flight ------------*/
	
	if(isset($_GET['del_fid'])) {
		$fid = $_GET['del_fid'];

		$query = "DELETE FROM flight WHERE fid =?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i", $fid);
		$stmt->execute();
		// navigate back to view page and show message
		header('Location:view.php');
		$_SESSION['response']= "Record successfully deleted!";
		$_SESSION['res_type']= "danger";
	}

	/*----------- Update Flight ------------*/
	/*----------------- retrive data from DB and show it on form -------------------------------*/
	if(isset($_GET['edt_fid'])) {
		$fid = $_GET['edt_fid'];

		$query = "SELECT * FROM flight WHERE fid =?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i", $fid);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();

		$fid = $row['fid'];
        $name = $row['name'];
        $origin = $row['origin'];
        $dest = $row['destination'];
        $tdate = $row['tdate'];
        $dep = $row['departure'];
        $arr = $row['arrival'];
        $seat = $row['seat'];
        $price = $row['price'];

        $isUpdate = true;
	}

	/*----------------- write data to DB -------------------------------*/

	if(isset($_POST['update'])) {
		$fid = $_POST['fid'];
		$name= $_POST['name'];
		$from= $_POST['from'];
		$to= $_POST['to'];
		$date= $_POST['date'];
		$dep= $_POST['dep'];
		$arr= $_POST['arr'];		
		$seat= $_POST['seat'];
		$price= $_POST['price'];

		$query = "UPDATE flight SET name=?, origin=?, destination=?, tdate=?, departure=?, arrival=?, seat=?, price=? WHERE fid=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("ssssssidi", $name,$from,$to,$date,$dep,$arr,$seat,$price,$fid);
		$stmt->execute();
		// navigate back to view page and show message
		header('Location:view.php');
		$_SESSION['response']= "Record successfully updated!";
		$_SESSION['res_type']= "primary";
	}
?>