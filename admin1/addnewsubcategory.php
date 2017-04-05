<?php
session_start();
if(!isset($_SESSION['admin_username']) && !isset($_SESSION['password'])) {
	header("location:login.php");
}
include("dbconnect.php");
$sql = "select * from category";
$result = executequery($sql);
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
			<td>Select Category</td>
			<td>
				<select name="parent">
					<option>select category</option>
					<?php while($data = mysql_fetch_assoc($result)) { ?>
						<option value="<?php echo $data['cat_id'];?>"><?php echo $data['cat_name'];?> </option>
					<?php }//end of while ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Category Name</td>
			<td><input type="text" name="subcatname" /></td>
		</tr>
		<tr>
			<td>Category Description</td>
			<td>
			<textarea name="subcatdesc" rows="6" cols="30"></textarea>
			</td>
		</tr>
		<tr>
			<td>Image</td>
			<td><input type="file" name="pict" /></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="submit" value="ADD SUBCATEGORY" /></td>
		</tr>
		</table>
	</form>
	</div>
	<div class="clear"></div>
</div>
<?php
if(isset($_POST['submit'])) {
	$subcatname = $_POST['subcatname'];
	$subcatdesc = $_POST['subcatdesc'];
	$parent = $_POST['parent'];
	if(isset($_FILES['pict']['name'])) {
	$imgname = $_FILES['pict']['name'];
	$rand = rand();
	$imgname = $rand."_".$imgname;
	$tmppath = $_FILES['pict']['tmp_name'];
	$perpath = "../customer/userfiles/catimages/".$imgname;
	move_uploaded_file($tmppath,$perpath);
	$sql = "insert into subcategory (subcat_id,subcat_name,subcat_desc,subcat_image, cat_id) values (null,'$subcatname','$subcatdesc','$imgname','$parent')";
	}else {
	$sql = "insert into subcategory (subcat_id,subcat_name,subcat_desc,cat_id) values (null,'$subcatname','$subcatdesc','$parent')";
	}//end of else
	$result = executequery($sql);
	header("location:managecategory.php?msg=subcategory successfully added");
}else {
	die();
	header("location:login.php");
}//end of main else
?>
</body>
</html>