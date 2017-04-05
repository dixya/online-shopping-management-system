<link rel="stylesheet" type="text/css" href="css/master.css">
<?php
include("admin/dbconnect.php");
include("header.php");
$sql="select * from cart where cust_id=56";
$res=executequery($sql);
$sn=0;
?>
<table border="1" cellspacing="5" cellpadding="10" align="center">
<tr><td colspan=6 align="center">MY CART</td></tr>
	<tr><th>S.N</th>
	<th>Product-name</th>
	
	<th>Unit price</th>
	<th>Ordered quantity</th>
	<th>Remove from cart</th>
	<th>Total price</th></tr>
	<tr><?php
while($data=mysql_fetch_assoc($res)){
	?>
	
	
	<td><?php echo $sn+1;?></td>
	<?php
	$prodid=$data['product_id'];
	$sql1="select * from product where product_id='$prodid' ";
	$res1=executequery($sql1);
	$data1=mysql_fetch_assoc($res1);
	 ?><td><?php echo $data1['product_name'];?></td>
	 <td><?php echo $data1['price'];?></td>
	 <td><?php echo $data['product_qty'];?></td>
	 <td><a href="removefromcart.php?prodid=<?php echo $prodid;?>">Remove</a></td>
	 <td><?php echo $data1['price']*$data['product_qty'];?></td>
	
	</tr><?php }?>

<form name="frm" method="post" action="orderproceed.php">
<tr><td colspan="6"><b>"If you are sure to purchase then fill up the following form compulsorily."</b></td></tr>
<tr><td colspan=3>
Shipping address:</td><td colspan="3"><input type="text" name="address" value=""></td></tr>
<tr><td colspan=3>Recipient's name:</td><td colspan="3"><input type="text" name="recipient" value=""></td></tr>
<tr><td colspan=3>Credit card name:</td><td colspan="3"><input type="text" name="ccname" value=""></td></tr>
<tr><td colspan=3>credit card type:</td><td colspan="3"><input type="text" name="cctype" value=""></td></tr>
<tr><td colspan=3>credit card expiry:</td><td colspan="3"><input type="date" name="ccdate" value=""></td></tr>
<tr><td colspan=3>Any comments??</td><td colspan="3"><textarea name="comments" rows=5 cols=5></textarea></td></tr>
<tr><td colspan="6" align="center"><input type="submit" name="submit" value="Confirm order" onclick="confirm('Are you sure to proceed the order?')"></td></tr>
</table>
</form>
	