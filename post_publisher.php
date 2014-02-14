<?php //this file is responsible for inserting post to DB. Gets Called after user clicks to Publish 
$conn = new mysqli("localhost", "lamp", 1 , "lamp_final_project");
	if ($conn->connect_errno) {
   	 die("MySQL connection failed: " . $conn->connect_error);
	}
	print "Successfully connected to " . $conn->host_info . "<br>\n";
	$sc = intval($_POST[SubCat]);
	$loc = intval($_POST[Loc]);

	$sql= "Insert into Posts (Title, Price, Description, Email, Agreement, TimeStamp ,
		Image_1 , Image_2, Image_3, Image_4, SubCategory_ID, Location_ID, Uid) 
		values('$_POST[Title]' , '$_POST[Price]','$_POST[Desc]','$_POST[Email]'	,'$_POST[Agree]',CURDATE(),'$_POST[Image1]','$_POST[Image2]','$_POST[Image3]','$_POST[Image4]', $sc , $loc, '$_POST[Uid]' )";
		
	if (!mysqli_query($conn,$sql))
	  {
 	 die('Error: ' . mysqli_error($conn));
  		}
	echo "1 record added";
	mysqli_close($conn);
?>
