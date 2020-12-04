<?php
// turn of notices
error_reporting(0);
?>
<?php
include ("auth.php");
$name = $_SESSION["username"];
include "db.php";

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
<style>
body {
background: #b7c6d1;
}
.box {
    margin: auto;


width: 60%;
padding: 10px;
border-radius: 20px;
background: #b7c6d1;
box-shadow:  19px 19px 38px #9ca8b2, 
             -19px -19px 38px #d2e4f0;
text-align: center;
}

</style>
</head>
<body>
    <div class="box" style="width: 100px;height: 100px;padding-left: 50px;padding-right: 50px;padding-bottom: 20px;padding-top: 11px;margin-top: 100px;">
        <a href="../users.php" style="text-decoration: none;color: black;">Users
            <img src="../man.png" width="80&quot;" height="80"style="
    padding-top: 10px;">
  
    </a></div>
    <br>
<div style="text-align:center;">
<p style="color:black;font-family: 'Montserrat';font-size: 22px;margin: auto;padding: 10px;">Number of Users</p>
<div style="font-family: Montserrat;
font-size: 100px;
text-align: center;">
<?php
$con = mysqli_connect("localhost", "root", "", "Assignment");

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "SELECT id FROM users";

if ($result = mysqli_query($con, $sql))
{
    
    $rowcount = mysqli_num_rows($result);
    printf("%d\n", $rowcount);
   
    mysqli_free_result($result);
}

mysqli_close($con);
?> 
</div>

    <div><input class="button" type="button" onclick="location.href='adminlogout.php'" value="logout" /></div>
</body>
</html>
