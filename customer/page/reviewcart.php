<?php 
if(isset($_GET['transnum'])){
        $transnum = $_GET['transnum'];
 
  }
   if(isset($_GET['username'])){
        $username = $_GET['username'];
   echo $uname = $username;
  }
$sql="SELECT * FROM orders WHERE username='$uname' AND status=0";
$res=executequery($sql);
?>
<div class="category">
<table border="1" cellspacing="5" cellpadding="5" align="center" width="100%" style="margin-top:60px;" >
<tr align="center"><td colspan=6 align="center" style="color:navy; font-size:18pt;">MY CART</td></tr>
	<tr align="center"><th>S.N</th>
	<th>Product-name</th>	
	<th>Unit price</th>
	<th>Ordered quantity</th>
	<th>Remove from cart</th>
	<th>Total price</th></tr>
	<?php
	$sn=1;
	while($data=mysql_fetch_assoc($res)){
	?>
	<tr align="center">
	<td><?php echo $sn;?></td>
	<?php
	$prodname =$data['product_name'];
	 $qty = $data['qty'];
	$sql1="select * from product where product_name='$prodname' ";
	$res1=executequery($sql1);
	$data1=mysql_fetch_assoc($res1);?>
	<td><?php echo $data1['product_name'];?></td>
	 <td><?php echo $data1['price'];?></td>
	 <td><?php echo $qty;?></td>
	 <td><a href="deleteorder.php?id=<?php echo $data1['product_id'];?>" class="delbutton" title="Click To Delete"><img src="images/delete.png"></a></td>
	 <td><?php echo $prod = $data1['price']*$qty;?></td>
	</tr>	<?php $sn++; 
	$gtotal += $prod ; }?>
	<tr align="center"><td colspan="5">Grand Total Amount</td><td><?php echo $gtotal;?></td></tr>
 <?php 
	// $result5 = mysql_query("SELECT sum(total) FROM orders WHERE username = '$username'");
	// 				while($row5 = mysql_fetch_array($result5)){ 
	// 					echo $row5['sum(total)']; 
	// 					echo '<tr>'.$sfdddsdsd=$row5['sum(total)'].'</tr>'; } 
?>
</table>

<form method="post" action="store/personalinfo.php" name="form1" onsubmit="return validateForm()">
			<input type="hidden" name="transnum" value="<?php echo $transnum; ?>" />
			<input type="hidden" name="username" value="<?php echo $username; ?>" />
			
			<input type="hidden" name="total" value="<?php echo $sfdddsdsd; ?>" />
			<input type="hidden" name="totalqty" value="<?php $result6 = mysql_query("SELECT sum(qty) FROM orders WHERE confirmation='$transnum'");
				while($row6 = mysql_fetch_array($result6)){ 
				echo $row6['sum(qty)'];}?>
				" />
			<input type="submit" value="Check Out">
			</form>
</div>