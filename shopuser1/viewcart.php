<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password']) ) {
	header("location:login.php");
}
$username=$_GET['username'];
$orderid = $_GET['pid'];

include("../admin/dbconnect.php");
$suname=$_SESSION['username'];
$sqla="select * from shopuser where username='$suname'";
$rs=executequery($sqla);
$data=mysql_fetch_assoc($rs);
$shopno=$data['shopno'];
$sql = "select * from orders where id='$orderid' and shopno='$shopno'";
$res=executequery($sql);

?>
<html>
<head>
<title>Product edit</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body><div class="wrapper"><form name="frm" method="post" action="#">
	<?php include("sidebaruser.php"); ?>
	<div class="content">
	    <p align="center"> Details of order no.<?php echo $orderid;?> for shop no.<?php echo $shopno;?></p>

		<table border="1" cellpadding="2" cellspacing="2">
		<tr>
			
			<th>No of ordered product</th>
           <th>Name of the product</th>
			<th>Unit Price</th>
			<th>Total Price</th>
		</tr>
        <tr>
		<?php
		$sum=0;
		
			while($dataprod = mysql_fetch_assoc($res)) 
			{
				
		 ?>
			
						<?php $prodid= $dataprod['product_id']; ?>
			<td><?php echo $dataprod['qty']; ?></td>
			<?php 
			
			$sql1="select * from product where  product_id='$prodid';";
			$res1=executequery($sql1);
			while($data=mysql_fetch_assoc($res1)){?>
            <td><?php
			$productqty=$data['qty'];
				echo $data['product_name'];?></td>
                <td><?php            
				echo $data['price']; ?></td><?php 
			
			?>
			<td><?php
			$orderqty=$dataprod['product_qty'];			
			$tot= $orderqty* $data['price'];
			 echo $tot; ?></td>
</tr>
		<?php 
		$sum =$sum + $tot;
			}
		?>
		</tr><?php }?>
		<tr align="center">
			<td colspan="3">Total  Amount</td>
			<td><?php echo $sum; ?></td>
		</tr>
		
	</table>
	<form name="delivery_form" method="post" action="#">
	<select name="delivery">
	<option>--Select delivery status--</option>
	<?php if($dataprod['status']==0){?>
	<option value=1 ><?php echo "processing";?></option>
		<option value=2 ><?php echo "delivered";?></option>
		<?php }

	if($dataprod['status']==1){?>
		<option  value=2><?php echo "delivered";?></option>
				<option value=1 ><?php echo "partially processed";?></option>
				<?php }

			if($dataprod['status']==2){?>
					<option ><?php echo "delivered";?></option>
<?php }?>



	
	</select>

	
    <input type="submit" name="submit" value="Update order" > 
    </form>

   
   <?php /* 
   if(isset($_POST['submit'])){
	   if($productqty>=$orderqty){
		   echo "product available in stock";
		   $remproduct=$productqty-$orderqty;
		    $sql2="update product set qty='$remproduct' where product_id='$prodid'";
			$res2=executequery($sql2);
			if($res2){
		   echo "and product updated and delivered successfully .";
	   }
	    else{
	   echo "error updating product";  }
	  
	   }
   
	   else
	   {
		   echo "out of stock";
		   ?><br/><a href="manageproduct.php">Add more products</a><?php
	   }
   }
   
   
  
   */?>
<?php
if(isset($_POST['submit'])){
	$status=$_POST['delivery'];
	$sql="update orders set status='$status' where id='$orderid'";
	$result=executequery($sql);
	if($result){
		header("location:managecart.php");
			}
			else{
				echo "delivery status not updated successfully";
			}
		}


	?>



   </div>
   </body>
   </html>
  