<?php
  include('payment-act.php');
?>
<!DOCTYPE html>
<!--------------------------------- Payment Form -------------------------------------->
<html>

<head>
   <meta charset="UTF-8">
   <title>Payment Details</title>
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
      <div  class= "col-md-4 offset-md-1 mt-5 mb-2" style="background-image: url('images/planebg.png'); border-radius: 5%;">
        
        <!-- main heading here -->        

        <form class = "ml-2 mr-2" action= "payment-rec.php" method= "POST">
          <h1 class="h3 mb-3 font-weight-normal" align = "center">Your Booking Information</h1>
          <!-- Read the last record from reservation table (the newest one just entered) -->
          <?php  
            $query = "SELECT * FROM reservation ORDER BY rid DESC LIMIT 1;";
            $result= $conn->query($query);

            while($row = mysqli_fetch_array($result)) {
              $rid = $row['rid'];
              $pid = $row['pid'];
              $fid = $row['fid'];
              $date = $row['tdate'];
              $dep = $row['departure'];
              $arr = $row['arrival'];
              $ticket = $row['ticket'];
            }    
          ?>
          <!-- show your current new booking information -->
          <!-- first row, Reservation ID -->
          <div class = "form-group row">
            <label for= "rid" class="col-sm-5 col-form-label" >Reservation ID</label>
            <div class="col">                          
              <label for= "rid" class="col-sm-7 col-form-label" ><?php echo $rid; ?></label>
            </div>
          </div>
          <!-- second row, Passenger ID -->
          <div class = "form-group row">
            <label for= "pid" class="col-sm-5 col-form-label" >Passenger ID</label>
            <div class="col">                          
              <label for= "pid" class="col-sm-7 col-form-label" ><?php echo $pid; ?></label>
            </div>
          </div>
          <!-- Flight ID -->
          <div class = "form-group row">
            <label for= "fid" class="col-sm-5 col-form-label" >Flight ID</label>
            <div class="col">                          
              <label for= "fid" class="col-sm-7 col-form-label" ><?php echo $fid; ?></label>
            </div>
          </div>          
          <!-- Travel Date -->
          <div class = "form-group row">
            <label for= "date" class="col-sm-4 col-form-label" >Travel Date</label>
            <div class="col">                          
              <label for= "date" class="col-sm-8 col-form-label" ><?php echo $date; ?></label>
            </div>
          </div>
          <!-- Departure -->
          <div class = "form-group row">
            <label for= "dep" class="col-sm-5 col-form-label" >Departure</label>
            <div class="col">                          
              <label for= "dep" class="col-sm-7 col-form-label" ><?php echo $dep; ?></label>
            </div>
          </div>
          <!-- Arrival -->
          <div class = "form-group row">
            <label for= "arr" class="col-sm-5 col-form-label" >Arrival</label>
            <div class="col">                          
              <label for= "arr" class="col-sm-7 col-form-label" ><?php echo $arr; ?></label>
            </div>
          </div>
          <!-- No. of tickets -->
          <div class = "form-group row">
            <label for= "ticket" class="col-sm-5 col-form-label" >No. of Tickets</label>
            <div class="col">                          
              <label for= "ticket" class="col-sm-7 col-form-label" ><?php echo $ticket; ?></label>
            </div>
          </div>         
          
        </form>
      </div>

      <!-- ************ Payment Details Form ************************** -->
      
      <div  class= "col-md-6 mt-5 mb-2" style="background-image: url('images/planebg.png'); border-radius: 5%">
        
        
        <!-- small image -->        
        <img class = "mt-2 ml-2" src="images/debit.png" alt="debit cards" width="82" height="72">
        <!-- php confirm alert -->
        <?php if(isset($_SESSION['response'])){ ?>
        <div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible text-center">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <b><?= $_SESSION['response']; ?></b>
        </div>
        <?php } unset($_SESSION['response']); ?>

        <!--------------------------- Payment Details Form ----------------------------->

        <form class = "ml-2 mr-2" action = "payment-act.php" method = "POST" name="myform2">

          <h1 class="h3 mb-3 font-weight-normal" align = "center">Payment Details</h1>
          <!-- Card No. have four columns of digits -->
          <div class = "form-group row">      
            <label for="card" class="col-sm-2 col-form-label">Card No.</label>
            <!-- Column 1 -->
            <div class = "col">
              <input type="text" pattern = "\d*" id="card1" name = "card1" class="form-control mb-2" placeholder="0000" maxlength="4" minlength="4" required autofocus>
            </div>
            <!-- Column 2 -->            
            <div class = "col">
              <input type="text" pattern = "\d*" id="card2" name = "card2" class="form-control mb-2" placeholder="0000" maxlength= "4" minlength="4" required>
            </div>
            <!-- Column 3 -->
            <div class = "col">
              <input type="text" pattern = "\d*" id= "card3" name = "card3" class="form-control mb-2" placeholder="0000" maxlength= "4" minlength="4" required>
            </div>
            <!-- Column 4 -->
            <div class = "col">
              <input type="text" pattern = "\d*" id= "card4" name = "card4" class="form-control mb-2" placeholder="0000" maxlength= "4" minlength="4" required>
            </div>
          </div>

          <!-- Name -->
          <div class = "form-group row">      
            <label for="holder" class="col-sm-2 col-form-label">Name</label>
            <div class = "col">
              <input type="text" id="holder" name = "holder" class="form-control mb-2" placeholder="Card Holder Name" required>
            </div>
          </div>
          <!-- CVV -->
          <div class = "form-group row">
            <label for= "cvv" class="col-sm-2 col-form-label">CVV</label>
            <div class="col">             
              <input type="text" pattern = "\d*" id="cvv" name = "cvv" class="form-control mb-2" placeholder="000" maxlength= "3" minlength="3" required>           
            </div>
            <!-- intentionally leave blank columns here -->
            <div class="col">             
                         
            </div>
            <div class="col">             
                         
            </div>
            <div class="col">             
                         
            </div>
            <div class="col">             
                         
            </div>
          </div>
          <!-- Expired Month and year -->
          <div class = "form-group row">
            <label for= "time" class="col-sm-2 col-form-label" >Expired</label>
            <div class="col">                          
              <select class="custom-select" id= "month" required>
                  <option value= "" disabled selected>Month</option>
                  <option value="1">01</option>
                  <option value="2">02</option>
                  <option value="3">03</option>
                  <option value="4">04</option>
                  <option value="5">05</option>
                  <option value="6">06</option>
                  <option value="7">07</option>
                  <option value="8">08</option>
                  <option value="9">09</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>                             
              </select>
            </div>
            <div class="col">              
              <select class="custom-select" id= "year" required>
                  <option value= "" disabled selected>Year</option>
                  <option value="1">2020</option>
                  <option value="2">2021</option>
                  <option value="3">2022</option>
                  <option value="4">2023</option>                              
              </select>
            </div>
          </div>
          <!-- last row, Buttons -->
          <div class = "form-group row">            
            <button class="btn btn-primary offset-md-4" type="submit" name= "submit">Pay Now!</button>
            <!--div class = "col">
              <button class="btn btn-success" type="submit" onclick= "location.href = 'reservation.php';">Back To Reservation</button>
            </div-->
          </div>
          <!-- ****** This was removed for simplicity ******* --><!--*********--><!--*********--><!--*********-->
          <!-- p class="mt-3 mb-2 text-muted" align = "center">&copy; Micromac Software Inc. 2020</p-->
        </form>  
      </div>      
    </div>
  </div>
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