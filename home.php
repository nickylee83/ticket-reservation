<?php
  /* include ('login-act.php');
  
  if(!isset($valid_user));
  {
    // not logged in
    echo "<script>alert(valid_user);</script>";
    // exit();
    // echo "<script>document.location.href='login.php'</script>";
    //exit(); 
  }*/
?>
<!DOCTYPE html>
<!-- ------------------------------- Home ------------------------------------ -->
<html>

<head>
   
   <meta charset="UTF-8">
   <title>Home</title>
   <!-- bootstrap stylesheet -->
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
  crossorigin="anonymous"></script>


  <!-- my own logo for every page -->
  <link rel = "shortcut icon" type= "image/gif" href= "images/micromac.gif">
  <!-- my own stylesheet -->
  <link href="css/style.css" rel="stylesheet">
  
	
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
  crossorigin="anonymous"></script>
  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
  crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 

  <!-- ****** font awsome icons script ******* -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <!-- logout script -->
  <script src="js/logout.js"></script>

  <!-- ****** Navigation Bar starts here ******* -->
  <?php
    include('includes/navigation.html');
  ?>
  
</head>

<!-- Overall airline logo background -->
<body style= "background-image: url('images/logobg.jpg')">
	<!-- form background image here -->
    <!-- div  class= "col-md-10 offset-md-1 mt-5 mb-2" style="background-image: url('images/planebg.png');"-->

	<div id="demo" class="carousel slide" data-ride="carousel">

  		<!-- Indicators -->
  		<ul class="carousel-indicators">
    		<li data-target="#demo" data-slide-to="0" class="active"></li>
    		<li data-target="#demo" data-slide-to="1"></li>
    		<li data-target="#demo" data-slide-to="2"></li>
    		<li data-target="#demo" data-slide-to="3"></li>
  		</ul>
  
		<!-- The slideshow -->
  		<div class="carousel-inner">
    		<div class="carousel-item active">
      			<img src="images/thailand.jpg" alt="Thailand" width="100%" height="520">
    		</div>
    		<div class="carousel-item">
      			<img src="images/phuket.jpg" alt="Phuket" width="100%" height="520">
    		</div>
    		<div class="carousel-item">
      			<img src="images/bagan.jpg" alt="Bagan" width="100%" height="520">
    		</div>
    		<div class="carousel-item">
      			<img src="images/lhasa.jpg" alt="Lhasa" width="100%" height="520">
    		</div>
  		</div>
  
  		<!-- Left and right controls -->
  		<a class="carousel-control-prev" href="#demo" data-slide="prev">
    		<span class="carousel-control-prev-icon"></span>
  		</a>
  		<a class="carousel-control-next" href="#demo" data-slide="next">
    		<span class="carousel-control-next-icon"></span>
  		</a>
	</div>
</body>

<!-- ****** Footer starts here ******* -->
<?php
  include('includes/footer.html');
?>
</html>