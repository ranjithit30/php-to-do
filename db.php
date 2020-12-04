<?php
$connect = mysqli_connect("localhost", "root", "", "Assignment");
// Check connection
if ($connect === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
