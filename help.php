
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
				There are admin and normal users already registered to system.<br>
				Username/Password for normal user saim/asdasd <br>
				Username/Password for admin user admin/admin <br>
				If you login as admin you can add followings from home page <br>
			<ul>
			<li>Category</li>
			<li>Sub Category</li>
			<li>Location</li>
			<li>Region</li>
			</ul>
			<br>
			There is a search bar in the index.php. You can easily search posts by keyword through all possible criteria.
			For example: by typing "Full-Time" you can get posts in Full-Time subcategory. Or by typing 'Job' you can get all the posts under Job category.
			Same for Locations and Regions. You do not even need to click on Search button.
			<br><br>
			When you add image to your posts, if image type is Jpeg or jpg, system automatically resize it to fit in image slider. However other image types
			will not be resized. So make sure your image is not too big in matter of pixels, your post may not look good.
  		 	 <br><br>	
  		 	 <br><br>
  		 	 <br>
  		 	 <br>
  		 	 
  		 	 Important Notice: Website Menu Bar Design Template belongs to BryantSmith.com 
    	
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