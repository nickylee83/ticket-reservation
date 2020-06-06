<?php
  include('login-act.php');
?>
<!DOCTYPE html>
<!--------------------------------- User Login Form -------------------------------------->
<html>

<head>
   <meta charset="UTF-8">
   <title>User Login</title>
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
      <div  class= "col-md-4 mt-5 mb-5" style="background-image: url('images/planebg.png'); border-radius: 5%;">

        <form class = "mt-3 mr-3" action = "login-act.php" method = "post" name="myform">
          <img class = "mb-3" src="images/login.jpg" alt="login" width="62" height="52">
          <h1 class="h3 mb-3 font-weight-normal">Welcome!</h1>
          
          <!-- Email -->
          <label for="email">Email</label>
          <input type="email" id="email" name= "email" class="form-control mb-3" placeholder="Email" required autofocus>
          
          <!-- Password -->
          <label for="inputPassword">Password</label>
          <input type="password" id="password" name= "password" class="form-control mb-3" placeholder="Password" required>
          
          <!-- Remember Me checkbox -->
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>

          <!-- Buttons -->
          <button class="btn btn-md btn-primary btn-block" type="submit" name= "submit">Sign in</button>
          <p class="mt-3 mb-2" align = "center">Don't have an account? <a href= "signup.php">Sign up here!</a></p>
          <p class="mt-5 mb-2 text-muted" align = "center">&copy; Micromac Software Inc. 2020</p>
        </form>
      </div>
      
      <!-- Right side plane background -->
      <div class = "col-md-8">
        <img class = "mb-0" src="images/planelow.png" alt="plane" width="855" height="652">
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