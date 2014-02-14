<?php
session_start();
if(strlen($_SESSION['username']) == 0){
header("location:main_login.php");
}
?>

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
           	   	<?php
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
                <li><a href='cat_loc_spec.php'>Newpost</a></li>
                <li><a href=''>Help</a></li>
                <li><a href=''>About US</a></li>
            </ul>
        </div>
  
        <div id="main">

<h1> Login Failed <br><h1>
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