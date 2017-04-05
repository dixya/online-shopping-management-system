<?php
session_start();
if(!isset($_SESSION['admin_username']) && !isset($_SESSION['password'])) {
	header("location:login.php");
}
$id = $_GET['pid'];
include("dbconnect.php");
$sql = "select * from category where cat_id='$id'";
$res=executequery($sql);
$data = mysql_fetch_assoc($res);
//print_r($data);
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
			<td><input type="text" name="catname"  value="<?php echo $data['cat_name'];?>"/></td>
		</tr>
		<tr>
			<td>Page Description</td>
			<td>
			<!--<textarea name="pagedesc" rows="6" cols="30"><?php //echo $data['pagedesc'];?></textarea>-->
			
			<?php
			$pagedesc = $data['cat_desc'];
			$basepath = "fckeditor/"; 
			include($basepath."fckeditor.php") ;
			$oFCKeditor = new FCKeditor('catdesc') ;
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
			<?php if(!empty($data['cat_image'])) {?>
			<img src="../customer/userfiles/catimages/<?php echo $data['cat_image'];?>" width="100" height="75" />
			<a href="deleteimage.php?catid=<?php echo $id;?>&p=3">delete</a>
			<?php }else { ?>
			<input type="file" name="pict" />
			<?php } ?>
			</td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="submit" value="UPDATE CATEGORY" /></td>
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
	$catname = $_POST['catname'];
	$catdesc = $_POST['catdesc'];
	if(!empty($_FILES['pict']['name'])) {
	$imgname = $_FILES['pict']['name'];
	$rand = rand();
	$imgname = $rand."_".$imgname;
	$tmppath = $_FILES['pict']['tmp_name'];
	$perpath = "../customer/userfiles/catimages/".$imgname;
	move_uploaded_file($tmppath,$perpath);
	$sql = "update category set cat_name='$catname', cat_desc='$catdesc',cat_image='$imgname' where cat_id='$pid'";
	}else {
	$sql = "update category set cat_name='$catname', cat_desc='$catdesc' where cat_id='$pid'";	
	}//end of else
	$result = executequery($sql);
	header("location:managecategory.php?msg=category updated");
}else {
	die();
	header("location:managecategory.php?msg=update error");
}//end of main else
?>



</body>
</html>
