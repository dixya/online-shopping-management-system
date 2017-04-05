<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
	header("location:login.php");
}
include("dbconnect.php");
$sql = "select * from cart";
$result = executequery($sql);
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
		<table width="100%" cellpadding="4"  cellspacing="4">
			<tr>
				<th>Cart No.</th>
				<th>Status</th>
				<th>View</th>
				<th>Delete</th>
			</tr>
			<?php
			while($datapages = mysql_fetch_assoc($result)) {
			?>
			<tr>
				<td><?php echo $datapages['cart_no'];?></td>
				<td>
					<?php if($datapages['status']==1) {?>
						<a href="updatestatus.php?pid=<?php echo $datapages['cart_no'];?>&status=0&page=cart">Active</a>
					<?php } else { ?>
						<a href="updatestatus.php?pid=<?php echo $datapages['cart_no'];?>&status=1&page=cart">In Active</a>
					<?php }//end of else ?>
				</td>
				<td><a href="viewcart.php?pid=<?php echo $datapages['cart_no'];?>">View</a></td>
				<td><a href="deleteparentpage.php?pid=<?php echo $datapages['cart_no'];?>&p=6">Delete</a></td>
			</tr>
			
			
			
	<?php } ?>
			
		</table>
		
	</div>
	<div class="clear"></div>
</div>
</div>
</body>
</html>