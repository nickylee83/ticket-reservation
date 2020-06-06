<?php
	session_start();
	include ('includes/config.php');

	if(isset($_POST['pass-submit'])){
		$email= $_POST['email'];
		$pass= $_POST['confirm'];

		// read from user table
		$query = "SELECT * FROM user WHERE email =?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		// check whether account already exists
		$old_email = $row['email'];
		// account already exists
        if ($old_email == $email) {
        	echo "<script>alert('User account already exists. Please use different email address !');</script>";
			echo "<script>document.location.href='signup.php'</script>";
        }
        // it is a new account, proceed...
        else {
			// hash the password before saving
			$hash =password_hash($pass, PASSWORD_DEFAULT);
			// writing to database
			$query= "INSERT INTO user(email,password)VALUES(?,?)";
			$stmt= $conn->prepare($query);
			$stmt->bind_param("ss", $email, $hash);
			$stmt->execute();
			// back to sign up page and show message
			header('location:signup.php');
			$_SESSION['response']= "New user account successfully created !";
			$_SESSION['res_type']= "success";
		}
	}
?>