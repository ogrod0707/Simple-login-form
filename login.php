

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styleL.css">
</head>
<body>
   <div class="container">
    <div class="box">

        <form action="" method="post">
            <div class="login"><h1>Login</h1></div>
            <input class="text" type="text" placeholder="Login" name="user-name"><br><br>
            <input class="text" type="password" placeholder="Password" name="password"><br><br>
            <div class="ok"><input class="button"type="submit" value="Login"><br><br>
            <a href="register.php">Click to Register</a><br><br>
            </div>
            <?php
session_start();

include("connection.php");
include("functions.php");


if($_SERVER['REQUEST_METHOD'] == "POST"){
    //sth was posted
    $user_name = $_POST['user-name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){
        //read from database
        
        $query = "select * from users where user_name = '$user_name' limit 1";
        $result = mysqli_query($con,$query);
        if($result){


            if($result && mysqli_num_rows($result) > 0){

                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['password'] === $password){

                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    die;
                }
        
            }
           
        }

       
            echo"<p>Wrong password or login</p>";
    }else{
       
        echo "<p>Please enter some correct information!</p>";
    }
}

?>
        </form><br></br>





    </div>
    </div>
</body>
</html>