<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password']) ) {
	header("location:login.php");
}
include("../admin/dbconnect.php");

$username=$_SESSION['username'];
$sql1="select * from shopuser where username='$username'";
$rs=executequery($sql1);
$data=mysql_fetch_assoc($rs);
$shopno=$data['shopno'];
$sql = "select * from product where shopno='$shopno'";
$result = executequery($sql);
$rows=mysql_num_rows($result);
$pageno=$rows/5;
$id=$_GET['id'];
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
	<?php include("sidebaruser.php");?>
	<div class="content">
		<?php
		if(isset($_GET['msg'])) {
		?>
		<p class="msg"><?php echo $_GET['msg'];?></p>
		<?php } ?>
		<p><a href="addshopproduct.php">Add New Product</a></p>
		<table width="100%" cellpadding="4"  cellspacing="4">
			<tr>
            
				<th>Product Title</th>                
                				<th>Username</th>
                                <th>Shop No.</th>
				<th>Status</th>
				<th>Edit</th>
				<th>Delete</th>
                <th>Image  1</th>
                <th>Image  2</th>
                <th>Image  3</th>
                <th>Image  4</th>
                <th>Subcategory</th>
                <th>No of product </th>

			</tr>
			<?php
			$i=0;
			while($dataprod = mysql_fetch_assoc($result)){
				$i++;
				if($i>$id*5 &&$i<=($id+1)*5){
			?>
			<tr>
				<td><?php echo $dataprod['product_name'];?></td>
                <td><?php echo $dataprod['username'];?></td>
                <td><?php echo $dataprod['shopno'];?></td>
				<td>
					<?php if($dataprod['status']==1) {?>
						<a href="updatestatus.php?pid=<?php echo $dataprod['product_id'];?>&status=0&page=product">Active</a>
					<?php } else { ?>
						<a href="updatestatus.php?pid=<?php echo $dataprod['product_id'];?>&status=1&page=product">In Active</a>
					<?php }//end of else ?>
				</td>
				<td><a href="edit-product.php?pid=<?php echo $dataprod['product_id'];?>">Edit</a></td>
				<td><a href="deleteparentpage.php?pid=<?php echo $dataprod['product_id'];?>" onclick="return confirm('Are you sure ?')" >Delete</a></td>
				<?php if(!empty($dataprod['product_top'])) {?>
                <td><img src="../customer/userfiles/catimages/productimg/<?php echo $dataprod['product_top']; ?>" height="40" width="60"></td><?php } else{?><td>No Image</td><?php }?>
                <?php if(!empty($dataprod['product_front'])) {?>
                                <td><img src="../userfiles/catimages/productimg/<?php echo $dataprod['product_front']; ?>" height="40" width="60"></td><?php } else{?><td>No Image</td><?php }?>
                               
                               <?php if(!empty($dataprod['product_left'])) {?>
                <td><img src="../customer/userfiles/catimages/productimg/<?php echo $dataprod['product_left']; ?>" height="40" width="60"></td><?php } else{?><td>No Image</td><?php }?>
                                               <?php if(!empty($dataprod['product_right'])) {?>
                <td><img src="../customer/userfiles/catimages/productimg/<?php echo $dataprod['product_right']; ?>" height="40" width="60" ></td><?php } else{?><td>No Image</td><?php }
				$subcatid= $dataprod['subcat_id'];
				$sql1="select * from subcategory where subcat_id='$subcatid'";
				$res1=executequery($sql1);
				while($data=mysql_fetch_assoc($res1)){
				?>
                <td><?php echo $data['subcat_name'];?></td><?php }					
									
				?>
				<td><?php echo $dataprod['qty'];?>
                </td>
			</tr>
				<?php
				} //if close
			}//while close
				?>
		</table>

		
	</div>
	<div class="clear"></div>
		<div class="last">
	<?php 
	for($a=0;$a<$pageno;$a++){?>
	<a href="manageproduct.php?id=<?php echo $a;?>"><?php echo $a+1;?></a><?php
				}?>
				</div><!--end of last div-->
</div>
</body>
</html>