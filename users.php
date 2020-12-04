<?php
error_reporting(0);
$conn = mysqli_connect("localhost", "root", "", "Assignment");
$result = mysqli_query($conn, "SELECT * FROM users");
?>
<!DOCTYPE html>
<html>
<head>
<title>Users</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet"> 
<style>
#users {
  font-family:Montserrat;
  border-collapse: collapse;
  width: 50%;
  text-align: center;
  }

#users td, #users th {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: center;
}

#users tr:nth-child(even){background-color: #f2f2f2;}

#users tr:hover {background-color: #ddd;}

#users th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  color: #ffffff;
  background: #6c7ae0;
}

</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
</head>
<body>
<div style="margin-left: 450px;margin-top: 100px;">
<table id="users">
<tr>
<th>Id</th>
<th>Name</th>
<th>Gender</th>
<th>Mail</th>

</tr>
<?php
$i = 0;
while ($row = mysqli_fetch_array($result))
{
?>
<tr>
<td><?php echo $row["id"]; ?></td>
<td><?php echo $row["name"]; ?></td>
<td><?php echo $row["gender"]; ?></td>
<td><?php echo $row["email"]; ?></td>
</tr>
<?php
    $i++;
}
?>
</table>
<div>
</body>
</html>
