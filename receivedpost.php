<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="design/style.css" />
<link href="jsImgSlider/themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />
<script src="jsImgSlider/themes/1/js-image-slider.js" type="text/javascript"></script>
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
			if(!isset($_SESSION['username'])){ // please refer to comment in index.php
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
        
       <?php
       include_once 'post_class.php'; // calling post class
       $post = new Post; 			  // to create post instance and fill it through form submission
		$err_count = $err_title = $err_price = $err_desc = $err_mail = $err_agree = 0;  //initialize required variables
		$img1_loc = $img2_loc = $img3_loc = $img4_loc = "";								//for checks
if (isset($_POST)) {
	
	$err_text = "<font color='red'>Please check following(s): </font> <br>";
	
	if(empty($_POST['subcat']) || $_POST['subcat'] == "empty" ) // category must be selected
	{
	$err_text .= " <font color='red'>*</font> Sub Category <br>";
	$err_count++;
	}else{$post->setSubCat($_POST['subcat']);}
	
	if(empty($_POST['Loc']) ||  $_POST['Loc'] == "empty"){ // loc must be selected
	$err_text .= " <font color='red'>*</font>Location <br>";
	$err_count++;
	}else{$post->setLoc($_POST['Loc']);}
	if(empty($_POST['Title']) || strlen($_POST['Title']) > 98 || strlen($_POST['Title']) < 1){
	$err_text .= " <font color='red'>*</font>Title <br>";
	$err_count++;
	$err_title++;
	
	}else{$post->setTitle(htmlspecialchars($_POST['Title'], ENT_QUOTES));}
	
	if(strlen($_POST['Price']) < 1){
	$err_text .= " <font color='red'>*</font>Price <br>";
	$err_count++;
	$err_price++;
	}else{$post->setPrice(htmlspecialchars($_POST['Price'], ENT_QUOTES));}
	
	if(empty($_POST['Desc'])){
	$err_text .= " <font color='red'>*</font>Descripton <br>";
	$err_count++;
	$err_desc++;
	}else{$post->setDesc(htmlspecialchars($_POST['Desc'], ENT_QUOTES));}
	$pattern = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';
	if(preg_match($pattern, $_POST['email']) !== 1 || ( $_POST['email'] != $_POST['emailc']) || strlen($_POST['email']) > 97 || strlen($_POST['email']) < 1 ){
	$err_text .= " <font color='red'>*</font>email format or confirm email <br>";
	$err_count++;
	$err_mail++;
	}else{$post->setEmail($_POST['email']);}
	
	if(empty($_POST['agree'])){
	$err_text .= " <font color='red'>*</font>You should agree terms and conditions <br>";
	$err_count++;
	$err_agree++;
	}else{$post->setAgree($_POST['agree']);}
	
	if(!empty($_FILES['img1']['type']) || !empty($_FILES['img2']['type']) || !empty($_FILES['img3']['type']) || !empty($_FILES['img4']['type'])){
		//print_r($_FILES);
	 	$dir = 'images/'; 
		if($_FILES['img1']['size'] > 0)
		{
			if((($_FILES["img1"]["type"] == "image/gif")
				|| ($_FILES["img1"]["type"] == "image/jpeg")
				|| ($_FILES["img1"]["type"] == "image/png")
				|| ($_FILES["img1"]["type"] == "image/jpg"))
				&& ($_FILES["img1"]["size"] < 5242880)
				){		   
			$etc = explode("/",$_FILES['img1']['type'])[1]; 
			$filename = time() . '_1' . '.' .$etc; 
			$img1_loc = $dir.$filename;
			move_uploaded_file($_FILES['img1']['tmp_name'], $img1_loc);
			
			if(($_FILES["img1"]["type"] == "image/jpeg") || ($_FILES["img1"]["type"] == "image/jpg")){
				list($width, $height) = getimagesize($img1_loc);
				$image_p = imagecreatetruecolor(300, 220);
				$image = imagecreatefromjpeg($img1_loc);
				imagecopyresampled($image_p, $image, 0, 0, 0, 0, 300, 220, $width, $height);
				imagejpeg($image_p, $img1_loc, 100);
			}
			$post->setImage1($img1_loc);
			}else
			{
			$err_text .= " <font color='red'>*</font>Check size or format of Photo 1 <br>";
			}
		}
		if(!empty($_FILES['img2']['size']))
		{
			if((($_FILES["img2"]["type"] == "image/gif")
				|| ($_FILES["img2"]["type"] == "image/jpeg")
				|| ($_FILES["img2"]["type"] == "image/png")
				|| ($_FILES["img2"]["type"] == "image/jpg"))
				&& ($_FILES["img2"]["size"] < 5242880)
				){
			$etc = explode("/",$_FILES['img2']['type'])[1]; 
			$filename = time() . '_2' . '.' .$etc; 
			$img2_loc = $dir.$filename;
			move_uploaded_file($_FILES['img2']['tmp_name'], $dir.$filename);
			
			if(($_FILES["img2"]["type"] == "image/jpeg") || ($_FILES["img2"]["type"] == "image/jpg")){
				list($width, $height) = getimagesize($img2_loc);
				$image_p = imagecreatetruecolor(300, 220);
				$image = imagecreatefromjpeg($img2_loc);
				imagecopyresampled($image_p, $image, 0, 0, 0, 0, 300, 220, $width, $height);
				imagejpeg($image_p, $img2_loc, 100);
			}
			
			$post->setImage2($img2_loc);
			}else
			{
			$err_text .= " <font color='red'>*</font>Check size or format of Photo 2 <br>";
			}
		}
		if(!empty($_FILES['img3']['name']))
		{
			if((($_FILES["img3"]["type"] == "image/gif")
				|| ($_FILES["img3"]["type"] == "image/jpeg")
				|| ($_FILES["img3"]["type"] == "image/png")
				|| ($_FILES["img3"]["type"] == "image/jpg"))
				&& ($_FILES["img3"]["size"] < 5242880)
				){
			$etc = explode("/",$_FILES['img3']['type'])[1]; 
			$filename = time(). '_3' . '.' .$etc; 
			$img3_loc = $dir.$filename;
			move_uploaded_file($_FILES['img3']['tmp_name'], $dir.$filename);
			
			if(($_FILES["img3"]["type"] == "image/jpeg") || ($_FILES["img3"]["type"] == "image/jpg")){
				list($width, $height) = getimagesize($img3_loc);
				$image_p = imagecreatetruecolor(300, 220);
				$image = imagecreatefromjpeg($img3_loc);
				imagecopyresampled($image_p, $image, 0, 0, 0, 0, 300, 220, $width, $height);
				imagejpeg($image_p, $img3_loc, 100);
			}
			
			$post->setImage3($img3_loc);
			}else
			{
			$err_text .= " <font color='red'>*</font>Check size or format of Photo 3 <br>";
			}
		}
		if(!empty($_FILES['img4']['size']))
		{
			if((($_FILES["img4"]["type"] == "image/gif")
				|| ($_FILES["img4"]["type"] == "image/jpeg")
				|| ($_FILES["img4"]["type"] == "image/png")
				|| ($_FILES["img4"]["type"] == "image/jpg"))
				&& ($_FILES["img4"]["size"] < 5242880)
				){
			$etc = explode("/",$_FILES['img4']['type'])[1]; 
			$filename = time() . '_4' . '.' .$etc; 
			$img4_loc = $dir.$filename;
			move_uploaded_file($_FILES['img4']['tmp_name'], $dir.$filename);
			if(($_FILES["img4"]["type"] == "image/jpeg") || ($_FILES["img4"]["type"] == "image/jpg")){
				list($width, $height) = getimagesize($img4_loc);
				$image_p = imagecreatetruecolor(300, 220);
				$image = imagecreatefromjpeg($img4_loc);
				imagecopyresampled($image_p, $image, 0, 0, 0, 0, 300, 220, $width, $height);
				imagejpeg($image_p, $img4_loc, 100);
			}
			$post->setImage4($img4_loc);
			}else
			{
			$err_text .= " <font color='red'>*</font>Check size or format of Photo 4 <br>";
			}
		}
	}
}
?>
	



<?php
 if ($err_count == 0) {

	?>
	<h2>Preview</h2>
	<?php 
	$uid = md5(microtime().rand());
	$post->setUid($uid);
	$arr_post = (array) $post;
	?>
	<br>
	<div id="sliderFrame" style="display:inline-block; vertical-align: top;">
        <div id="slider">
        	<?php 
        	$image_count = 0;
        	if(strlen($img1_loc) > 5)
        	{
        	?>
        	<img src='<?php echo $img1_loc; ?>' alt="" />
        	
        	<?php
        	$image_count++;
        	}
        	if(strlen($img2_loc) > 5)
        	{
        	?>
        	<img src='<?php echo $img2_loc; ?>' alt="" height="300" width="220"/>
        	
        	<?php
        	$image_count++;
        	}
        	if(strlen($img3_loc) > 5)
        	{
        	?>
        	<img src='<?php echo $img3_loc; ?>' alt="" height="300" width="220"/>
        	
        	<?php
        	$image_count++;
        	}
        	if(strlen($img4_loc) > 5)
        	{
        	?>
        	<img src='<?php echo $img4_loc; ?>' alt="" height="300" width="220"/>
        	
        	<?php
        	$image_count++;
        	}
        	if($image_count == 0)
        	{
        	?>
        	<img src='images/noImageAvailable.jpg' alt="" height="300" width="220"/>
        	
        	<?php
        	
        	}
        	?>
        </div>
        <br>
    </div>
	<div style="display: inline-block; vertical-align: top; margin-left: 10px;">
		<h3><?php echo $_POST['Title']; ?></h3>
		Price: <?php echo $_POST['Price']; ?><br>
		Description: <br><textarea rows="10" cols="70" name="usrtxt" wrap="hard" readonly><?php echo $_POST['Desc']; ?></textarea><br>
		Email for contact:<font color=blue> <?php echo $_POST['email']; ?></font><br>
		<button type="button" id="publish_btn" >Publish</button>
		<button type="button" id="cancel_btn" onclick="self.location='index.php';">Cancel</button>
	</div>
	
	<script src="jquery-1.10.2.js"></script>
	<script>
            $("#publish_btn").click(function(){ // Click handler 
                //var post_array =  <?php echo json_encode($arr_post); ?>;// Get post value
                $.ajax({
                    url: 'post_publisher.php', // Page to handle the request
                    type: 'POST',
                    data: <?php echo json_encode($arr_post); ?>, // Parameters to send
                    success: function(result) { // Function executed when the request is completed
                        self.location="ind_posts.php?post="+'<?php echo $uid; ?>';
                    }
                });
            });
    </script>
	
	
	<?php
} else {

	//return the filled out form to the user and ask them to try again
	echo $err_text;

	?> 
	<form action='receivedpost.php' method='post' enctype="multipart/form-data">
	<table>


	<tr>
	<td>Sub Category:</td>
	<td><select name="subcat">
	<option value="empty"></option>
	<?php
	include 'global_arrays.php';
	$r = get_subcategories($_POST['Cat']);
	foreach($r as $re)
	{
	if(strlen($re['SubCategoryName']) > 0){ //filling sub categories
	$str_cat= "<option value='" . $re['SubCategory_ID']."'";
		if($re['SubCategory_ID'] == $_POST['subcat'])
		{
			$str_cat .= ' selected' ; //when filling option menu setting already setted value if it was valid 
		}
	$str_cat .= ">" .$re['SubCategoryName']. "</option>";
	echo $str_cat;
	}
	}?>

	</select></td>
	</tr>

	<tr>
	<td>
	Location: </td> <td><select name="Loc">
	<option value="empty"></option>
	<?php
	$r = get_locations($_POST['Reg']);
	foreach($r as $re)
	{
	if(strlen($re['LocationName']) > 0){ // filling locations
	$str_l= "<option value='" . $re['Location_ID']."'";
		if($re['Location_ID'] == $_POST['Loc'])
		{
			$str_l .= ' selected' ; //when filling option menu setting already setted value if it was valid 
		}
	$str_l .= ">" .$re['LocationName']. "</option>";
	echo $str_l;
	}
	}?>
	</select></td>
	</tr>
	<tr>
	<td>Title: </td><td><input type='text' name='Title'
	<?php
	if($err_title == 0)
	{
	echo "value='". $_POST['Title'] . "'";
	} ?>></td>
	</tr>

	<tr><td>Price:</td><td> <input type="text" name="Price" 
	<?php
	if($err_price == 0)
	{
	echo "value='". $_POST['Price'] . "'";
	} ?>></td>
	</tr>
	<tr><td>Description:</td><td><textarea name="Desc" rows="10" cols="30">
	<?php
	if($err_desc == 0)
	{
	echo htmlspecialchars($_POST['Desc']);
	} ?>
	</textarea></td></tr>
	<tr><td>Email: </td><td><input type="text" name="email" 
	<?php
	if($err_mail == 0)
	{
	echo "value='". $_POST['email'] . "'";
	} ?>
	></td></tr>
	<tr><td>Confirm Email:</td><td> <input type="text" name="emailc" 
	<?php
	if($err_mail == 0)
	{
	echo 'value="'. $_POST['email'] . '"';
	} ?>></td></tr>
	<tr><td>I agree with terms and conditions: </td><td><input type="checkbox" name="agree" value="agree"></td></tr> <br>
	<tr><td>Optional Fields:</td></tr> <br>
	<tr><td>Photo 1(max 5 mb):</td><td> <input type="file" name="img1" accept="image/*"> </td></tr>
	<tr><td>Photo 2(max 5 mb):</td><td> <input type="file" name="img2" accept="image/*"> </td></tr>
	<tr><td>Photo 3(max 5 mb):</td><td> <input type="file" name="img3" accept="image/*"> </td></tr>
	<tr><td>Photo 4(max 5 mb):</td><td> <input type="file" name="img4" accept="image/*"> </td></tr>
	<tr><td><button type="submit" value="Submit">Submit</button>
 	 <button type="reset" value="Reset">Reset</td></button></tr>
	<?php echo "<input type='hidden' name='Reg' value='".$_POST['Reg']."'>";?>
	<?php echo "<input type='hidden' name='Cat' value='".$_POST['Cat']."'>";?>


	</table>
	</form>
	<?php
	}
	?>
            
           

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