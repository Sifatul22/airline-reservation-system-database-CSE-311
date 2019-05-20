<?php 
if(isset($_POST['submit'])){
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $connection = mysqli_connect('localhost', 'root', '', 'users');

    if($connection){
        echo "We are connected";
    } else{
        die("Database connection failed");
    }

    $query = "INSERT INTO login(username, password) VALUES ('$username', '$password')";

    $result = mysqli_query($connection, $query);

    if(!$result){ 
        die("query failed" . mysqli_error());
    }
}

?>