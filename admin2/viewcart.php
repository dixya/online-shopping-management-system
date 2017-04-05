<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
	header("location:login.php");
}
$id = $_GET['pid'];
include("dbconnect.php");
$sql = "select * from product where cart_no='$id'";
$res=executequery($sql);
//$data = mysql_fetch_assoc($res);
//$data =mysql_num_rows($datares);
?>
<html>
<head>
<title>Product edit</title>

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
	<form name="frmpage" method="post" enctype="multipart/form-data" action="update-product.php" >
    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 

		<table width="100%" cellpadding="4" cellspacing="4"  border="1" class="box-table-a ">
		<tr>
			<th>Cart Number</th>
			<th>Products</th>
			<th>No of product</th>
			<th>Unit Price</th>
			<th>Total Price</th>
		</tr>
		<?php
		$sum=0;
			while($dataprod = mysql_fetch_assoc($res)) 
			{
				$qty=$dataprod['qty'];
				$price=$dataprod['price'];
				$total_amount = $qty * $price;
		 ?>
		<tr>	
			<td><?php echo $dataprod['cart_no']; ?></td>
			<td><?php echo $dataprod['product_name']; ?></td>
			<td><?php echo $qty; ?></td>
			<td><?php echo $price; ?></td>
			<td><?php echo $total_amount; ?></td>

		<?php 
		$sum += $total_amount;
			}  
		?>
		</tr>
		<tr align="center">
			<td colspan="4">Total  Amount</td>
			<td><?php echo $sum; ?></td>
		</tr>
		
	</table>
	</form>
	</div>
	<div class="clear"></div>
	</div>
	</div>
	</body>
	</html>