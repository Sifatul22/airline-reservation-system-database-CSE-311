<?php


    

    
    $connection = mysqli_connect('localhost', 'root', '', 'airplane_res_system');

    if(!$connection){
       die("Database connection failed");
    }

    $query = "select * from boarding_pass";

    $result = mysqli_query($connection, $query);

    if(!$result){ 
        die("query failed" . mysqli_error());
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
<h2 class="text-center">Boarding Pass</h2>
<div class="col-12">
<div class="form-group">
    <!-- <select name="source" id=""> -->
        <?php
        $connection = mysqli_connect('localhost', 'root', '', 'airplane_res_system');
        $query = "SELECT * from boarding_pass";
        $result = mysqli_query($connection, $query);
        if(!$result){
            echo"Not connected";
        }
        $result = $connection->query($query);

            if ($result->num_rows > 0) {
                // output data of each row
                echo"<table class='table'>
                <thead>
                  <tr class='success'>
                    <th >Ticket Number</th>
                    <th >date</th>
                    <th>Seat No</th>
                    <th>Gate No</th>
                    <th>Passport Number</th>
                    <th>Flight Id</th>
                
                    
                  </tr>
                </thead>";
                while($row = $result->fetch_assoc()) {
                   // echo "<h3></br><pre>id: " . $row["flight_id"]. "<b> - Source: </b>" . $row["source"]. "<b>- Destination: </b>" . $row["destination"]. "<b>- No of Seats: </b>" . $row["no_of_seats"]. "<b>- Departure Time: </b>" . $row["departure_time"]. "<b>- Arrival Time: </b>" . $row["arrival_time"]."</h3></pre><br>";
                    echo"
                    <tbody>
                    <tr class='warning'>
                        <td>" . $row["ticket_number"] ."</td>
                        <td>" . $row["date"]. "</td>
                        <td>" . $row["seat_no"]. "</td>
                        <td>" . $row["gate_no"]. "</td>
                        <td>" . $row["passport_number"]. "</td>
                        <td>" . $row["flight_id"]. "</td>
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
</div>


<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="js/tether.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
<script src="js/Bootstrap_tutorial.js"></script>
</body>
</html>