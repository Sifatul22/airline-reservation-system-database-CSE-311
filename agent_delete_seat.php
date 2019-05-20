<?php

if(isset($_POST['submit'])){
    
    $passport_number = $_POST['ticket_id'];
    $connection = mysqli_connect('localhost', 'root', '', 'airplane_res_system');

    if($connection){
        echo "Information has been updated successfully";
    } else{
        die("Database connection failed");
    }

    $query = "delete from ticket where ticket_id = $passport_number";

    $result = mysqli_query($connection, $query);

    if(!$result){ 
        die("query failed" . mysqli_error());
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
          <a class="dropdown-item" href="agents.php">Agent Details</a>
          <a class="dropdown-item" href="agent_view_customer.php">View Customer</a>
          <a class="dropdown-item" href="update_agent.php">Update agent</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="agent_flight_details.php">Flight Info</a>
          
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Ticket
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="agent_ticket_reservation.php">Ticket Reservation</a>
          <a class="dropdown-item" href="agent_passenger_list.php">Passenger List</a>
          <a class="dropdown-item" href="agent_delete_seat.php">Cancel Seat</a>
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
<form action="delete_seat.php" method="post">
  <div class="form-group">
    <label for="passport_number">Ticket Number</label>
    
    <select name="ticket_id" id="">
    
    <?php
        global $connection;
        $connection = mysqli_connect('localhost', 'root', '', 'airplane_res_system');
        $query = "SELECT * from ticket";
        $result = mysqli_query($connection, $query);
        if($result){
            echo"connected";
        }
        while($row = mysqli_fetch_assoc($result)){
                            
    
            $passport_number = $row['ticket_id']; //fetching the id from the database
            echo "<option value= '$passport_number' >$passport_number</option>";
        }
    ?>

    </select>
</div>

  <button type="submit" name="submit" class="btn btn-primary">DELETE</button>
</form>
</div>


<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="js/tether.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
<script src="js/Bootstrap_tutorial.js"></script>
</body>
</html>