<?php
    require('db.php');
    session_start();
    error_reporting(0);
                      

    if (isset($_POST['login'])){

        $username1 = stripslashes($_REQUEST['username']);

        $username1 = mysqli_real_escape_string($connect,$username1);
        $password1 = stripslashes($_REQUEST['password']);
        $password1 = mysqli_real_escape_string($connect,$password1);

        $query2 = "SELECT * FROM `admin` WHERE username='$username1'
        and password='$password1' ";
        $result = mysqli_query($connect,$query2) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if($rows==1){
            $_SESSION['username'] = $username1;
            $_SESSION['email'] = $email1;
            header("Location:admindash.php");
        }else{
            $name_error1 =  "Username or Password is incorrect";echo "<script type='text/javascript'> onload = function(){alert('$name_error1');}</script>";
        }
    }
?>


<!DOCTYPE html>
<html>
    <head>   
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>

<body>
<form action="" method="POST"style="margin-top: 100px";>
<div class="formContainer">
<h2>Hello! Admin</h2>
<input type="text" placeholder="Username" name="username" required>
<br>
<input type="password" placeholder="Password" name="password" required>
<br>
<span> <?php echo " <span class=\"text-danger\"> $name_error1 </span>" ; ?></span>
<button  class="button" type="submit" name="login">Login</button>
</div>
</form>
</body>
</html>

 
 
