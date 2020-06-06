<?php
  include ('reservation-act.php');  
?>
<!DOCTYPE html>
<!--------------------------------- Reservation Form -------------------------------------->
<html>

<head>
   <meta charset="UTF-8">
   <title>Reservation Details</title>
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
  <!-- ********* only for From/To & Dep/Arr time *************** -->
  <script type="text/javascript" src="js/select-validation.js"></script>
  <!-- ********* only for date restriction *************** -->
  <script type="text/javascript" src="js/dateTest.js"></script>
</head>
<!-- Overall airline logo background -->
<body style= "background-image: url('images/logobg.jpg');" onload= "getToday()">
  
  <div class="container">
    <div class = "row">
      <!-- form background image here -->
      <div  class= "col-md-4 offset-md-1 mt-5 mb-2" style="background-image: url('images/planebg.png'); border-radius: 5%;">
        <!-- small image -->        
        <img class = "mt-2 ml-2" src="images/search.png" alt="search" width="62" height="52">
        <!-- main heading here -->        

        <form class = "m-2 p-2" method= "POST" action = "#">
          <h1 class="h3 mb-3 font-weight-normal" align = "center">Search Available Flights</h1>
          
          <!-- row, Route -->
          <div class = "form-group row">
            <label for= "route" class="col-sm-2 col-form-label" >Route</label>
            <div class="col">                          
              <select class="custom-select" id= "from" name="from" onchange= "routeSelect()" required>
                  <option value= "" diabled selected>From</option>
                  <option value="City A">City A</option>
                  <option value="City B">City B</option>                  
                  <option value="City C">City C</option>
                  <option value="City D">City D</option>                             
              </select>
            </div>
            <div class="col">              
              <select class="custom-select" id= "to" name="to" onchange= "routeSelect()" required>
                  <option value = "" disabled selected>To</option>
                  <option value="City A">City A</option>
                  <option value="City B">City B</option>                  
                  <option value="City C">City C</option>
                  <option value="City D">City D</option>                             
              </select>
            </div>
          </div>          
          <!-- Flight Date -->
          <div class = "form-group row">
            <label for= "date" class="col-sm-2 col-form-label" >Date</label>
            <div class="col">              
              <input type="date" class="form-control" id = "cdate" name="date" required>
            </div>
          </div>
          
          <!-- last row, Buttons -->
          <div class = "form-group row">            
            <button class="btn btn-primary offset-md-4" type="submit" name= "search">Search Available Flights</button>
          </div>
        </form>
      </div>

      <!-- ************ Reservation Details Form ************************** -->
      <!-- form background image here -->
      <div  class= "col-md-6 mt-5 mb-2" style="background-image: url('images/planebg.png'); border-radius: 5%">
        <!-- php confirm alert -->
        <?php if(isset($_SESSION['response'])){ ?>
        <div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible text-center">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <b><?= $_SESSION['response']; ?></b>
        </div>
        <?php } unset($_SESSION['response']); ?>

        <!-- main heading here -->
        <form class = "m-2 p-2" method = "POST" action = "reservation-act.php" id= "myForm">
          <h1 class="h3 mb-3 font-weight-normal" align = "center">Reservation Details</h1>
          <!-- first row, ID -->
          <div class = "form-group row">      
            <label for="rid" class="col-sm-3 col-form-label">Reservation ID</label>
            <div class = "col">
              <input type="text" id="rid" name = "rid" class="form-control mb-2" placeholder="Auto-numbered ID" value= "<?= $rid; ?>" readonly>
            </div>
          </div>

          <!-- passenger ID -->
          <div class = "form-group row">      
            <label for="pid" class="col-sm-3 col-form-label">Passenger ID</label>
            <div class = "col">
              <select class= "custom-select" id= "pid" name = "pid" required>
                
                <option value = "" disabled selected><?= $pid; ?></option>
                <!-- fetch pid from database and fill into combo box -->
                <?php
                  $query = "SELECT pid FROM passenger";
                  $result= $conn->query($query);

                  while($row = mysqli_fetch_array($result)) {
                    echo "<option value='".$row['pid']."'>".$row['pid']."</option>";
                  }
                ?>                     
              </select>
            </div>
          </div>

          <!-- Date -->
          <div class = "form-group row">
            <label for= "date" class="col-sm-3 col-form-label" >Date</label>
            <div class="col">              
              <input type="date" class="form-control" id = "date" name="date" value= "<?= $date; ?>" required>
            </div>
          </div>

          <!-- Flight ID -->
          <div class = "form-group row">
            <label for= "fid" class="col-sm-3 col-form-label">Flight ID</label>
            <div class="col">              
              <select class= "custom-select" id= "fid" name = "fid" required>
                
                <option value = "" disabled selected><?= $fid; ?></option>
                <!-- fetch fid from database and fill into combo box -->
                <?php
            	  
                  $query = "SELECT fid FROM flight";
                  $result= $conn->query($query);

                  while($row = mysqli_fetch_array($result)) {
                    echo "<option value='".$row['fid']."'>".$row['fid']."</option>";
                  }                  
                ?>                     
              </select>
            </div>
          </div>
          
          <!-- row, Route -->
          <div class = "form-group row">
            <label for= "time" class="col-sm-3 col-form-label" >Time</label>
            <div class="col">                          
              <select class="custom-select" id= "dep" name = "dep" onchange= "timeSelect()" required>
                  <option value= "" disabled selected><?= $dep; ?></option>
                  <option value="08:00">08:00</option>
                  <option value="10:00">10:00</option>
                  <option value="12:00">12:00</option>
                  <option value="14:00">14:00</option>
                  <option value="16:00">16:00</option>                             
              </select>
            </div>
            <div class="col">              
              <select class="custom-select" id= "arr" name = "arr" onchange= "timeSelect()" required>
                  <option value= "" disabled selected><?= $arr; ?></option>
                  <option value="08:00">08:00</option>
                  <option value="10:00">10:00</option>
                  <option value="12:00">12:00</option>
                  <option value="14:00">14:00</option>
                  <option value="16:00">16:00</option>                            
              </select>
            </div>
          </div>

          <!-- row, Tickets -->
          <div class = "form-group row">
            <label for= "no_ticket" class="col-sm-3 col-form-label">Tickets</label>
            <div class="col">              
              <input type="number" class="form-control" placeholder="Number of tickets" id= "ticket" name = "ticket" value= "<?= $ticket; ?>" min= "1" required>
            </div>           
          </div>
          
          <!-- last row, Buttons -->
          <div class = "form-group row">
            <?php if($isUpdate == true) { ?>
              <button class="btn btn-primary offset-md-4" type="submit" name="update">Update</button>
            <?php } else { ?>            
              <button class="btn btn-primary offset-md-4" type="submit" name="submit">Submit</button>
            <?php } ?>
            <div class = "col">
              <button class="btn btn-success" type= "reset">Reset</button>
            </div>
          </div>

          <!-- ****** This was removed for simplicity ******* --><!--*********--><!--*********--><!--*********-->
          <!-- p class="mt-3 mb-2 text-muted" align = "center">&copy; Micromac Software Inc. 2020</p-->
        </form>  
      </div>

      <!------------------------------ Data Table ---------------------------------------------->
      <div  class= "col-md-12 mt-3 mb-2 table-responsive" style="background-image: url('images/planebg.png'); border-radius: 5%">
        <?php
          if(isset($_POST['search'], $_POST['date'], $_POST['from'], $_POST['to'])) {
            $date = $_POST['date'];
            $from = $_POST['from'];
            $to = $_POST['to'];

            $query = "SELECT * FROM flight WHERE tdate = '$date' AND
            origin = '$from' AND destination = '$to'";
            $result=$conn->query($query);
        ?>
          <!----------------------- Table Header --------------------------------->
          <table id="example" class="table table-hover" style="width:100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>Airline Name</th>
                <th>From</th>
                <th>To</th>
                <th>Date</th>
                <th>Departure</th>
                <th>Arrival</th>
                <th>Seat</th>
                <th>Price</th>                                
              </tr>
            </thead>

            <!----------------------- Table Body --------------------------------->
            <tbody>
              <?php while($row = $result->fetch_assoc()){ ?>
                <tr>
                  <td><?= $row['fid']; ?></td>
                  <td><?= $row['name']; ?></td>
                  <td><?= $row['origin']; ?></td>
                  <td><?= $row['destination']; ?></td>
                  <td><?= $row['tdate']; ?></td>
                  <td><?= $row['departure']; ?></td>
                  <td><?= $row['arrival']; ?></td>
                  <td><?= $row['seat']; ?></td>
                  <td><?= $row['price']; ?></td>

                  <!----------------------- Select Flight Button --------------------------------->
                  <td>
                      <a href= "reservation.php?sel_flight= <?= $row['fid'] ?>" class= "badge badge-primary p-2" onclick= "showMe()">Select Flight</a>
                  </td>            
                </tr>
              <?php } ?>                                 
            </tbody>

            <!----------------------- Table Footer --------------------------------->
            <tfoot>
              <tr>
                <th>ID</th>
                <th>Airline Name</th>
                <th>From</th>
                <th>To</th>
                <th>Date</th>
                <th>Departure</th>
                <th>Arrival</th>
                <th>Seat</th>
                <th>Price</th>            
              </tr>
            </tfoot>
          </table>
        <?php  
            }
        ?>
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