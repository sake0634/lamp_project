<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="design/style.css" />
<link href="jsImgSlider/themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />
<script src="jsImgSlider/themes/1/js-image-slider.js" type="text/javascript"></script>
<title>Mini Craiglist</title>
</head>
<!-- This File has Form to get new region, Admin user can use this form-->
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

Add Region

<form action='add_region.php' method='post'>
<input type="text" name="region">
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
