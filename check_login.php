<?php 

// Connect to server and select databse.
$conn = new mysqli("localhost", "lamp", 1 , "lamp_final_project");
	if ($conn->connect_errno) {
   	 die("MySQL connection failed: " . $conn->connect_error);
	}
	//print "Successfully connected to " . $conn->host_info . "<br>\n";


// username and password sent from form 
	$myusername=htmlspecialchars($_POST['myusername'], ENT_QUOTES); //get rid of special chars preventing injection
 	$mypassword=$_POST['mypassword']; 

// To protect MySQL injection we use htmlspecialchars
$result= mysqli_query($conn,"SELECT * FROM members WHERE username='$myusername' and password='$mypassword'");


// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
session_destroy();
session_start();
$_SESSION['username']= $_POST['myusername'];

header("location:login_success.php");
}
else {
header("location:main_login.php?fail=1"); //Else returns main login by adding fail to url
}
?>