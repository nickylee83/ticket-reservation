<?php
	include ('includes/config.php');

	if(isset($_POST['submit'])){
		$email= $_POST['email'];
		$password= $_POST['password'];
		
		$query= "SELECT * FROM user WHERE email= '$email'";
		$result= $conn->query($query);
		// if there is at least one matched user
		if($result) {
			if(mysqli_num_rows($result) > 0) {
							
				while ($row = mysqli_fetch_array($result)) {
					// verify current password with hashed one								
					if(password_verify($password,$row["password"])) {
						header("Location:home.php");						
					}
					else {
						// show login not successful												
						echo "<script>alert('Invalid login !');</script>";
						echo "<script>document.location.href='login.php'</script>";					
					}								
				}
			}					
			else {							
				// show login not successful												
				echo "<script>alert('Invalid login !');</script>";
				echo "<script>document.location.href='login.php'</script>";
			}
		}
		else {
			mysqli_close($conn);
			
		}
	}
	else {
		echo "";
	}						
?>