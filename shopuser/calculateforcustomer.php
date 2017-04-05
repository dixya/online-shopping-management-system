<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
	header("location:login.php");
}
include("../admin/dbconnect.php");
$username=$_GET['username'];
$orderid=$_GET['orderid'];
$susername=$_SESSION['username'];
$sqla="select * from shopuser where username='$susername'";
$rs=executequery($sqla);
$data=mysql_fetch_assoc($rs);
$shopno=$data['shopno'];
$sql = "select * from orders where cust_id='$custid' and shopno='$shopno';";
$res=executequery($sql);

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Customer Bill</title>
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
        <p>Details of customer no.<?php echo $custid;?></p>

<table border="1">
<tr>
<th>Product name</th>
<th>Unit Price</th>
<th>Quantity</th>
<th>Total Price</th>
</tr>
<?php 
$sum=0;
$t=1;
while($data=mysql_fetch_assoc($res)){?>
	<tr>
        <?php
		$a= $data['product_id'];
		$sql1="select * from product where product_id='$a'";
		$res1=executequery($sql1);

		while($dataprod=mysql_fetch_assoc($res1)){?>
        <td><?php echo $dataprod['product_name'];?></td>
                <td><?php echo $dataprod['price'];?></td>
                        <td><?php echo $data['product_qty'];?></td>
                                <?php $t=$dataprod['price']*$data['product_qty'];?>
                                <td><?php echo $t;?></td><?php
								$sum=$sum+$t; }?>



    </tr><?php }?>
    <tr>
    <td colspan="3">Total Amount</td>
    <td><?php 
	
	echo $sum;
     
	?></td>
    </table>
   <!-- <a href="deleteorder.php?custid=<?php echo $custid;?>">Delivered</a>-->
    </div>
    </div>

</body>
</html>