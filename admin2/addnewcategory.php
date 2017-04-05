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
<link rel="stylesheet" type="text/css" href="css/960.css" />
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/text.css" />
<link rel="stylesheet" type="text/css" href="css/blue.css" />
<link type="text/css" href="css/smoothness/ui.css" rel="stylesheet" />  
<link rel="stylesheet" href="css/febe/style.css" type="text/css" media="screen" charset="utf-8">
<!--<link rel="stylesheet" type="text/css" href="style.css" />-->
</head>

<body><div class="container_16" id="wrapper">	
	
		<div class="clear"></div>
	<div class="content">
	<div class="grid_8" id="logo"> WELCOME <?php echo $_SESSION['admin_username'];?></div>
    <div class="grid_8">
<!-- USER TOOLS START -->
      <div id="user_tools"><span><a href="logout.php">Logout</a></span></div>
    </div>
<!-- USER TOOLS END -->    
<div class="grid_16" id="header">
<!-- MENU START -->
<?php include('sidebar.php');?>
<!-- MENU END -->
	<div class="clear"></div>
</div>
	 <div class="grid_16" id="content">
    <!--  TITLE START  --> 
    <div class="grid_9">
    <h1 class="dashboard">Dashboard</h1>
    </div>
    <div class="clear">
    </div>
</div>
 <div class="clear"></div>
    <!--THIS IS A WIDE PORTLET-->
		<div class="portlet" >
	<form name="frmpage" method="post" action="#" enctype="multipart/form-data">
		<table width="100%" cellpadding="4" cellspacing="4" border="1"  id="box-table-a">
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
	$perpath = "../userfiles/catimages/".$imgname;
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