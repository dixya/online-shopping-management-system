<?php
session_start();
if(!isset($_SESSION['admin_username']) && !isset($_SESSION['password'])) {
	header("location:login.php");
}
$id = $_GET['pid'];
include("dbconnect.php");
$sql = "select * from subcategory where subcat_id='$id'";
$res=executequery($sql);
$data = mysql_fetch_assoc($res);
//print_r($data);
?>
<html>
<head>
<title>Subcategory edit</title>

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
	<form name="frmpage" method="post" enctype="multipart/form-data" action="#" >
    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 

		<table width="100%" cellpadding="4" cellspacing="4" border="1" id="box-table-a">
		<tr>
			<td>Subcategory Title</td>
			<td><input type="text" name="subcatname"  value="<?php echo $data['subcat_name'];?>"/></td>
		</tr>
		<tr>
			<td>Subcategory Description</td>
			<td>
			<!--<textarea name="pagedesc" rows="6" cols="30"><?php //echo $data['pagedesc'];?></textarea>-->
			
			<?php
			$pagedesc = $data['subcat_desc'];
			$basepath = "fckeditor/"; 
			include($basepath."fckeditor.php") ;
			$oFCKeditor = new FCKeditor('subcatdesc') ;
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
			<?php if(!empty($data['subcat_image'])) {?>
			<img src="../userfiles/catimages/<?php echo $data['subcat_image'];?>" width="100" height="75" />
			<a href="deleteimage.php?scatid=<?php echo $id;?>&p=4">delete</a>
			<?php }else { ?>
			<input type="file" name="pict"/>
			<?php } ?>
			</td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="submit" value="UPDATE SUBCATEGORY" /></td>
            <td><input type="reset" name="reset" value="clear"></td>
		</tr>
		</table>
	</form>
	</div>
	<div class="clear"></div>
</div>
</div>
<?php
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
	die();
	header("location:managecategory.php?msg=update error");
}//end of main else
?>



</body>
</html>
