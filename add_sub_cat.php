<?php
$conn = new mysqli("localhost", "lamp", 1 , "lamp_final_project");
if ($conn->connect_errno) {
    die("MySQL connection failed: " . $conn->connect_error);
}
//print "Successfully connected to " . $conn->host_info . "<br>\n";
$result= mysqli_query($conn,"select Category_ID from Category where CategoryName='$_POST[Cat]'");
//check selected Category first. If it exist then proceed to adding Sub Category
while($row = mysqli_fetch_array($result))
  {
	$id = $row['Category_ID'];
  }

//echo $id;
//adding sub category
$sql= "insert into SubCategory (Category_ID, SubCategoryName) values($id,'$_POST[sub_cat]')";
if (!mysqli_query($conn,$sql))
  {
  die('Error: ' . mysqli_error($conn));
  }
//echo "1 record added";
mysqli_close($conn);
header("location:index.php");
?>