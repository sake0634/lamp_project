<?php
class Post{ //This file is POst Class. Which initializes fields and methods available for POSTS. Used in receivedposts.php

public $Title;
public $Price;
public $Desc;
public $Email;
public $Agree;
public $time;
public $Image1;
public $Image2;
public $Image3;
public $Image4;
public $SubCat;
public $Loc;
public $Uid;
	
	function setTitle($title)
	{
	 $this->Title = $title;
	}
	function setPrice($price)
	{
	 $this->Price = $price;
	}
	function setDesc($desc)
	{
	 $this->Desc = $desc;
	}
	function setEmail($email)
	{
	 $this->Email= $email;
	}
	function setAgree($agree)
	{
	 $this->Agree = $agree;
	}
	function setTime()
	{
	 $this->time = date('Y-m-d', strtotime(str_replace('-', '/', $date)));
	}
	
	function setImage1($img1)
	{
	 $this->Image1 = $img1;
	}
	function setImage2($img2)
	{
	 $this->Image2 = $img2;
	}
	function setImage3($img3)
	{
	 $this->Image3 = $img3;
	}
	function setImage4($img4)
	{
	 $this->Image4 = $img4;
	}
	function setSubCat($subcat)
	{
	 $this->SubCat = $subcat;
	}
	function setLoc($loc)
	{
	 $this->Loc = $loc;
	}
	function setUid($uid)
	{
	 $this->Uid = $uid;
	}
	

	}
?>