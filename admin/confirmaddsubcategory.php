<?php
include('dbconnect.php');
if(isset($_POST['submit'])) {
	$subcatname = $_POST['subcatname'];
	$subcatdesc = $_POST['subcatdesc'];
	$parent = $_POST['parent'];
	if(isset($_FILES['pict']['name'])) {
	$imgname = $_FILES['pict']['name'];
	$rand = rand();
	$imgname = $rand."_".$imgname;
	$tmppath = $_FILES['pict']['tmp_name'];
	$perpath = "../userfiles/catimages/".$imgname;
	move_uploaded_file($tmppath,$perpath);
	$sql = "insert into subcategory (subcat_id,subcat_name,subcat_desc,subcat_image, cat_id) values (null,'$subcatname','$subcatdesc','$imgname','$parent')";
	}else {
	$sql = "insert into subcategory (subcat_id,subcat_name,subcat_desc,cat_id) values (null,'$subcatname','$subcatdesc','$parent')";
	}//end of else
	$result = executequery($sql);
	header("location:managecategory.php?msg=subcategory successfully added");
}else {
		header("location:login.php");
}//end of main else
?>