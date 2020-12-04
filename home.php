<?php
// to turn of notices
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
<title>Lister</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body> 
        
<div><h2>Hello <?php echo "$name"; ?></h2></div>
<div><input style="position: absolute;top: 10px;right: 10px;" class="button" type="button" onclick="location.href='logout.php'" value="logout" /></div>



<form action="" method="POST"style="margin-top: 10px";>
<div class="formContainer">
<input type="text" placeholder="Enter List" id="list" name="list" autocomplete="off" required>
<?php
include ("db.php");
$uname = $name;
$value = $_POST['list'];


$sql = "INSERT INTO data(username,val)VALUES('$uname', '$value')";
$result = mysqli_query($connect, $sql);
$result1 = mysqli_query($connect, "SELECT * FROM data WHERE username='$name'");

if ($result)
{
    while ($row = mysqli_fetch_array($result1))

    {
        echo "<td>" . $row['val'] . "</td>";
        echo "<BR>";
    }
}
else
{
    echo "ERROR";
}
?>
</div>
</form>
</body>
</html>
