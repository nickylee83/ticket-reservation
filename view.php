<?php
  include ('includes/config.php');
  // if this is not included, there will be an error message (For Session variable)
  include ('view-session.php');    
?>
<!DOCTYPE html>
<!--------------------------------- View All Form -------------------------------------->
<html>

<head>
   <meta charset="UTF-8">
   <title>View All Tables</title>
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

      <!-- ************ View Table Form ************************** -->
      <!-- form background image here -->
      <div  class= "col-md-6 offset-md-3 mt-5 mb-2" style="background-image: url('images/planebg.png'); border-radius: 5%;">

        <!-- php confirm alert -->
        <?php if(isset($_SESSION['response'])){ ?>
        <div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible text-center">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <b><?= $_SESSION['response']; ?></b>
        </div>
        <?php } unset($_SESSION['response']); ?>

        <!----------------------- Main Heading --------------------------------->
        <form class = "m-2 p-3" method= "POST" action = "#">
          <h1 class="h3 mb-3 font-weight-normal" align = "center">View Tables</h1>
          
          <!-- Choose Table combo box -->
          <div class = "form-group row">
            <label for= "table" class="col-sm-2 col-form-label">Table: </label>
            <div class="col">              
              <select class= "custom-select" id= "table" name = "table" required>
                  <option value = "" disabled selected>Choose Table</option>
                  <option value="f">Flight</option>
                  <option value="p">Passenger</option>                  
                  <option value="r">Reservation</option>
                  <option value="py">Payment</option>                             
              </select>
            </div>
          </div>

          <!-- last row, Buttons -->
          <div class = "form-group row">            
            <button class="btn btn-primary offset-md-4" type="submit" name= "submit">View Table</button>
            <div class = "col">
              <button class="btn btn-success" type= "reset">Reset</button>
            </div>
          </div>
          <!-- p class="mt-3 mb-2 text-muted" align = "center">&copy; Micromac Software Inc. 2020</p -->
        </form>  
      </div>

      <!----------------------- Data Table --------------------------------->
      <div  class= "col-md-12 mt-3 mb-2 table-responsive" style="background-image: url('images/planebg.png'); border-radius: 5%;">
        <?php
          include ('view-act.php');
        ?>      
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

<?php
  include('includes/footer.html');
?>
</html>