<?php
$conn = new mysqli("localhost", "lamp", 1 , "lamp_final_project");
if ($conn->connect_errno) {
    die("MySQL connection failed: " . $conn->connect_error);
}
//print "Successfully connected to " . $conn->host_info . "<br>\n";

$sql= "insert into Category (CategoryName) values('$_POST[cat]')";
if (!mysqli_query($conn,$sql))
  {
  die('Error: ' . mysqli_error($conn));
  }

mysqli_close($conn);
header("location:index.php");
?>