<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="design/style.css" />
<title>Mini Craiglist</title>
</head>

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
        <form action='receivedpost.php' method='post' enctype="multipart/form-data">
<table>


<tr>
<td>Sub Category:</td>
<td><select name="subcat">
<option value="0"></option>
<?php
include 'global_arrays.php'; //Global array is the responsible file for getting and setting values from DB
$r = get_subcategories($_POST['Cat']); //In this loop we are giving names of sub categories to dropdown menu
foreach($r as $re)
{
if(strlen($re['SubCategoryName']) > 0){
$str_cat= "<option value='" . $re['SubCategory_ID']."'";
$str_cat .= ">" .$re['SubCategoryName']. "</option>";
echo $str_cat;
}
}?>
</select></td>
</tr>

<tr>
<td>
Location: </td> <td><select name="Loc">
<option value="0"></option>
<?php
$r = get_locations($_POST['Reg']); //In this loop we are giving names of locations to dropdown menu
echo print_r($r);
foreach($r as $re)
{
if(strlen($re['LocationName']) > 0){
$str_l= "<option value='" . $re['Location_ID']."'";
$str_l .= ">" .$re['LocationName']. "</option>";
echo $str_l;
}
}?>
</select></td>
</tr>
<tr>
<td>Title: </td><td><input type="text" name="Title"></td> <!-- here is the form for posts --!>
</tr>

<tr><td>Price:</td><td> <input type="text" name="Price"></td>
</tr>
<tr><td>Description:</td><td> <textarea name="Desc" rows="10" cols="30"></textarea></td></tr>
<tr><td>Email: </td><td><input type="text" name="email"></td></tr>
<tr><td>Confirm Email:</td><td> <input type="text" name="emailc"></td></tr>
<tr><td>I agree with terms and conditions: </td><td><input type="checkbox" name="agree" value="agree"></td></tr> <br>
<tr><td>Optional Fields:</td></tr> <br>
<tr><td>Photo 1(max 5 mb):</td><td> <input type="file" name="img1" accept="image/*"> </td></tr>
<tr><td>Photo 2(max 5 mb):</td><td> <input type="file" name="img2" accept="image/*"> </td></tr>
<tr><td>Photo 3(max 5 mb):</td><td> <input type="file" name="img3" accept="image/*"> </td></tr>
<tr><td>Photo 4(max 5 mb):</td><td> <input type="file" name="img4" accept="image/*"> </td></tr>

<tr><td><button type="submit" value="Submit">Submit</button>
  <button type="reset" value="Reset">Reset</td></button></tr>
   <?php echo '<input type="hidden" name="Reg" value="'.$_POST['Reg'].'">'; /* sending category */?>
<?php echo '<input type="hidden" name="Cat" value="'.$_POST['Cat'].'">';	/* and Region data to receivedpost.php*/?>

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