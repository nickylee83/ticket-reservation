<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
    if(!isset($_SESSION['login']))
    {
      // not logged in
      header('Location: login.php');
      exit();
    }
  }
  // check if it is a valid login, prevent unauthorised
  	
	
  if(isset($_POST['submit'], $_POST['table'])) {
    $selected_table = $_POST['table'];
    
    // choose Flight table
    if ($selected_table == "f") {
      $query = "SELECT * FROM flight";
      $result=$conn->query($query);
?>

<!----------------------- Data Table --------------------------------->      
<table id="example" class="table table-hover" style="width:100%">

  <!----------------------- Table Header --------------------------------->
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
    <?php while($row= $result->fetch_assoc()){ ?>
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

        <!----------------------- Delete & Edit Buttons --------------------------------->
        <td>
        	<a href= "flight-act.php?del_fid= <?= $row['fid']; ?>" class= "badge badge-danger p-2" onclick= "return confirm('Are you sure to delete this record?');">Delete</a> :
        	<a href= "flight.php?edt_fid= <?= $row['fid']; ?>" class= "badge badge-primary p-2">Edit</a>
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
  // choose passenger table
  elseif ($selected_table == "p") {
               
    $query = "SELECT * FROM passenger";
    $result=$conn->query($query);
?>

<!----------------------- Data Table --------------------------------->
<table id="example" class="table table-hover" style="width:100%">

  <!----------------------- Table Header --------------------------------->
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Surname</th>
      <th>Gender</th>
      <th>DOB</th>
      <th>Passport</th>
      <th>Nationality</th>
      <th>Phone</th>
      <th>Email</th>                               
    </tr>
  </thead>
  
  <!----------------------- Table Body --------------------------------->
  <tbody>
    <?php while($row= $result->fetch_assoc()){ ?>
      <tr>
        <td><?= $row['pid']; ?></td>
        <td><?= $row['fname']; ?></td>
        <td><?= $row['lname']; ?></td>
        <td><?= $row['gender']; ?></td>
        <td><?= $row['dob']; ?></td>
        <td><?= $row['passport']; ?></td>
        <td><?= $row['nationality']; ?></td>
        <td><?= $row['phone']; ?></td>
        <td><?= $row['email']; ?></td>

        <!----------------------- Delete & Edit Buttons --------------------------------->
        <td>
          <a href= "passenger-act.php?del_pid= <?= $row['pid']; ?>" class= "badge badge-danger p-2" onclick= "return confirm('Are you sure to delete this record?');">Delete</a> :
          <a href= "passenger.php?edt_pid= <?= $row['pid']; ?>" class= "badge badge-primary p-2">Edit</a>
        </td>            
      </tr>
<?php
  } 
?>                                 
  </tbody>

  <!----------------------- Table Footer --------------------------------->
  <tfoot>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Surname</th>
      <th>Gender</th>
      <th>DOB</th>
      <th>Passport</th>
      <th>Nationality</th>
      <th>Phone</th>
      <th>Email</th>            
    </tr>
  </tfoot>
</table>

<?php
  }
  // choose reservation table
  elseif ($selected_table == "r") {
    $query = "SELECT * FROM reservation";
    $result=$conn->query($query);        
  ?>

  <!----------------------- Data Table --------------------------------->
  <table id="example" class="table table-hover" style="width:100%">

    <!----------------------- Table Header --------------------------------->
    <thead>
      <tr>
        <th>Reservation ID</th>
        <th>Pessenger ID</th>
        <th>Flight ID</th>
        <th>Date</th>
        <th>Departure</th>
        <th>Arrival</th>
        <th>Ticket</th>                            
      </tr>
    </thead>

    <!----------------------- Table Body --------------------------------->
    <tbody>
      <?php while($row= $result->fetch_assoc()){ ?>
        <tr>
          <td><?= $row['rid']; ?></td>
          <td><?= $row['pid']; ?></td>
          <td><?= $row['fid']; ?></td>
          <td><?= $row['tdate']; ?></td>
          <td><?= $row['departure']; ?></td>
          <td><?= $row['arrival']; ?></td>
          <td><?= $row['ticket']; ?></td>

          <!----------------------- Delete & Edit Buttons --------------------------------->
          <td>
            <a href= "reservation-act.php?del_rid= <?= $row['rid']; ?>" class= "badge badge-danger p-2" onclick= "return confirm('Are you sure to delete this record?');">Delete</a> :
            <a href= "reservation.php?edt_rid= <?= $row['rid']; ?>" class= "badge badge-primary p-2">Edit</a>
          </td>           
        </tr>
      <?php } ?>                                 
      </tbody>

      <!----------------------- Table Footer --------------------------------->
      <tfoot>
        <tr>
          <th>Reservation ID</th>
          <th>Pessenger ID</th>
          <th>Flight ID</th>
          <th>Date</th>
          <th>Departure</th>
          <th>Arrival</th>
          <th>Ticket</th>            
        </tr>
      </tfoot>
    </table>
<?php
  }
  // choose Payment table
  else {
    $query = "SELECT * FROM payment";
    $result=$conn->query($query);        
  ?>

  <!----------------------- Data Table --------------------------------->
  <table id="example" class="table table-hover" style="width:100%">
    <thead>
      <tr>
        <th>Payment ID</th>
        <th>Reservation ID</th>        
        <th>Payment Date</th>                            
      </tr>
    </thead>

    <!----------------------- Table Body --------------------------------->
    <tbody>
      <?php while($row= $result->fetch_assoc()){ ?>
        <tr>
          <td><?= $row['pyid']; ?></td>
          <td><?= $row['rid']; ?></td>          
          <td><?= $row['pdate']; ?></td>

          <!----------------------- Delete & Edit Buttons --------------------------------->
          <!-- payment record should only be deleted if not needed anymore, but not be edit in any way -->
          <td>
            <a href= "payment-act.php?del_pyid= <?= $row['pyid']; ?>" class= "badge badge-danger p-2" onclick= "return confirm('Are you sure to delete this record?');">Delete</a>
          </td>                     
        </tr>
      <?php } ?>                                 
      </tbody>

      <!----------------------- Table Footer --------------------------------->
      <tfoot>
        <tr>
          <th>Payment ID</th>
          <th>Reservation ID</th>        
          <th>Payment Date</th>            
        </tr>
      </tfoot>
    </table>
<?php
  }
} ?>