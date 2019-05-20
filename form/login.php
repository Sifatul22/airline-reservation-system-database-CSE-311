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
            <form action="form_proces.php" method="post">
                <div class="form-group">
                <label for="username">User Name</label><br>
                <input name="username" id="" class="form-control" type="text" value="" placeholder="UserName">
                </div>
                <div class="form-group">
                <label for="password">Password</label><br>
                    <input name="password" id="" class="form-control" type="password" value="" placeholder="Password">
                </div>
                <input type="submit" class="btn btn-primary form-control" name="submit" value="Submit">
            </form>
        </div>
    </div>
</body>
</html>