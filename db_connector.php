<?php 
$conn = new mysqli("localhost", "lamp", 1);
if ($conn->connect_errno) {
    die("MySQL connection failed: " . $conn->connect_error);
}
//print "Successfully connected to " . $conn->host_info . "<br>\n";


?>