<?php
session_start();
if(!isset($_SESSION['admin_username']) && !isset($_SESSION['password'])) {
	header("location:login.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Administration Panel ::</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div class="wrapper">
	<?php include("sidebar.php");?>
	<div class="content1">
	<form name="frmpage" method="post" action="#" enctype="multipart/form-data">
		<table width="100%" cellpadding="4" cellspacing="4">
		<tr>
			<td>Page Title</td>
			<td><input type="text" name="catname" /></td>
		</tr>
		<tr>
			<td>Page Description</td>
			<td>

			<!--<textarea name="pagedesc" rows="6" cols="30"></textarea>-->
			<?php
			$basepath = "fckeditor/"; 
			include($basepath."fckeditor.php") ;        
			$oFCKeditor = new FCKeditor('catdesc') ;
			$oFCKeditor->BasePath	= $basepath; //$sBasePath ; 
			$oFCKeditor->Value	= '';
			$oFCKeditor->Height 	= 400; 
			$oFCKeditor->Width 	= 500; 
			$oFCKeditor->Create() ;
			?>
			</td>
		</tr>
		<tr>
			<td>Image</td>
			<td><input type="file" name="pict[]"  multiple/></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="submit" value="ADD CATEGORY" /></td>
		</tr>
		</table>
	</form>
	</div>
	<div class="clear"></div>
</div>
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
	header("location:managecategory.php?msg=category successfully added");
}else {
	die();
	header("location:login.php");
}//end of main else
?>
</body>
</html>