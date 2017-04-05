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
	<form name="frmpage" method="post" enctype="multipart/form-data" action="confirmeditcategory.php" >
    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 

		<table width="100%" cellpadding="4" cellspacing="4" border="1" id="box-table-a">
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
</div>




</body>
</html>
