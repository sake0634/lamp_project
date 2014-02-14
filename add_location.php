<?php //this file adds location under specific Region
$conn = new mysqli("localhost", "lamp", 1 , "lamp_final_project");
if ($conn->connect_errno) {
    die("MySQL connection failed: " . $conn->connect_error);
}
//print "Successfully connected to " . $conn->host_info . "<br>\n";
$result= mysqli_query($conn,"select Region_ID from Region where RegionName='$_POST[region]'");

while($row = mysqli_fetch_array($result))
  {
	$id = $row['Region_ID'];
  }

echo $id;

$sql= "insert into Location (Region_ID, LocationName) values($id,'$_POST[location]')";
if (!mysqli_query($conn,$sql))
  {
  die('Error: ' . mysqli_error($conn));
  }
//echo "1 record added";
mysqli_close($conn);
header("location:index.php");
?>