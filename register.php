<?php
include ("db.php");
if (isset($_POST["register"]))
{
    $name = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $dob = $_POST['date'];
    $sql_u = "SELECT * FROM users WHERE username='$username'";
    $sql_e = "SELECT * FROM users WHERE email='$email'";
    $res_u = mysqli_query($connect, $sql_u);
    $res_e = mysqli_query($connect, $sql_e);
    if (mysqli_num_rows($res_u) > 0)
    {
        $name_error = "Oops username already taken";
        echo "<script type='text/javascript'> onload = function(){alert('$name_error');
            }</script>";
    }
    else if (mysqli_num_rows($res_e) > 0)
    {
        $email_error = "Oops! email already taken";
        echo "<script type='text/javascript'> onload = function(){alert('$email_error');
                }</script>";
    }
    else
    {
        $query = "INSERT INTO users (name,gender,email,username,password,dob) VALUES ('$name','$gender','$email','$username','" . md5($password) . "','$dob')";
        $data = mysqli_query($connect, $query);
        if ($data)
        {
            $sucess_error = "Success! now you can login";
            echo "<script type='text/javascript'> onload = function(){alert('$sucess_error');
                }</script>";
        }
    }
}
?>



<!DOCTYPE html>
<html>
<head>
<title>SignUp</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body>
<form style="margin-top: 100px"; action="" autocomplete="on" method="POST" >
    <div class="formContainer">
    <h2>SignUp</h2>
    <input type="text" placeholder="Name" name="fullname" value="<?php if (isset($fullname))
{
    echo $fullname;
} ?>"  required>
    <br>
    <input style="width: 40%;
    background: transparent;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border-radius: 4px;
    border: 1px solid #5f5f5f;
    outline: none;" type="text" value="select DOB" onfocus="(this.type='date')" placeholder="Date Of Birth" name="date">
    <br>
    <input type="radio" checked="checked" name="gender" value="Male"><a style="color:#555;font-size: 20px;";>♂</a>
    <input type="radio" name="gender" value="Female"><a style="color:pink;font-size: 20px;";>♀</a>
    <input type="radio" name="gender" value="Others"><a style="color:#555;font-size: 20px;";>⚥</a>
    <br>
    <input type="text" placeholder="Username" name="username" value="<?php if (isset($username))
{
    echo $username;
} ?>" autocomplete="off" required>
    <br>
    <input type="email" placeholder="Email" name="email" value="<?php if (isset($email))
{
    echo $email;
} ?>" autocomplete="off" required>                     
    <br>
    <input type="password" placeholder="Password" name="password" required>
    <br>
    <button type="submit" class="button" name="register">Register</button>
    <p>Already have an account? <a href="login.php">login</a></p>  
    </div>                           
</form>
</body>
</html>
