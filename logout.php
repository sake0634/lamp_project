<?php  //file responsible for logut and redirect to main page
session_start();
session_destroy();
header("location:index.php");
?>