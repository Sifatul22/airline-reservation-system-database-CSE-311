<?php

if(isset($_POST['submit'])){
    
    $flight_id = $_POST['flight_id'];
    $airplane_name = $_POST['name'];
    $source = $_POST['source'];
    $destination = $_POST['destination'];
    $departure_time = $_POST['departure_time'];
    $arrival_time = $_POST['arrival_time'];
    $flight_class = $_POST['type'];
    $no_of_seats = $_POST['no_of_seats'];
    $flight_charges = $_POST['price'];
    
    $connection = mysqli_connect('localhost', 'root', '', 'airplane_res_system');

    if($connection){
        echo "Your Information Successfully submitted";
    } else{
        die("Database connection failed");
    }

    $query = "INSERT INTO flights(flight_id, no_of_seats, source, departure_time, destination, arrival_time) VALUES ($flight_id, $no_of_seats, '$source','$departure_time', '$destination', '$arrival_time')";
    $query1 = "INSERT INTO ticket(price, type, flight_id) VALUES ('$flight_charges', '$flight_class', '$flight_id')";
    $query2 = "INSERT INTO Airline(name, type,flight_id) VALUES ('$airplane_name', '$flight_class', '$flight_id')";
    $query3 = "INSERT INTO 'source/destination'(flight_id, source, departure_time, destination, arrival_time) VALUES ($flight_id,'$source','$departure_time', '$destination', '$arrival_time')";

    $result = mysqli_query($connection, $query);
    $result1 = mysqli_query($connection, $query1);
    $result2 = mysqli_query($connection, $query2);
    $result3 = mysqli_query($connection, $query3);

    
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
<h2 class="text-center"> Fillup Flight Details </h2>
<form action="agent_flight_details.php" method="post">
  <div class="form-group">
    <label for="flight_id">Flight ID</label>
    <input type="number" name="flight_id" class="form-control" id="" aria-describedby="emailHelp" placeholder="Flight Id">
  </div>
  <div class="form-group">
    <label for="flight_name">Flight Name</label>
    <input type="text" name="name" class="form-control" id="" placeholder="Flight Name">
  </div>
  <div class="form-group">
    <label for="source">Source</label>
    <input type="text" name="source" class="form-control" id="" placeholder="Source">
  </div>
  <div class="form-group">
    <label for="destination">Destination</label>
    <input type="text" name="destination" class="form-control" id="" placeholder="Your destination">
  </div>

  <div class="form-group">
    <label for="departure_time">Departure Time</label>
    <input type="datetime-local" name="departure_time" class="form-control" id="" placeholder="departure time">
  </div>

  <div class="form-group">
    <label for="arrival_time">Arrival Time</label>
    <input type="datetime-local" name="arrival_time" class="form-control" id="" placeholder="Arrival Time">
  </div>

  <div class="form-group">
    <label for="flight_type">Flight Class</label>
    <select type="text" name="type">
<option value="Business">Business</option>
<option value="Economy">Economy</option>
<option value="Normal">Normal</option>
</select>
    </div>

    <div class="form-group">
    <label for="no_of_seats">No of Seats</label>
    <input type="number" name="no_of_seats" class="form-control" id="" placeholder="No of seats">
  </div>

  <div class="form-group">
    <label for="price">Flight Charges</label>
    <input type="text" name="price" class="form-control" id="" placeholder="Flight Charges">
  </div>

  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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