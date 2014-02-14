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
			if(!isset($_SESSION['username'])){  // you will see it in every menubar. This block checks whether there is a current session. 
			?>
				<li><a href='main_login.php'>Login</a></li> 
            <?php
            }// if no, shows login bar
            else
            {
            	
            ?>
            	<li><a href='logout.php'>Logout</a></li> 
			<?php
			}// if yes , shows logout bar
            ?>
                
                <li><a href='help.php'>Help</a></li>
            </ul>
        </div>
  
        <div id="main">
        
        	<div> 
              <?php 
                if(isset($_SESSION['username']))
                {
                if($_SESSION['username'] == 'admin')  //If it is the admin session, we show admin privilages here.
                {
                ?>
                Admin Options: <br>
                <li><a href='add_cat_form.php'>Add Category</a></li>
                <li><a href='add_sub_cat_form.php'>Add SubCategory</a></li>
                 <li><a href='add_region_form.php'>Add Region</a></li>
                <li><a href='add_location_form.php'>Add Location</a></li>
                <?php } } ?>
        	</div>
            
		<script src="jquery-1.10.2.js"></script> <!-- AJAX call for showing search results without refreshing page --!>
		<script type='text/javascript'> 
		$(document).ready(function(){ 
		$("#search_results").slideUp(); 
 		   $("#search_button").click(function(e){ 
   	   		  e.preventDefault(); 
   		     ajax_search(); 
  		  }); 
  	  $("#search_term").keyup(function(e){ 
  		      e.preventDefault(); 
  		      ajax_search(); 
 		   }); 

		});
	function ajax_search(){ 
 		 $("#search_results").show(); 
 			 var search_val=$("#search_term").val(); 
 				 $.post("./search.php", {search_term : search_val}, function(data){
 		  if (data.length>0){ 
  			   $("#search_results").html(data); 
  			 } 
 		 }) 
	} 
	</script>
		<div>
			<form id="searchform" method="post">  <!--// main page search form --!>
			<div> 
        		<label for="search_term">Search Posts</label> 
        		<input type="text" name="search_term" id="search_term" /> 
				<input type="submit" value="Search" id="search_button" /> 
			</div> 
   			</form> 
		
 			<div id="search_results">
 
 			</div> 
 		
 		</div>
 		
 	<div>
 		<h1><font color=blue>All Posts Available</font></h1> <!--//The part we show all current posts in the system --!>
 		<table align='left' border='1' style='display:block; float: none; margin: 0;'>
 		<tr>
		 <td>Title</td>
 		<td>Price</td>
		 <td>Description</td>
 		<td>Contact</td>
		 <td>Location</td>
		 <td>Sub Category</td>
 		</tr>
 		<?php 
 include 'global_arrays.php';
 $r = get_posts();
 foreach($r as $current)
 {
 $loc = get_location_name($current['Location_ID']); // getting location name
 $sc = get_subcat_name($current['SubCategory_ID']); // and sub category name to show names instead of IDs
 
 ?>
 		<tr>
		 <td><font size="2"><a href="ind_posts.php?post=<?php echo $current['Uid']; ?>"><?php echo $current['Title']; ?> </a></font> </td>
		 <td><font size="2"><?php echo $current['Price']; ?> </font></td>
 			<td><font size="1"><?php echo substr($current['Description'],0,170); ?></font> </td>
		 <td><font size="1"><?php echo $current['Email']; ?></font> </td>
		 <td> <font size="1"><?php echo $loc[0]['LocationName']; ?></font></td>
		 <td><font size="1"> <?php echo $sc[0]['SubCategoryName']; ?></font></td>
		 </tr>
		 <?php
 }
 ?>
 		</table>
	 </div>
	 		<br><br>

    </div>
    
        <br>
        
        
        
        <div id="footer">
        <p>
        All rights reserved.
        </p>
        </div>
        
</body>


</html>