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
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body><div class="wrapper">
	<?php include("sidebar.php"); ?>
	<div class="content1">
	<form name="frmpage" method="post" enctype="multipart/form-data" action="update-product.php" >
    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 

		<table width="100%" cellpadding="4" cellspacing="4">
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