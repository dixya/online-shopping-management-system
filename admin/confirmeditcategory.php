<?php
include('dbconnect.php');
if(isset($_POST['submit'])) {
	$pid = $_POST['id'];
	$catname = $_POST['catname'];
	$catdesc = $_POST['catdesc'];
	if(!empty($_FILES['pict']['name'])) {
	$imgname = $_FILES['pict']['name'];
	$rand = rand();
	$imgname = $rand."_".$imgname;
	$tmppath = $_FILES['pict']['tmp_name'];
	$perpath = "../userfiles/catimages/".$imgname;
	move_uploaded_file($tmppath,$perpath);
	$sql = "update category set cat_name='$catname', cat_desc='$catdesc',cat_image='$imgname' where cat_id='$pid'";
	}else {
	$sql = "update category set cat_name='$catname', cat_desc='$catdesc' where cat_id='$pid'";	
	}//end of else
	$result = executequery($sql);
	header("location:managecategory.php?msg=category updated");
}else {
	
	header("location:managecategory.php?msg=update error");
}//end of main else
?>