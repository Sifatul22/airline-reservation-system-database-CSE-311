<?php

if(isset($_POST['submit'])){
    
    $passport_number = $_POST['passport_number'];
    $customer_name = $_POST['customer_name'];
    $date_of_expiry = $_POST['date_of_expiry'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    
    $connection = mysqli_connect('localhost', 'root', '', 'airplane_res_system');

    if($connection){
        echo "We are connected";
    } else{
        die("Database connection failed");
    }

    $query = "INSERT INTO passenger(passport_number, country, date_of_expiry, phone_number, address, customer_name) VALUES ($passport_number, '$country', '$date_of_expiry','$phone_number', '$address', '$customer_name')";

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

  
</nav>


<div class="container">
<button type="button" class="btn btn-primary btn-lg btn-block" onclick="window.location.href = 'buy_ticket.php';">Customer</button>
<button type="button" class="btn btn-secondary btn-lg btn-block" onclick="window.location.href = 'agents.php';">Agents</button>




</div>


<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="js/tether.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
<script src="js/Bootstrap_tutorial.js"></script>
</body>
</html>