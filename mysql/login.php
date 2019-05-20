<?php


if(!$connection){
    die("Database connection failed");
}

if(isset($_POST['submit'])){
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $connection = mysqli_connect('localhost', 'root', '', 'airplane_res_system');

    if(!$connection){
        die("Database connection failed");
    }

    $query = "INSERT INTO users(username, password) VALUES ('$username', '$password')";

    $result = mysqli_query($connection, $query);

    if(!$result){ 
        die("query failed" . mysqli_error());
    }
}
echo "Your account Is successfully Created";
?>