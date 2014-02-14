<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="design/style.css" />
<title>Mini Craiglist</title>
</head>
<!-- This File is Responsible for askind Category and Region before leads people to post form page--!>
<body>
    <div id="page">
		
        <div id="header">
        	<h1>Mini Craiglist</h1>
                      <ul>
            	<li><a href="index.php">Home</a></li>
            	 <li><a href='cat_loc_spec.php'>Newpost</a></li>
           	   	<?php
			session_start();
			if(!isset($_SESSION['username'])){
			?>
				<li><a href='main_login.php'>Login</a></li>
            <?php
            }
            else
            {
            	
            ?>
            	<li><a href='logout.php'>Logout</a></li>
			<?php
			}
            ?>
               
                <li><a href='help.php'>Help</a></li>
                
            </ul>
        </div>
  
        <div id="main">
<form action='form.php' method='post' enctype="multipart/form-data">
<table>


<tr>
<td>Category:</td>
<td><select name="Cat">
<?php
include 'global_arrays.php';
$r = get_categories();
foreach($r as $re)
{
if(strlen($re['CategoryName']) > 0){
$str_cat= "<option value='" . $re['CategoryName']."'";
$str_cat .= ">" .$re['CategoryName']. "</option>";
echo $str_cat;
}
}?>
</select></td>
</tr>

<tr>
<td>
Region: </td> <td><select name="Reg">
<?php
$r = get_regions();
foreach($r as $re)
{
if(strlen($re['RegionName']) > 0){
$str_l= "<option value='" . $re['RegionName']."'";
$str_l .= ">" .$re['RegionName']. "</option>";
echo $str_l;
}
}?>
</select></td>
</tr>
<tr><td><button type="submit" value="Submit">Next</button>
  <button type="reset" value="Reset">Reset</td></button></tr>


</table>
</form>

            
           

        </div>
        <br>
        <div>
        
        
        <div id="footer">
        <p>
        All rights reserved.
        </p>
        </div>
        
        </div>
</body>
</html>