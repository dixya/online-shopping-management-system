<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
	header("location:login.php");
}

include("dbconnect.php");
if(isset($_POST['submit'])) {
	$pid = $_POST['id'];
	$pagetitle = $_POST['pagetitle'];
	$pagedesc = $_POST['pagedesc'];
	$pageslug = $_POST['pageslug'];
	if(!empty($_FILES['pict']['name'])) {
	$imgname = $_FILES['pict']['name'];
	$rand = rand();
	$imgname = $rand."_".$imgname;
	$tmppath = $_FILES['pict']['tmp_name'];
	$perpath = "../customer/userfiles/".$imgname;
	move_uploaded_file($tmppath,$perpath);
	$sql = "update pages set page_title='$pagetitle',page_slug='$pageslug', page_desc='$pagedesc',page_image='$imgname' where page_id='$pid'";
	}else {
	$sql = "update pages set page_title='$pagetitle',page_slug='$pageslug', page_desc='$pagedesc' where page_id='$pid'";	
	}//end of else
	$result = executequery($sql);
	header("location:managepages.php?msg=page updated");
}else {
	header("location:managepages.php?msg=update error");
}//end of main else
?>