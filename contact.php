<?php
  session_start();
  // check if it is a valid login, prevent unauthorised
  if(!isset($_SESSION['login']))
    {
      // not logged in
      header('Location: login.php');
      exit();
    }
?>

<!DOCTYPE html>
<!--------------------------------- Contact Us -------------------------------------->
<html>

<head>
   <meta charset="UTF-8">
   <title>Contact Us</title>
   <!-- bootstrap stylesheet -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
       crossorigin="anonymous">
  <!-- my own logo for every page -->
  <link rel = "shortcut icon" type= "image/gif" href= "images/micromac.gif">
  <!-- my own stylesheet -->
  <link href="css/style.css" rel="stylesheet">
  <!-- ****** Navigation Bar starts here ******* -->
  <?php
    include('includes/navigation.html');
  ?>
  <!-- display message for receiving feedback message -->
  <script>
    function receiveFeedback(name) {
      alert("Thank you " + name + ". We have received your feedback.");
    }
  </script>
</head>
<!-- Overall airline logo background -->
<body style= "background-image: url('images/logobg.jpg')">
	<!-- form background image here -->
    <div  class= "col-md-6 offset-md-3 mt-5 mb-2" style="background-image: url('images/planebg.png'); border-radius: 5%;">

        <!--Section heading-->
        <h2 class="h1-responsive text-center my-4">Contact us</h2>
        <!--Section description-->
        <p class="text-center w-responsive mx-auto mb-3">Do you have any questions? Please do not hesitate to contact us directly.</p>

        <div class="row">

            <!--Grid column-->
            <div class="col-md-8 mb-md-0 mx-auto mb-5">
                <form id="contact-form" name="contact-form" action="mailto:nickylee83@gmail.com" method="POST" enctype="text/plain" onsubmit= "receiveFeedback(name.value);">

                    <!--Grid row-->
                    <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-2">
                        	<label for="name" class="">Your name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder= "Name" required autofocus>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-2">
                        	<label for="email" class="">Your email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder= "Email" required>
                        </div>
                    </div>
                    <!--Grid column-->

                    </div>
                    <!--Grid row-->

                    <!--Grid row-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form mb-2">
                        	   <label for="subject" class="">Subject</label>
                                <input type="text" id="subject" name="subject" class="form-control" placeholder= "Subject" required>
                            </div>
                        </div>
                    </div>
                    <!--Grid row-->

                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-12">

                            <div class="md-form">
                        	    <label for="message">Your message</label>
                                <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea" placeholder= "Message" required></textarea>
                            </div>

                        </div>
                    </div>
                    <!--Grid row-->
                    <div class="text-center text-md-left">
                        <button class="btn btn-success btn-block mt-3 mb-3" type= "submit">Send</button>
                    </div>
                </form>           
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-4 text-center">
                <ul class="list-unstyled mb-0">
                    <li>
                	   <img class = "mt-2 ml-2" src="images/location.png" alt="location" width="72" height="62">
                        <p>Cork City, Ireland</p>
                    </li>

                    <li>
                	   <img class = "mt-2 ml-2" src="images/phone.png" alt="phone" width="52" height="42">
                        <p>+ 353 2345 6789</p>
                    </li>

                    <li>
                	   <img class = "mt-2 ml-2" src="images/email.png" alt="email" width="52" height="42">
                        <p>contact@micromac.net</p>
                    </li>
                </ul>
            </div>
            <!--Grid column-->            
        </div>
        <!-- ****** This was removed for simplicity ******* --><!--*********--><!--*********--><!--*********-->
         <!-- p class="mt-3 mb-2 text-muted" align = "center">&copy; Micromac Software Inc. 2020</p-->
    </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
  crossorigin="anonymous"></script>
  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
  crossorigin="anonymous"></script>
  <!-- ****** font awsome icons script ******* --><!--*********--><!--*********--><!--*********--><!--*********-->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- logout script -->
  <script src="js/logout.js"></script>
</body>

<!-- ****** Footer starts here ******* -->
<?php
  include('includes/footer.html');
?>
</html>