<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
	header("location:login.php");
}
include("../admin/dbconnect.php");
$username=$_SESSION['username'];

$shopno=$_GET['shopno'];
$confirmation=$_GET['con'];
$cust=$_GET['cust'];
$sql="select * from orders where confirmation=$confirmation ";
$res=executequery($sql);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Cart Section::</title>
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
		<table width="100%" cellpadding="4"  cellspacing="4">
			
								<tr><th>product name</th>
								<th>product quantity</th>
								<th>Delivery status</th>
								</tr>




			
			
			
			
			<tr><td colspan=3>List of order of customer <?php echo $cust;?></td></tr>
						<tr>

						<?php
						while($data = mysql_fetch_assoc($res)) {

		
			
			?>
				<td><?php
				$pname=$data['product_name'];
				 echo $pname;?></td>
								<td>
									<?php echo $data['qty'];?></td>
								
								
								<td><?php $status= $data['status'];
								if($status==0)
									echo "pending";
								if($status==1)
									echo "processing";
									if($status==2) 
									echo "delivered";
									?></td>	<?php }?>
									</tr>


            
			
			
			
	
    
            
			
		</table>
		
	</div>
	<div class="clear"></div>

</div>

</body>
</html>						




























