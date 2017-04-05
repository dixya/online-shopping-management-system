<link rel="stylesheet" type="text/css" href="style.css" />
<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password']) ) {
	header("location:login.php");
}
include("../admin/dbconnect.php");
?>
<div class="wrapper">
	<?php include("sidebaruser.php");?>
	<div class="content">
	<form name="frmpage" method="post" action="#" enctype="multipart/form-data">
		<table width="100%" cellpadding="4" cellspacing="4">
		<tr>
			<td>Brand name</td>
			<td><input type="text" name="brandname" /></td>
		</tr>
		<tr>
			<td>Category</td>
			<?php 
			$sqla="select cat_name from category";
			$resa=executequery($sqla);?>

			<td><select name="cat" >
			<?php while($row=mysql_fetch_assoc($resa)){?>
			<option><?php echo $row['cat_name'];?></option>
			<?php }?></td>
		</tr>
		<tr>
			<td>Brand Image
			<td><input type="file" name="image"></td>
			</tr>
			<tr>
			<td colspan=2><input type="submit" name="submit" value="Add Brand">
			</table>
			</form>
			</div>
			</div>

		<?php
		if(isset($_POST['submit'])){
			$brand=$_POST['brandname'];
			$cat=$_POST['cat'];
			if(isset($_FILES['image']['name'])) {
	$imgname = $_FILES['image']['name'];
	$rand = rand();
	$imgname = $rand."_".$imgname;
	$tmppath = $_FILES['image']['tmp_name'];
	$perpath = "../customer/userfiles/brandimage/".$imgname;
	move_uploaded_file($tmppath,$perpath);
		}
	
	$sql="insert into brand (brand_name,brand_image,category) values('$brand','$imgname','$cat')";
	$res=executequery($sql);
	if($res){
		echo "brand added successfully";
	}
	else{
		echo "error";
	}
}
		?>	
	
