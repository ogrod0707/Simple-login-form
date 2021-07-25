
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styleL.css">
</head>
<body>

    <div class="container">
    <div class="box">

        <form action="" method="post">
            <div class="login"><h1>Sign Up</h1></div>
            <input class="text" type="text" placeholder="Login" name="user-name"><br><br>
            <input class="text" type="password" placeholder="Password" name="password"><br><br>
          <div class="ok"> <input class="button"type="submit" value="Sign Up"><br><br>
            <a href="login.php">Click to login</a><br><br>
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
            //save to database
            $user_id = random_num(20);
            $query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";
            mysqli_query($con,$query);

            header("Location: login.php");
            die;
        }else{
            echo "Please enter some valid information!";
        }
    }

?>
 
        </form>

    </div>
    </div>
</body>
</html>