<?php
include("dbconnect.php");
if(isset($_POST['submit'])) {
	$parent = $_POST['parent'];
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
	$sql = "insert into childpages (cpage_id,cpage_title,cpage_slug,cpage_desc,cpage_image,page_id) values (null,'$pagetitle','$pageslug',$pagedesc','$imgname','$parent')";
	}else {
	$sql = "insert into childpages (cpage_id,cpage_title,cpage_slug,cpage_desc,page_id) values (null,'$pagetitle','$pageslug',$pagedesc','$parent')";	
	}//end of else
	$result = executequery($sql);
	header("location:managepages.php?msg=childpage successfully added");
}else {
	header("location:login.php");
}//end of main else
?>