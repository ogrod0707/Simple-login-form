<?php
session_start();
    
    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Login Form</title>
    <link rel="stylesheet" href="styleL.css">
</head>
<body>
    <div class="container">
    

    <div class="main">
    <h1>Strona główna</h1><br>
 
  
   <p>Witaj <?php echo $user_data['user_name']; ?>!</p>
   <a class="btn-logout" href="login.php">Logout</a>
    </div>
    </div>
</body>
</html>