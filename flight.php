<?php
  include('flight-act.php');
?>
<!DOCTYPE html>
<!--------------------------------- Flight Form -------------------------------------->
<html>

<head>
   <meta charset="UTF-8">
   <title>Flight Details</title>
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
<body style= "background-image: url('images/logobg.jpg')" onload= "getToday()">
  
  <div class="container">
    <div class = "row">
      <!-- form background image here --><!--*********--><!--*********--><!--*********--><!--*********-->
      <div  class= "col-md-6 offset-md-3 mt-5 mb-2" style= "background-image: url('images/planebg.png'); border-radius: 5%;">
        <!-- small image -->        
        <img class = "mt-2 ml-2" src="images/plane-shade.png" alt="plane" width="82" height="72">

        <!-- php confirm alert -->
        <?php if(isset($_SESSION['response'])){ ?>
        <div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible text-center">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <b><?= $_SESSION['response']; ?></b>
        </div>
        <?php } unset($_SESSION['response']); ?>

        <!-- main heading here -->        

        <form class = "ml-2 mr-2" action = "flight-act.php" method = "post" name="myform">

          <h1 class="h3 mb-3 font-weight-normal" align = "center">Flight Details</h1>
          <!-- first row, ID -->
          <div class = "form-group row">      
            <label for="fid" class="col-sm-2 col-form-label">Flight ID</label>
            <div class = "col">
              <input type="text" id="fid" name = "fid" class="form-control mb-2" placeholder="Auto-numbered ID" value= "<?= $fid; ?>" readonly>
            </div>
          </div>
          <!-- second row, Name -->
          <div class = "form-group row">
            <label for= "name" class="col-sm-2 col-form-label" >Name</label>
            <div class = "col">
              <input type="text" class="form-control" placeholder= "Name" id= "name" name = "name" value= "<?= $name; ?>" required autofocus>
            </div>            
          </div>
          <!-- third row, Route -->
          <div class = "form-group row">
            <label for= "route" class="col-sm-2 col-form-label" >Route</label>
            <div class="col">                          
              <select class="custom-select" id= "from" name= "from" onchange= "routeSelect()" required>
                  <option value= "" disabled selected><?= $origin; ?></option>
                  <option value="City A">City A</option>
                  <option value="City B">City B</option>                  
                  <option value="City C">City C</option>
                  <option value="City D">City D</option>                             
              </select>
            </div>
            <div class="col">              
              <select class="custom-select" id= "to" name= "to" onchange= "routeSelect()" required>
                  <option value= "" disabled selected><?= $dest; ?></option>
                  <option value="City A">City A</option>
                  <option value="City B">City B</option>                  
                  <option value="City C">City C</option>
                  <option value="City D">City D</option>                             
              </select>
            </div>
          </div>          
          <!-- fourth row, Flight Date -->
          <div class = "form-group row">
            <label for= "date" class="col-sm-2 col-form-label" >Date</label>
            <div class="col">              
              <input type="date" class="form-control" id = "date" name= "date" value= "<?= $tdate; ?>" required>
            </div>
          </div>
          <!-- fifth row, dep & arr times -->
          <div class = "form-group row">
            <label for= "time" class="col-sm-2 col-form-label" >Time</label>
            <div class="col">                          
              <select class="custom-select" id= "dep" name= "dep" onchange= "timeSelect()" required>
                  <option value= "" disabled selected><?= $dep; ?></option>
                  <option value="08:00">08:00</option>
                  <option value="10:00">10:00</option>
                  <option value="12:00">12:00</option>
                  <option value="14:00">14:00</option>
                  <option value="16:00">16:00</option>                             
              </select>
            </div>
            <div class="col">              
              <select class="custom-select" id= "arr" name= "arr" onchange= "timeSelect()" required>
                  <option value= "" disabled selected><?= $arr; ?></option>
                  <option value="08:00">08:00</option>
                  <option value="10:00">10:00</option>
                  <option value="12:00">12:00</option>
                  <option value="14:00">14:00</option>
                  <option value="16:00">16:00</option>                             
              </select>
            </div>
          </div>
          <!-- seventh row, Total Seats -->
          <div class = "form-group row">
            <label for= "seat" class="col-sm-2 col-form-label">Seats</label>
            <div class="col">              
              <select class= "custom-select" id= "seat" name= "seat" required>
                  <option value= "" disabled selected><?= $seat; ?></option>
                  <option value="30">30</option>
                  <option value="70">70</option>                  
                  <option value="100">100</option>                             
              </select>
            </div>           
          </div>
          <!-- eighth row, Price -->
          <div class = "form-group row">
            <label for= "price" class="col-sm-2 col-form-label">Price €</label>
            <div class="col">              
              <input type="number" class="form-control" placeholder="Price" id= "price" name= "price" value= "<?= $price; ?>" min= "1" required>
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