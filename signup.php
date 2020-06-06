<?php
  include ('signup-act.php');
?>
<!DOCTYPE html>
<!--------------------------------- Signup Form -------------------------------------->
<html>

<head>
   <meta charset="UTF-8">
   <title>New User Details</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
       crossorigin="anonymous">
    <!-- my own logo for every page -->
  <link rel = "shortcut icon" type= "image/gif" href= "images/micromac.gif">
  
  <!-- my own stylesheet -->
  <link href="css/style.css" rel="stylesheet">

  <!-- ****** Navigation Bar starts here ******* -->
  <nav class="navbar navbar-expand-lg navbar-light">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <!-- ****** Brand logo ******* -->
      <a class="navbar-brand" href="#" style="color: #FFFFFF;">
        <img src="images/micromac.gif" width="40" height="40" class="d-inline-block align-top" alt="logo">
        <strong>Mircromac</strong><sup>&reg;</sup>
      </a>
      <!-- ****** Nav items as a list format ******* -->
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          
        </li>
      </ul>
      <!-- ****** Logout Modal ******* -->
      
      <!-- ****** Admin menu items dropdown ******* -->
      
      <!-- form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form -->
    </div>
  </nav>
</head>
<!-- Overall airline logo background -->
<body style= "background-image: url('images/logobg.jpg')" >
  
  <div class="container">
    <div class = "row">
      <!-- form background image here -->
      <div  class= "col-md-6 offset-md-3 mt-5" style="background-image: url('images/planebg.png'); border-radius: 5%;">

        <img class = "mt-2 ml-2" src="images/login.jpg" alt="signup" width="52" height="42">
        <!-- php confirm alert -->
        <?php if(isset($_SESSION['response'])){ ?>
        <div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible text-center">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <b><?= $_SESSION['response']; ?></b>
        </div>
        <?php } unset($_SESSION['response']); ?>
        <!-- main heading here -->
        
        
        <form class = "ml-2 mr-2" action = "signup-act.php" method = "post" name="myform">
          <h1 class="h3 mb-3 font-weight-normal" align = "center">New User Signup</h1>
          <!-- first row, Email -->
          <div class = "form-group row">
            <label for= "email" class="col-sm-4 col-form-label">Email</label>
            <div class="col">              
              <input type="email" class="form-control" placeholder="Email" id= "email" name= "email" required autofocus>
            </div>           
          </div>
          <!-- second row, Password -->
          <div class = "form-group row">
            <label for= "password" class="col-sm-4 col-form-label" >Password</label>
            <div class="col">              
              <input type="password" class="form-control" placeholder="Password (minimum 8 characters)" name= "password" id= "password" minlength= "8" required>
            </div>
          </div>
          <!-- third row, Confirm Password -->
          <div class = "form-group row">
            <label for= "confirm" class="col-sm-4 col-form-label" >Confirm Password</label>
            <div class="col">              
              <input type="password" class="form-control" placeholder="Confirm Password" id= "confirm" name="confirm" required>
            </div>
          </div>                   
          <!-- last row, Buttons -->
          <div class = "form-group row">            
            <button class="btn btn-primary offset-md-4" type="submit" id="pass-submit" name= "pass-submit" onclick="validatePassword();">Submit</button>
              <div class = "col">
                <button class="btn btn-success" type= "reset">Reset</button>
              </div>
            <div class= "col">
              <button class= "btn btn-primary" type = "button"><a style="color: white; text-decoration: none;" href= "login.php">Log in now!</a></button>
            </div>
          </div>
          <!-- ****** This was removed for simplicity ******* -->
          <!-- p class="mt-3 mb-2 text-muted" align = "center">&copy; Micromac Software Inc. 2020</p-->
        </form>
      </div>   
    </div>
  </div>

  <script type="text/javascript" src="js/signup.js"></script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
  crossorigin="anonymous"></script>
  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
  crossorigin="anonymous"></script>

  <script type="text/javascript"> src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"</script>

  <!-- ****** font awsome icons script ******* -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

<!-- ****** Footer starts here ******* -->
<footer class="page-footer font-small unique-color-dark mt-5">

	<div style="background-color: #6351CE;">
    	<div class="container">

      		<!-- Grid row-->
    		<div class="row py-4 d-flex align-items-center">

				<!-- Grid column -->
        		<!-- ****** the pink footer banner ******* -->
        		<div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
          			<h6 class="mb-0">Get connected with us on social networks!</h6>
        		</div>
        		<!-- Grid column -->
        		<div class="col-md-6 col-lg-7 text-center text-md-right">

          			<!-- Facebook -->
	        		<a class="fb-ic" href= "#" styl>
	            		<i class="fab fa-facebook-f white-text mr-4"> </i>
	          		</a>
		        	<!-- Twitter -->
		        	<a class="tw-ic" href= "#">
		            	<i class="fab fa-twitter white-text mr-4"> </i>
		          	</a>
		          	<!-- Google +-->
		          	<a class="gplus-ic" href= "#">
		            	<i class="fab fa-google-plus-g white-text mr-4"> </i>
		          	</a>
		          	<!--Linkedin -->
		          	<a class="li-ic" href= "#">
		            	<i class="fab fa-linkedin-in white-text mr-4"> </i>
		          	</a>
		          	<!--Instagram-->
		          	<a class="ins-ic" href= "#">
		            	<i class="fab fa-instagram white-text"> </i>
		          	</a>
        		</div>
        	<!-- Grid column -->
      		</div>
    	<!-- Grid row-->
    	</div>
	</div>

  	<!-- ****** Footer Links ******* -->
  	<div class="container text-center text-md-left mt-5">

    	<!-- Grid row -->
    	<div class="row mt-3">

      		<!-- Grid column -->
      		<div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

        		<!-- Content -->
        		<h6 class="text-uppercase font-weight-bold">Our Company</h6>
        		<hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        		<p style = "font-size: 14px;">
          			This system is created by <strong>Micromac Software Inc.</strong><span>&reg;</span>. Our company is
          			one of the leading software companies in Ireland with many companies using our products such as
          			Library Management System, Payroll Management Sytem, Employee Management System, etc. 
        		</p>
      		</div>
	      	<!-- Grid column -->

	      	<!-- Grid column -->
	      	<div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

	        	<!-- Links -->
	        	<h6 class="text-uppercase font-weight-bold">Our Products</h6>
	        	<hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
	        	<p>
	         		<a href="#!" style= "color: #FFFFFF; font-size: 12px;">Payroll Management System</a>
	        	</p>
	        	<p>
	          		<a href="#!" style= "color: #FFFFFF;  font-size: 12px;">Library Management System</a>
	        	</p>
	        	<p>
	          		<a href="#!" style= "color: #FFFFFF;  font-size: 12px;">Hotel Booking System</a>
	        	</p>
	        	<p>
	          		<a href="#!" style= "color: #FFFFFF;  font-size: 12px;">Employee Control System</a>
	        	</p>
	      	</div>
	      	<!-- Grid column -->

	      	<!-- Grid column -->
	      	<div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

	        	<!-- Links -->
	        	<!-- h6 class="text-uppercase font-weight-bold">Useful links</h6-->
	        	<hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
	      	</div>
	      	<!-- Grid column -->

	      	<!-- Grid column -->
	      	<div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

	        	<!-- Links -->
	        	<h6 class="text-uppercase font-weight-bold">Contact</h6>
	        	<hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
	        	<p>
	          		<i class="fas fa-home mr-3"></i>Cork City, Ireland</p>
	        	<p>
	          		<i class="fas fa-envelope mr-3"></i>contact@micromac.net</p>
	        	<p>
	          		<i class="fas fa-phone mr-3"></i> + 353 2345 6789</p>
	        	<p>
	          		<i class="fas fa-print mr-3"></i> + 353 2345 6788</p>
	      	</div>
	      	<!-- Grid column -->
	    </div>
	    <!-- Grid row -->
  	</div>
  	<!-- Footer Links ends -->

  	<!-- Copyright -->
  	<div class="footer-copyright text-center py-3" style= "background-color: #5E5959; color: #EBEDF2;">
    	© Copyright 2020 Micromac Software Inc. All Rights Reserved.
    	<a href="#" style = "color: #ABABFF;">www.micromac.net</a>
  	</div>
  	<!-- Copyright -->
</footer>
<!-- Footer -->
</html>