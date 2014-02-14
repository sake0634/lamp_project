<?php //this file is the one gives response to Ajax call comes from index.php / Returns search results in html blocks
$conn = new mysqli("localhost", "lamp", 1 , "lamp_final_project");
if ($conn->connect_errno) {
    die("MySQL connection failed: " . $conn->connect_error);
}
$term = strip_tags(substr($_POST['search_term'],0, 100));
$term = mysql_escape_string($term);
$term= strtolower($term);

$result= mysqli_query($conn,"select Distinct(P.Title) as Title,P.Price as Price , P.Uid as Uid , P.Description as Description, P.Email as Email, L.LocationName as LocName , S.SubCategoryName as SubCat FROM Posts P, Location L, Region R, Category C, SubCategory S where (P.SubCategory_Id=S.SubCategory_ID and S.Category_ID=C.Category_ID and P.Location_ID = L.Location_ID and L.Region_ID=R.Region_ID) and (LOWER(R.RegionName) like'%$term%' or LOWER(L.LocationName) like'%$term%' or LOWER(C.CategoryName) like '%$term%' or LOWER(S.SubCategoryName) like '%$term%' or LOWER(P.Title) like '%$term%' or LOWER(P.Description) like '%$term%' or LOWER(P.Email) like '%$term%')");
$string = '';

if (mysqli_num_rows($result) > 0 && strlen($term)>1){
	$string = "<table align='left' border='1' style='display:block; float: none; margin: 0;'><tr><td>Title</td><td>Price</td><td>Description</td><td>Email</td><td>Sub Category</td><td>Location</td></tr>";
  while($row = mysqli_fetch_object($result)){
  	$string .= "<tr>";
    $string .= "<td><font size='2'><a href='ind_posts.php?post=".$row->Uid."'>".substr($row->Title, 0 ,15)."..</a></font></td>";
    $string .= "<td><font size='2'>". $row->Price . "</font></td>";
    $string .= "<td><font size='2'>". substr($row->Description, 0 , 40)."...</font></td> <td><font size='2'>";
    $string .= $row->Email;
    $string .= "</font></td><td><font size='2'>" . $row->SubCat."</font></td><td><font size='2'>". $row->LocName ."</font></td>";
  	$string .= "</tr>";
  }
  	$string .= "</table>";

}else{
	if(strlen($term)>1){
  $string = "No matches!";
  }else{
  $string = "-";
  }
} 

echo $string;

mysqli_close($conn);
?>