<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
	header("location:login.php");
}
include("dbconnect.php");
$sql = "select * from pages";
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
			<td>Select Parent</td>
			<td>
				<select name="parent">
					<option>select parent</option>
					<?php while($data = mysql_fetch_assoc($result)) { ?>
						<option value="<?php echo $data['page_id'];?>"><?php echo $data['page_title'];?> </option>
					<?php }//end of while ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Page Title</td>
			<td><input type="text" name="pagetitle"  value=""/></td>
		</tr>
		<tr>
			<td>Page Slug</td>
			<td><input type="text" name="pageslug"  value=""/></td>
		</tr>
		<tr>
			<td>Page Description</td>
			<td>
			<textarea name="pagedesc" rows="6" cols="30"></textarea>
			</td>
		</tr>
		<tr>
			<td>Image</td>
			<td><input type="file" name="pict" /></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="submit" value="ADD CHILDPAGE" /></td>
		</tr>
		</table>
	</form>
	</div>
	<div class="clear"></div>
</div>
<?php
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
	die();
	header("location:login.php");
}//end of main else
?>
</body>
</html>