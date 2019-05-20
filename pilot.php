<?php

if(isset($_POST['submit'])){
    
    $pilot_id = $_POST['pilot_id'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $rank = $_POST['rank'];
    $salary = $_POST['salary'];
    $flight_id = $_POST['flight_id'];
    
    $connection = mysqli_connect('localhost', 'root', '', 'airplane_res_system');

    if($connection){
        echo "We are connected";
    } else{
        die("Database connection failed");
    }

    $query = "INSERT INTO pilots(pilot_id, first_name, middle_name, last_name, rank, salary,flight_id) VALUES ($pilot_id, '$first_name', '$middle_name','$last_name', '$rank', $salary, $flight_id)";

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
<h2 class="text-center">Create Pilot Profile </h2>
<form action="pilot.php" method="post">
  <div class="form-group">
    <label for="passport_number">Pilot ID</label>
    <input type="number" name="pilot_id" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter pilot Id">
  </div>
  <div class="form-group">
    <label for="passport_number">Flight ID</label>
    
    <select name="flight_id" id="">
    
    <?php
        global $connection;
        $connection = mysqli_connect('localhost', 'root', '', 'airplane_res_system');
        $query = "SELECT * from flights";
        $result = mysqli_query($connection, $query);
        if($result){
            echo"connected";
        }
        while($row = mysqli_fetch_assoc($result)){
                            
    
            $passport_number = $row['flight_id']; //fetching the id from the database
            echo "<option value= '$passport_number' >$passport_number</option>";
        }
    ?>

    </select>
    </div>
  <div class="form-group">
    <label for="customer_name">First Name</label>
    <input type="text" name="first_name" class="form-control" id="" placeholder="First Name">
  </div>
  <div class="form-group">
    <label for="doe">Middle Name</label>
    <input type="text" name="middle_name" class="form-control" id="" placeholder="Middle Name">
  </div>
  <div class="form-group">
    <label for="phone_number">Last Number</label>
    <input type="text" name="last_name" class="form-control" id="" placeholder="Last Name">
  </div>

  <div class="form-group">
    <label for="address">Rank</label>
    <select type="text" name="rank">
<option value="first_rank">First Rank</option>
<option value="second_rank">Second Rank</option>
<option value="third_rank">Third Rank</option>
</select>
  </div>

  <div class="form-group">
    <label for="phone_number">Salary</label>
    <input type="number" name="salary" class="form-control" id="" placeholder="salary">
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