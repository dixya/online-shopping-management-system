<?php
include("dbconnect.php");
if(isset($_POST['submit'])) {
	$catname = $_POST['catname'];
	$catdesc = $_POST['catdesc'];
	if(isset($_FILES['pict']['name'])) {
	$imgname = $_FILES['pict']['name'];
	$rand = rand();
	$imgname = $rand."_".$imgname;
	$tmppath = $_FILES['pict']['tmp_name'];
	$perpath = "../customer/userfiles/catimages/".$imgname;
	move_uploaded_file($tmppath,$perpath);
	$sql = "insert into category (cat_id,cat_name,cat_desc,cat_image) values (null,'$catname','$catdesc','$imgname')";
	}else {
	$sql = "insert into category (cat_id,cat_name,cat_desc) values (null,'$catname','$catdesc')";	
	}//end of else
	$result = executequery($sql);
	header("location:managecategory.php?msg= category page successfully added");
}else {
	header("location:login.php");
}//end of main else
?>