<?php
session_start();
if(!isset($_SESSION['admin_username']) && !isset($_SESSION['password'])) {
	header("location:login.php");
}
$id = $_GET['pid'];
include("dbconnect.php");
$sql = "select * from pages where page_id='$id'";
$res=executequery($sql);
$data = mysql_fetch_assoc($res);
?>
<html>
<head>
<title>Page edit</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body><div class="wrapper">
	<?php include("sidebar.php");?>
	<div class="content1">
	<form name="frmpage" method="post" enctype="multipart/form-data" action="#" >
    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 

		<table width="100%" cellpadding="4" cellspacing="4">
		<tr>
			<td>Page Title</td>
			<td><input type="text" name="pagetitle"  value="<?php echo $data['page_title'];?>"/></td>
		</tr>
		<tr>
			<td>Page Slug</td>
			<td><input type="text" name="pageslug"  value="<?php echo $data['page_slug'];?>"/></td>
		</tr>
		<tr>
			<td>Page Description</td>
			<td>
			<!--<textarea name="pagedesc" rows="6" cols="30"><?php //echo $data['pagedesc'];?></textarea>-->
			
			<?php
			$pagedesc = $data['page_desc'];
			$basepath = "fckeditor/"; 
			include($basepath."fckeditor.php") ;
			$oFCKeditor = new FCKeditor('pagedesc') ;
			$oFCKeditor->BasePath	= $basepath; //$sBasePath ; 
			$oFCKeditor->Value	= $pagedesc;
			$oFCKeditor->Height 	= 400; 
			$oFCKeditor->Width 	= 500; 
			$oFCKeditor->Create() ;
			?>
			</td>
		</tr>
		<tr>
			<td>Image</td>
			<td>
			<?php if(!empty($data['page_image'])) {?>
			<img src="../userfiles/<?php echo $data['page_image'];?>" width="100" height="75" />
			<a href="deleteimage.php?pid=<?php echo $id; ?>&p=1">delete</a>
			<?php }else { ?>
			<input type="file" name="pict" />
			<?php } ?>
			</td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="submit" value="UPDATE PAGE" /></td>
            <td><input type="reset" name="reset" value="clear"></td>
		</tr>
		</table>
	</form>
	</div>
	<div class="clear"></div>
</div>
<?php
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
	$perpath = "../userfiles/".$imgname;
	move_uploaded_file($tmppath,$perpath);
	$sql = "update pages set page_title='$pagetitle',page_slug='$pageslug', page_desc='$pagedesc',page_image='$imgname' where page_id='$pid'";
	}else {
	$sql = "update pages set page_title='$pagetitle',page_slug='$pageslug', page_desc='$pagedesc' where page_id='$pid'";	
	}//end of else
	$result = executequery($sql);
	header("location:managepages.php?msg=page updated");
}else {
	die();
	header("location:managepages.php?msg=update error");
}//end of main else
?>
</body>
</html>
