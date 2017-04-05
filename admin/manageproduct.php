<?php
session_start();
if(!isset($_SESSION['admin_username']) && !isset($_SESSION['password'])) {
	header("location:login.php");
}
include("dbconnect.php");
$sql = "select * from product";

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

<link rel="stylesheet" type="text/css" href="css/960.css" />
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/text.css" />
<link rel="stylesheet" type="text/css" href="css/blue.css" />
<link type="text/css" href="css/smoothness/ui.css" rel="stylesheet" />  
<link rel="stylesheet" href="css/febe/style.css" type="text/css" media="screen" charset="utf-8">
<!--<link rel="stylesheet" type="text/css" href="style.css" />-->
</head>

<body>
<div class="container_16" id="wrapper">	
	
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
		<?php
		if(isset($_GET['msg'])) {
		?>
		<p class="msg"><?php echo $_GET['msg'];?></p>
		<?php } ?>
		<table width=940px cellpadding="4"  cellspacing="4" border="1" id="box-table-a">
			<tr>
				<th>Product Title</th>
				<th>Status</th>
				<th>Edit</th>
				<th>Delete</th>
                <th>Image(Top view)</th>
                <th>Image(Front view)</th>
                <th>Image(Right side view)</th>
                <th>Image(Left side view)</th>

			</tr>
			<?php
			$i=0;
			while($dataprod = mysql_fetch_assoc($result)){
				$i++;
				if($i>$id*5 &&$i<=($id+1)*5){
			?>
			<tr>
				<td><?php echo $dataprod['product_name'];?></td>
				<td>
					<?php if($dataprod['status']==1) {?>
						<a href="updatestatus.php?pid=<?php echo $dataprod['product_id'];?>&status=0&page=product">Active</a>
					<?php } else { ?>
						<a href="updatestatus.php?pid=<?php echo $dataprod['product_id'];?>&status=1&page=product">In Active</a>
					<?php }//end of else ?>
				</td>
				<td><a href="edit-product.php?pid=<?php echo $dataprod['product_id'];?>">Edit</a></td>
				<td><a href="deleteparentpage.php?pid=<?php echo $dataprod['product_id'];?>&p=5" onclick="return confirm('are u sure?')">Delete</a></td>
				<?php if(!empty($dataprod['product_top'])) {?>
                <td><img src="../customer/userfiles/catimages/productimg/<?php echo $dataprod['product_top']; ?>" height="40" width="60"></td><?php }?>
                <?php if(!empty($dataprod['product_front'])) {?>
                                <td><img src="../userfiles/catimages/productimg/<?php echo $dataprod['product_front']; ?>" height="40" width="60"></td><?php }?>
                               
                               <?php if(!empty($dataprod['product_left'])) {?>
                <td><img src="../customer/userfiles/catimages/productimg/<?php echo $dataprod['product_left']; ?>" height="40" width="60"></td><?php }?>
                                               <?php if(!empty($dataprod['product_right'])) {?>
                <td><img src="../customer/userfiles/catimages/productimg/<?php echo $dataprod['product_right']; ?>" height="40" width="60"></td><?php }?>

                
			</tr>
				<?php
			}//end of if
				} //end of while 
				
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
</div>
</body>
</html>