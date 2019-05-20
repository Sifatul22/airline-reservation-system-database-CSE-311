<?php

if(isset($_POST['submit'])){
    
    

    $seat_no = $_POST['seat_no']; //fetching the id from the databas
    $gate_no = $_POST['gate_no'];
    $flight_id = $_POST['flight_id'];
   
    $passport_number = $_POST['passport_number'];
    $date = $_POST['date'];
    global $connection;
    $connection = mysqli_connect('localhost', 'root', '', 'airplane_res_system');
    if($connection){
  } else{
      die("Database connection failed");
  }
    $query = "insert into boarding_pass(seat_no, gate_no,passport_number,date,flight_id) values($seat_no, $gate_no, $passport_number, '$date', $flight_id)";
   
    $result = mysqli_query($connection, $query);

    if(!$result){ 
      echo mysqli_error() ."working";
    }else{
        echo"Your Information Booked Successfully";
    }
}




?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/custom.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="index.php">Airline Reservation System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Airline System
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="buy_ticket.php">Customer Details</a>
          <a class="dropdown-item" href="view_customer.php">View Customer</a>
          <a class="dropdown-item" href="update_customer.php">Update Customer</a>
          
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Ticket
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="ticket_reservation.php">Ticket Reservation</a>
          <a class="dropdown-item" href="boarding_pass.php">View Boarding Pass</a>
          
          <a class="dropdown-item" href="delete_seat.php">Cancel Seat</a>
        </div>
      </li> 
      
    

      
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>


<div class="container">
<div class="row">
    <div class="col-12">
    <div class="form-group">
    <!-- <select name="source" id=""> -->
        <?php
        $connection = mysqli_connect('localhost', 'root', '', 'airplane_res_system');
        $query = "SELECT * from flights";
        $result = mysqli_query($connection, $query);
        if(!$result){
            echo"Not connected";
        }
        $result = $connection->query($query);

            if ($result->num_rows > 0) {
                // output data of each row
                echo"<table class='table'>
                <thead>
                  <tr>
                    <th>Flight Id</th>
                    <th>Source</th>
                    <th>Destination</th>
                    <th>No of Seats</th>
                    <th>Departure Time</th>
                    <th>Arrival Time</th>
                  </tr>
                </thead>";
                while($row = $result->fetch_assoc()) {
                   // echo "<h3></br><pre>id: " . $row["flight_id"]. "<b> - Source: </b>" . $row["source"]. "<b>- Destination: </b>" . $row["destination"]. "<b>- No of Seats: </b>" . $row["no_of_seats"]. "<b>- Departure Time: </b>" . $row["departure_time"]. "<b>- Arrival Time: </b>" . $row["arrival_time"]."</h3></pre><br>";
                    echo"
                    <tbody>
                    <tr>
                        <td>" . $row["flight_id"] ."</td>
                        <td>" . $row["source"]. "</td>
                        <td>" . $row["destination"]. "</td>
                        <td>" . $row["no_of_seats"]. "</td>
                        <td>" . $row["departure_time"]. "</td>
                        <td>" . $row["arrival_time"]. "</td>
                    </tr>
                    </tbody>
                   
                    ";
                }
            } else {
                echo "0 results";
            }
            // second query

            ?>
            
            
            
       
    </div>

    <!-- </select> -->
    </div>

    <!-- end of the first row -->
    <div class="container">

  
    <div class="row">

    <div class="col-8">
       <h2 class="text-center"> Ticket Reservation </h2>
    
       <form action="ticket_reservation.php" method="post">
       <div class="form-group">
    <label for="passport_number">Ticket Number</label>
  
    <?php
    
        $query = "SELECT * from ticket";
        $result = mysqli_query($connection, $query);
        if(!$result){
            echo"not connected";
        }
        $count = 1;
        while($row = mysqli_fetch_assoc($result)){
                            
    
            $passport_number = $row['ticket_id']; //fetching the id from the database
            
        }
        $passport_number = $passport_number + 1;
        echo "<input name= '$passport_number' type='text' value=' $passport_number'>";
    ?>

    
  </div>

  <div class="form-group">
    <label for="passport_number">Passport Number</label>
    <select name="passport_number" id="">
    
    <?php
    
        $query = "SELECT * from passenger";
        $result = mysqli_query($connection, $query);
        if(!$result){
            echo"not connected";
        }
        while($row = mysqli_fetch_assoc($result)){
                            
    
            $passport_number = $row['passport_number']; //fetching the id from the database
            echo "<option value= '$passport_number' >$passport_number</option>";
        }
    ?>

    </select>
  </div>
  <div class="form-group">
    <label for="flight_id">flight ID</label>
    <select name="flight_id" id="">
    
    <?php
    
        $query = "SELECT * from flights";
        $result = mysqli_query($connection, $query);
        if(!$result){
            echo"not connected";
        }
        while($row = mysqli_fetch_assoc($result)){
                            
    
            $flight_id = $row['flight_id']; //fetching the id from the database
            echo "<option value= '$flight_id' >$flight_id</option>";
        }
    ?>

    </select>
  </div>
  <div class="form-group">
    <label for="seat_no">Seat No</label>
  <input type='text' name='seat_no' class='form-control' placeholder='seat no'>

  </div>

  <div class="form-group">
    <label for="gate_no">Gate No</label>
    <input type="text" name="gate_no" class="form-control" id="" placeholder="gate no">
  </div>

  <div class="form-group">
    <label for="date">Journey Date</label>
    <input type="datetime-local" name="date" class="form-control" id="" placeholder="Journey Date">
  </div>


  <button type="submit" name="submit" class="btn btn-primary">BOOK</button>
</form>


    </div>

    <div class="col-4">
 <div class="card">
  <div class="card-body">
  <?php
  echo "Your gate no is ". mt_rand(1, 10); 
  ?>
  </div>
</div>

<div class="card">
  <div class="card-body">
  <?php
    
    $query = "SELECT * from boarding_pass";
    $result = mysqli_query($connection, $query);
    if(!$result){
        echo"not connected";
    }

    $count =0;
    while($row = mysqli_fetch_assoc($result)){
                        

        $flight_id = $row['flight_id']; //fetching the id from the database
        $count++;
        //echo "<option value= '$flight_id' >$flight_id</option>";
    }
    echo "Your seat number is ".$count;
?>
  </div>
</div>

 </div> 


  </div>

      


</div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="js/tether.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
<script src="js/Bootstrap_tutorial.js"></script>
</body>
</html>