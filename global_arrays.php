<?php


function get_categories() // returns all categories in DB
{
$conn = new mysqli("localhost", "lamp", 1 , "lamp_final_project");
if ($conn->connect_errno) {
    die("MySQL connection failed: " . $conn->connect_error);
}
//print "Successfully connected to " . $conn->host_info . "<br>\n";
$result = mysqli_query($conn,"Select * from Category");

while($r[] = mysqli_fetch_array($result));

mysqli_close($conn);
return $r;
}

function get_post($uid) //Returns post with their Unique ID Column
{
$conn = new mysqli("localhost", "lamp", 1 , "lamp_final_project");
if ($conn->connect_errno) {
    die("MySQL connection failed: " . $conn->connect_error);
}
//print "Successfully connected to " . $conn->host_info . "<br>\n";
$result = mysqli_query($conn,"Select * from Posts where Uid='".$uid."'");

while($r[] = mysqli_fetch_array($result));

mysqli_close($conn);
return $r;
}

function get_posts() //Returns all posts available in DB
{
$conn = new mysqli("localhost", "lamp", 1 , "lamp_final_project");
if ($conn->connect_errno) {
    die("MySQL connection failed: " . $conn->connect_error);
}
//print "Successfully connected to " . $conn->host_info . "<br>\n";
$result = mysqli_query($conn,"Select * from Posts order by Post_ID desc");

while($r[] = mysqli_fetch_array($result));

mysqli_close($conn);
return $r;
}


function get_subcategories($id) // Returns Sub Categories under specific Category
{
$conn = new mysqli("localhost", "lamp", 1 , "lamp_final_project");
if ($conn->connect_errno) {
    die("MySQL connection failed: " . $conn->connect_error);
}
//print "Successfully connected to " . $conn->host_info . "<br>\n";
$result = mysqli_query($conn,"Select SubCategory_ID, SubCategoryName from SubCategory where Category_ID = ( Select Category_ID from Category where CategoryName = '".$id."' )");

while($r[] = mysqli_fetch_array($result));

mysqli_close($conn);
return $r;
}

function get_regions() // Returns all Regions in DB
{
$conn = new mysqli("localhost", "lamp", 1 , "lamp_final_project");
if ($conn->connect_errno) {
    die("MySQL connection failed: " . $conn->connect_error);
}
//print "Successfully connected to " . $conn->host_info . "<br>\n";
$result = mysqli_query($conn,"Select * from Region");

while($r[] = mysqli_fetch_array($result));

mysqli_close($conn);
return $r;
}

function get_locations($id) // Returns all locations under specific region
{
$conn = new mysqli("localhost", "lamp", 1 , "lamp_final_project");
if ($conn->connect_errno) {
    die("MySQL connection failed: " . $conn->connect_error);
}
//print "Successfully connected to " . $conn->host_info . "<br>\n";
$result = mysqli_query($conn,"Select Location_ID, LocationName from Location where Region_ID = ( Select Region_ID from Region where RegionName = '".$id."' )");

while($r[] = mysqli_fetch_array($result));

mysqli_close($conn);
return $r;
}

function get_location_name($id)
{
$conn = new mysqli("localhost", "lamp", 1 , "lamp_final_project");
if ($conn->connect_errno) {
    die("MySQL connection failed: " . $conn->connect_error);
}
//print "Successfully connected to " . $conn->host_info . "<br>\n";
$result = mysqli_query($conn,"Select LocationName from Location where Location_ID ='".$id."'");

while($r[] = mysqli_fetch_array($result));

mysqli_close($conn);
return $r;
}

function get_subcat_name($id)
{
$conn = new mysqli("localhost", "lamp", 1 , "lamp_final_project");
if ($conn->connect_errno) {
    die("MySQL connection failed: " . $conn->connect_error);
}
//print "Successfully connected to " . $conn->host_info . "<br>\n";
$result = mysqli_query($conn,"Select SubCategoryName from SubCategory where SubCategory_ID ='".$id."'");

while($r[] = mysqli_fetch_array($result));

mysqli_close($conn);
return $r;
}




function isMemberExist($name) //Checks whether member already exist. 
{
$conn = new mysqli("localhost", "lamp", 1 , "lamp_final_project");
if ($conn->connect_errno) {
    die("MySQL connection failed: " . $conn->connect_error);
}
//print "Successfully connected to " . $conn->host_info . "<br>\n";
$result = mysqli_query($conn,"Select username from members where username ='".$name."')");
//while($r[] = mysqli_fetch_array($result));

	if(!$result || $result == 1 )
	{
		return true;
	}else
	{
		return false;
	}
mysqli_close($conn);
}

function addMember($name, $password) // If member does not exists, adds new member.
{
// Connect to server and select databse.
$conn = new mysqli("localhost", "lamp", 1 , "lamp_final_project");
	if ($conn->connect_errno) {
   	 die("MySQL connection failed: " . $conn->connect_error);
	}
	//print "Successfully connected to " . $conn->host_info . "<br>\n";


// insertion
mysqli_query($conn,"insert into members (username , password) values('".$name. "','" .$password."')");


// Register username
session_start();
$_SESSION['username']= $_POST['myusername'];

return true;

}



?>