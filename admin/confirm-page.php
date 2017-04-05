<?php
include("dbconnect.php");
if(isset($_POST['submit'])) {
	$pagetitle = $_POST['pagetitle'];
	$pagedesc = $_POST['pagedesc'];
	$pageslug = $_POST['pageslug'];
	if(isset($_FILES['pict']['name'])) {
	$imgname = $_FILES['pict']['name'];
	$rand = rand();
	$imgname = $rand."_".$imgname;
	$tmppath = $_FILES['pict']['tmp_name'];
	$perpath = "../userfiles/".$imgname;
	move_uploaded_file($tmppath,$perpath);
	$sql = "insert into pages (page_id,page_title,page_slug,page_desc,page_image) values (null,'$pagetitle','$pageslug','$pagedesc','$imgname')";
	}else {
	$sql = "insert into pages (page_id,page_title,page_slug,page_desc) values (null,'$pagetitle','$pageslug','$pagedesc')";	
	}//end of else
	$result = executequery($sql);
	header("location:managepages.php?msg=page successfully added");
}else {
	header("location:login.php");
}//end of main else
?>