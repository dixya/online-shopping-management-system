<?php
session_start();
if(!isset($_SESSION['admin_username']) && !isset($_SESSION['password'])) {
	header("location:login.php");
}
include("dbconnect.php");
$cartno=$_GET['cartno'];
$sql="select * from product group by shopno having cart_no='$cartno'";
$res=executequery($sql);?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>calculation for shop</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<div class="wrapper">
	
	<div class="content1">
    <?php include("sidebar.php");?>
    <table border="1">
<tr>
<td>Shop No</td>
<td>View product in Order - no <?php echo $cartno;?></td>
</tr>
<?php
while($data=mysql_fetch_assoc($res)){?>
<tr>
<td><?php echo $data['shopno'];?></td>
<td><a href="finalproductview.php?cartno=<?php echo $cartno;?>&shopno=<?php echo $data['shopno'];?>">View products</a></td></tr>
<?php }?>
</table>
<p align="right"><a href="viewcart.php?pid=<?php echo $cartno;?>">[Back]</a></p>
</div>
</div>
</body>
</html>