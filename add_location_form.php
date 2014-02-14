<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="design/style.css" />
<link href="jsImgSlider/themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />
<script src="jsImgSlider/themes/1/js-image-slider.js" type="text/javascript"></script>
<title>Mini Craiglist</title>
</head>
<!-- This File has Form to get new location under specific region, Admin user can use this form-->
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
		Add Sub-Category <br>

	<form action='add_location.php' method='post'>
	Select Region
	<select name="region">
<?php
include 'global_arrays.php';
$r = get_regions();
foreach($r as $re)
{
if(strlen($re['RegionName']) > 0){
$str_cat= "<option value='" . $re['RegionName']."'";
$str_cat .= ">" .$re['RegionName']. "</option>";
echo $str_cat;
}
}?>
</select>

	Enter new Location:
	<input type="text" name="location">
	<button type="submit" value="Submit">Submit</button>
	<button type="reset" value="Reset">Reset</td></button></tr>
	</form>
    	</div>
    <br><br>
        
        
        <div id="footer">
        <p>
        All rights reserved.
        </p>
        </div>
        
        </div>
</body>


</html>