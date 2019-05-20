<?php

include "db.php";
?>

<?php
function showAllData(){
    global $connection;
    $connection = mysqli_connect('localhost', 'root', '', 'users');
    $query = "SELECT * from login";
    $result = mysqli_query($connection, $query);
    if($result){
        echo"connected";
    }
    while($row = mysqli_fetch_assoc($result)){
                        

        $id = $row['id']; //fetching the id from the database
        echo "<option value= '$id' >$id</option>";
    }
   
}