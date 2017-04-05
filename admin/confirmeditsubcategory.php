<?php
include('dbconnect.php');
if(isset($_POST['submit'])) {
	$pid = $_POST['id'];
	$subcatname = $_POST['subcatname'];
	$subcatdesc = $_POST['subcatdesc'];
	if(!empty($_FILES['pict']['name'])) {
	$imgname = $_FILES['pict']['name'];
	$rand = rand();
	$imgname = $rand."_".$imgname;
	$tmppath = $_FILES['pict']['tmp_name'];
	$perpath = "../userfiles/catimages/".$imgname;
	move_uploaded_file($tmppath,$perpath);
	$sql = "update subcategory set subcat_name='$subcatname', subcat_desc='$subcatdesc',subcat_image='$imgname' where subcat_id='$pid'";
	}else {
	$sql = "update subcategory set subcat_name='$subcatname', subcat_desc='$subcatdesc' where subcat_id='$pid'";	
	}//end of else
	$result = executequery($sql);
	header("location:managecategory.php?msg=subcategory updated");
}else {
		header("location:managecategory.php?msg=update error");
}//end of main else
?>

