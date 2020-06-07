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
<!--------------------------------- About Us Page -------------------------------------->
<html>

<head>
   <meta charset="UTF-8">
   <title>About Us</title>
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
</head>
<!-- Overall airline logo background -->
<body style= "background-image: url('images/logobg.jpg')" >
  
  <div class="container">
    <div class = "row">
      <!-- form background image here -->
      <div  class= "col-md-4 offset-md-1 mt-5 mb-5" style="background-color: #6478CA; border-radius: 2%;">
        <!-- main image here -->        
        <img class = "mt-1" src="images/company.jpg" alt="about" width="462" height="672"
        style= "border-radius: 4%;">        
      </div>

      <!-- ************ About Paragraph ************************** -->

      <div  class= "col-md-6 mt-5 mb-5" style="background-image: url('images/planebg.png'); border-radius: 5%;">
        <div class = "mt-3 mb-3">
        	<h3 style= "text-align: center;">About Us</h3>
        </div>
      	<h4 style= "margin: 10px;">Our Company</h4>
		<p style="text-align: justify; padding: 10px;"><strong>Micromac Software Inc.®</strong> is a leading software industry located in Myanmar (Burma), Singapore and in Ireland and Myo Thet Tun is the CEO of the company. The company's first head quarter was established in September 2002 in Myanmar. Since then it has been producing many software systems across South East Asia region. Some of our famous systems include Employee Management System, Library Management System, Fixed Assets Management Sytem, Software House Management System, Stock Control Management System, etc.</p>

		<h4 style= "margin: 10px;">This System</h4>
		<p style="text-align: justify; padding: 10px;">This system is designed for air ticketing agencies to sell tickets via online. The system has two environments in general, the administrative view and normal user views to separate administraive tasks from routine tasks. A user can check the available flights and choose the desired travelling time and destination easily.</p>

    <p style="text-align: justify; padding: 10px;">For administrative tasks, the administrator can check how the whole system is working and manage and maintain accordingly. The administrative tasks include checking all data in a table, adding or updating records in the tables and printing reports when needed, etc. </p>
      </div>
  	</div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
  crossorigin="anonymous"></script>
  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
  crossorigin="anonymous"></script>

  <!-- ****** font awsome icons script ******* -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <!-- logout script -->
  <script src="js/logout.js"></script>
</body>

<!-- ****** Footer starts here ******* -->
<?php
  include('includes/footer.html');
?>
</html>