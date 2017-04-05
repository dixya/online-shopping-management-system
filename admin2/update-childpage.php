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
	if(!empty($_FILES['pict']['name'])) {
	$imgname = $_FILES['pict']['name'];
	$rand = rand();
	$imgname = $rand."_".$imgname;
	$tmppath = $_FILES['pict']['tmp_name'];
	$perpath = "../userfiles/".$imgname;
	move_uploaded_file($tmppath,$perpath);
	$sql = "update childpages set cpage_title='$pagetitle', cpage_desc='$pagedesc',cpage_image='$imgname' where cpage_id='$pid'";
	}else {
	$sql = "update childpages set cpage_title='$pagetitle',cpage_desc='$pagedesc' where cpage_id='$pid'";	
	}//end of else
	$result = executequery($sql);
	header("location:managepages.php?msg=childpage updated");
}else {
	header("location:managepages.php?msg=update error");
}//end of main else
?>