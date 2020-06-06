<?php
  include('passenger-act.php');
?>
<!DOCTYPE html>
<!--------------------------------- Passenger Form -------------------------------------->
<html>

<head>
   <meta charset="UTF-8">
   <title>Passenger Details</title>
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

  <!-- ********* only for date restriction *************** -->
  <script type="text/javascript" src="js/dateTest.js"></script>
</head>
<!-- Overall airline logo background -->
<body style= "background-image: url('images/logobg.jpg');" onload= "getDob()">
  
  <div class="container">
    <div class = "row">
      <!-- form background image here -->
      <div  class= "col-md-6 offset-md-3 mt-4 mb-2" style="background-image: url('images/planebg.png'); border-radius: 5%;">        
        <img class = "mt-2 ml-2" src="images/passenger.png" alt="passenger" width="52" height="42">

        <!-- php confirm alert -->
        <?php if(isset($_SESSION['response'])){ ?>
        <div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible text-center">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <b><?= $_SESSION['response']; ?></b>
        </div>
        <?php } unset($_SESSION['response']); ?>
        
        <!-- main heading here -->
        

        <form class = "ml-2 mr-2" action = "passenger-act.php" method = "post" name="myform">
          <h1 class="h3 mb-3 font-weight-normal" align = "center">Passenger Details</h1>
          <!-- first row, ID -->
          <div class = "form-group row">      
            <label for="pid" class="col-sm-3 col-form-label">Passenger ID</label>
            <div class = "col">
              <input type="text" id="pid" name = "pid" class="form-control mb-2" placeholder="Auto-numbered ID" value= "<?= $pid; ?>" readonly>
            </div>
          </div>
          <!-- second row, Name -->
          <div class = "form-group row">
            <label for= "name" class="col-sm-3 col-form-label" >Name</label>
            <div class="col">              
              <input type="text" class="form-control" placeholder="First name" name= "fname" value= "<?= $fname; ?>" required autofocus>
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Last name" name = "lname" value= "<?= $lname; ?>" required>
            </div>
          </div>
          <!-- third row, Gender -->
          <div class = "form-group row">
            <label for= "radioGender" class="col-sm-3 col-form-label" >Gender</label>
            <div class="col mt-1">              
              <div class="custom-control custom-radio">
                <input type="radio" id="radioMale" name= "radioGender" class="custom-control-input" value="M" required>
                <label class="custom-control-label" for= "radioMale">Male</label>
              </div>
            </div>
            <div class = "col mt-1">
              <div class="custom-control custom-radio">
                <input type="radio" id="radioFemale" name= "radioGender" class="custom-control-input" value="F">
                <label class="custom-control-label" for= "radioFemale">Female</label>
              </div>
            </div>
          </div>
          <!-- fourth row, DOB -->
          <div class = "form-group row">
            <label for= "dob" class="col-sm-3 col-form-label" >Date of Birth</label>
            <div class="col">              
              <input type="date" class="form-control" id ="dob" name = "dob" value= "<?= $dob; ?>" required />
            </div>
          </div>
          <!-- fifth row, Passport -->
          <div class = "form-group row">
            <label for= "passport" class="col-sm-3 col-form-label" >Passport No.</label>
            <div class="col">              
              <input type="text" class="form-control" placeholder="Passport No." id= "passport" name= "passport" value= "<?= $passport; ?>" maxlength="15" required>
            </div>           
          </div>
          <!-- sixth row, Nationality -->
          <div class = "form-group row">
            <label for= "nationality" class="col-sm-3 col-form-label" >Nationality</label>
            <div class="col">              
              <select class="custom-select" id= "nationality" name= "nationality" required>
                  <option value= "" disabled selected><?= $nationality; ?></option>
                  <option value="france">France</option>
                  <option value="germany">Germany</option>                  
                  <option value="ireland">Ireland</option>
                  <option value="burma">Myanmar(Burma)</option>
                  <option value="uk">United Kingdom</option>                  
                  <option value="others">Others</option>                 
              </select>
            </div>           
          </div>
          <!-- seventh row, Phone -->
          <div class = "form-group row">
            <label for= "phone" class="col-sm-3 col-form-label">Phone</label>
            <div class="col">              
              <input type="text" class="form-control" placeholder="Phone(Accept digit only, no dashes)" id= "phone" name="phone" value= "<?= $phone; ?>" pattern = "\d*" maxlength="20" required>
            </div>           
          </div>
          <!-- eighth row, Email -->
          <div class = "form-group row">
            <label for= "email" class="col-sm-3 col-form-label">Email</label>
            <div class="col">              
              <input type="email" class="form-control" placeholder="Email" id= "email" name= "email" value= "<?= $email; ?>" maxlength="30" required>
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