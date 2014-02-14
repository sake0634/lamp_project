<?php
$id = $_GET['post'];  // This file is for showing individual posts in their own page. Every posts page can be reached by changing post value from URL
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
        <?php
        include 'global_arrays.php';
        $r = get_post($id);
        
        
        
        ?>
        <div id="sliderFrame" style="display:inline-block; vertical-align: top;">
        <div id="slider">
        	<?php  //FIlling slider with images
        	$image_count = 0;
        	if(strlen($r[0]['Image_1']) > 5)
        	{
        	?>
        	<img src='<?php echo htmlspecialchars($r[0]['Image_1']); ?>' alt="" />
        	
        	<?php
        	$image_count++;
        	}
        	if(strlen($r[0]['Image_2']) > 5)
        	{
        	?>
        	<img src='<?php echo $r[0]['Image_2']; ?>' alt="" height="300" width="220"/>
        	
        	<?php
        	$image_count++;
        	}
        	if(strlen($r[0]['Image_3']) > 5)
        	{
        	?>
        	<img src='<?php echo $r[0]['Image_3']; ?>' alt="" height="300" width="220"/>
        	
        	<?php
        	$image_count++;
        	}
        	if(strlen($r[0]['Image_4']) > 5)
        	{
        	?>
        	<img src='<?php echo $r[0]['Image_4']; ?>' alt="" height="300" width="220"/>
        	
        	<?php
        	$image_count++;
        	}
        	if($image_count == 0) // If no image exists, show no image available image
        	{
        	?>
        	<img src='images/noImageAvailable.jpg' alt="" height="300" width="220"/>
        	
        	<?php
        	
        	}
        	?>
        </div>
        </div> <!-- this part is responsilbe for showing posts Title Description Price and Email adress for Contact-->
        <div style="display: inline-block; vertical-align: top; margin-left: 10px;"">
        <?php echo "<h3>" . $r[0]['Title']. "</h3>"; ?>
        Price: <?php echo $r[0]['Price']; ?><br>
        <div>Description:<br> <textarea rows="10" cols="70" name="usrtxt" wrap="hard" readonly><?php  echo $r[0]['Description'];?> </textarea></div>
        Contact E-mail: <?php echo "<font color='blue'>" . $r[0]['Email']. "</font>"; ?> <br>
        </div>
    </div>
    <br><br>
        
        
        <div id="footer">
        <p>
        All rights reserved.
        </p>
        </div>
        
        </div>
</body>



</body>

</html>