<?php
    
    include "db.php";

    $query = "SELECT * from login";

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
    <div class="container">
        <div class="col-sm-6">
            <?php
            while($row = mysqli_fetch_assoc($result) ){

                ?>
                <pre>
                <?php
                print_r($row);
               ?>

                </pre>
                <?php
            }
            ?>
            
        </div>
    </div>
</body>
</html>
