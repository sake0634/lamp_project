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
	include 'global_arrays.php'; // This file is responsilbe for checking signup form
	$err_count = 0;
		if(isset($_POST))
		{
		$err_text = "<font color='red'>Please check following(s): </font> <br>";
		
		if(empty($_POST['myusername']))
		{
			$err_text .= " <font color='red'>*</font> Fill Username <br>";
			$err_count++;
		}
		
		if(isMemberExist($_POST['myusername']))
		{
			$err_text .= " <font color='red'>*</font> Username Exist <br>";
			$err_count++;
		}
		if(!preg_match("/^[a-zA-Z0-9]+$/", $_POST['myusername']))
		{
		$err_text .= " <font color='red'>*</font> Username can only contaion alphanumeric characters <br>";
		$err_count++;
		
		}
		
		if(!preg_match("/^[a-zA-Z0-9]+$/", $_POST['mypassword']))
		{
		$err_text .= " <font color='red'>*</font> Password should contaion only alphanumeric characters <br>";
		$err_count++;
		}
		
		if($_POST['mypassword'] != $_POST['mypasswordc'] )
		{
		$err_text .= " <font color='red'>*</font> Confirm password should be same <br>";
		$err_count++;
		}
		
		echo $err_text;
		
		} 
		
	if($err_count == 0)
	{
		if(addMember($_POST['myusername'],$_POST['mypassword']))
		{
		header("location:login_success.php");
		}
		
	}else{
	?>
    <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCff">
	<tr>
	<form name="form1" method="post" action="signup_check.php">
	<td>
	<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#000AAA">
	<tr>
	<td colspan="3"><strong>Signup </strong></td>	
	</tr>
	<tr>
	<td width="78">Username</td>
	<td width="6">:</td>
	<td width="294"><input name="myusername" type="text" id="myusername"></td>
	</tr>
	<tr>
	<td>Password</td>
	<td>:</td>
	<td><input name="mypassword" type="text" id="mypassword"></td>
	</tr>
	<tr>
	<td>Confirm Password</td>
	<td>:</td>
	<td><input name="mypasswordc" type="text" id="mypasswordc"></td>
	</tr>
	<tr>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td><input type="submit" name="Submit" value="Login"></td>
	</tr>
	</table>
	</td>
	</form>
	</tr>
	</table>
	<?php 
	}
	?>
    <br><br>
    <?php if(!empty($_SESSION["user_name"])){
    	echo $_SESSION["user_name"];
    }
    ?>
        
        
        <div id="footer">
        <p>
        All rights reserved.
        </p>
        </div>
        
        </div>
</body>



</body>

</html>