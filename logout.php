<?php
	session_start();
	if(isset($_SESSION['login'])){
    	unset($_SESSION['login']);
	}
	session_destroy();
?>

<!DOCTYPE html>
<!--------------------------------- Logout -------------------------------------->
<html>

<head>
   <meta charset="UTF-8">
   <title>Logout</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
       crossorigin="anonymous">
    <!-- my own logo for every page -->
  <link rel = "shortcut icon" type= "image/gif" href= "images/micromac.gif">
  <!-- my own stylesheet -->
  <link href="css/style.css" rel="stylesheet">
  <!-- logout script -->
  <script src="js/logout.js"></script>
</head>
<!-- Overall airline logo background -->
<body style= "background-image: url('images/logobg.jpg')" >
	<div class="container">
    <div class = "row">
      <!-- form background -->
      <div  class= "col-md-5 offset-md-3 mt-5 mb-5">
      	<!-- Lock image -->
        <div>
          <img class = "mt-2 offset-md-3" src="images/lock.png" alt="logout">
        </div>
				<div class= "mt-2 offset-md-3">
          <h4>You have logged out!</h4>
				</div>

				<div class= "mt-3">
          <h6>Thank you for using our service. Hope to see you again soon!</h6>
				</div>
				<div class= "mt-3">
          <!-- Buttons -->
          <button class= "btn btn-primary btn-block" type = "button"  onclick="location.href = 'login.php';">Login again!</button>
          <!-- Copyright brand name -->    			
          <p class="mt-5 mb-3 text-muted" align = "center">&copy; Micromac Software Inc. 2020</p>
        </div>
      </div>
    </div>
  </div> 

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
  crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
  crossorigin="anonymous"></script>
</body>
</html>