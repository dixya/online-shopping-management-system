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
	<div class="content">
	<form name="frmpage" method="post" action="#" enctype="multipart/form-data">
		<table width="100%" cellpadding="4" cellspacing="4">
		<tr>
			<td>Page Title</td>
			<td><input type="text" name="pagetitle" /></td>
		</tr>
		<tr>
			<td>Page slug</td>
			<td><input type="text" name="pageslug" /></td>
		</tr>
		<tr>
			<td>Page Description</td>
			<td>

			<!--<textarea name="pagedesc" rows="6" cols="30"></textarea>-->
			<?php
			$basepath = "fckeditor/"; 
			include($basepath."fckeditor.php") ;        
			$oFCKeditor = new FCKeditor('pagedesc') ;
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
			<td><input type="file" name="pict" /></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="submit" value="ADD PAGE" /></td>
		</tr>
		</table>
	</form>
	</div>
	<div class="clear"></div>
</div>

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
	$perpath = "../customer/userfiles/".$imgname;
	move_uploaded_file($tmppath,$perpath);
	$sql = "insert into pages (page_id,page_title,page_slug,page_desc,page_image) values (null,'$pagetitle','$pageslug','$pagedesc','$imgname')";
	}else {
	$sql = "insert into pages (page_id,page_title,page_slug,page_desc) values (null,'$pagetitle','$pageslug','$pagedesc')";	
	}//end of else
	$result = executequery($sql);
	header("location:managepages.php?msg=page successfully added");
}else {
	die();
	header("location:login.php");
}//end of main else
?>
</body>
</html>