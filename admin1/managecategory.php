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
		<?php
		if(isset($_GET['msg'])) {
		?>
		<p class="msg"><?php echo $_GET['msg'];?></p>
		<?php } ?>
		<p><a href="addnewcategory.php">Add New Category </a></p>
		<p><a href="addnewsubcategory.php">Add New Sub Category</a></p>
		<table width="100%" cellpadding="4"  cellspacing="4">
			<tr>
				<th>Category Name</th>
				<th>Status</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			<?php
			while($datapages = mysql_fetch_assoc($result)) {
			?>
			<tr>
				<td><?php echo $datapages['cat_name'];?></td>
				<td>
					<?php if($datapages['status']==1) {?>
						<a href="updatestatus.php?pid=<?php echo $datapages['cat_id'];?>&status=0&page=parentcat">Active</a>
					<?php } else { ?>
						<a href="updatestatus.php?pid=<?php echo $datapages['cat_id'];?>&status=1&page=parentcat">In Active</a>
					<?php }//end of else ?>
				</td>
				<td><a href="editcategory.php?pid=<?php echo $datapages['cat_id'];?>">Edit</a></td>
				<td><a href="deleteparentpage.php?pid=<?php echo $datapages['cat_id'];?>&p=3">Delete</a></td>
			</tr>
			<?php 
			$pid =  $datapages['cat_id'];	
			$sqlc = "select * from subcategory where cat_id='$pid'";
			$resultc = executequery($sqlc);
			$rowsc = mysql_num_rows($resultc);
			if($rowsc > 0) {
				while($datapagesc = mysql_fetch_assoc($resultc)) :
			
			?>
			<tr class="childpage">
				<td style="padding:0 0 0 20px;"><?php echo $datapagesc['subcat_name'];?></td>
				<td>
					<?php if($datapagesc['status']==1) {?>
						<a href="updatestatus.php?pid=<?php echo $datapagesc['subcat_id'];?>&status=0&page=subcat">Active</a>
					<?php } else { ?>
						<a href="updatestatus.php?pid=<?php echo $datapagesc['subcat_id'];?>&status=1&page=subcat">In Active</a>
					<?php }//end of else ?>
				</td>
				<td><a href="editsubcategory.php?pid=<?php echo $datapagesc['subcat_id'];?>">Edit</a></td>
				<td><a href="deleteparentpage.php?pid=<?php echo $datapagesc['subcat_id'];?>&p=4">Delete</a></td>
			</tr>
			<?php
				endwhile;
			}//end of if for child page listing
		
			}//end of while 
			?>
		</table>
		
	</div>
	<div class="clear"></div>
</div>
</body>
</html>