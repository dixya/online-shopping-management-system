<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
	header("location:login.php");
}
include("../admin/dbconnect.php");
$username=$_SESSION['username'];
$sqla="select * from shopuser where username='$username'";
$rs=executequery($sqla);
$data=mysql_fetch_assoc($rs);
$shopno=$data['shopno'];
$sql = "select * from orders";
$result = executequery($sql);
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
			<tr>
				<th>Order Id</th>
				<th>View</th>
				<th>Status</th>
                <th>Calculate for customer</th>
			</tr>
			<?php
			while($datapages = mysql_fetch_assoc($result)) {
			?>
			<tr>
				<td><?php echo $datapages['id'];?></td>
				
				<td><a href="viewcart.php?pid=<?php echo $datapages['id'];?>&username=<?php echo $datapages['username'];?>">View</a></td>
                            <td>
                            <?php if($datapages['status']==0){echo "Pending";}
                              if($datapages['status']==1){echo "Processing";}
                               if($datapages['status']==2){echo "Delivered";}?>
                             	</td>
                            <td><a href="calculateforcustomer.php?username=<?php echo $datapages['username'];?>&orderid=<?php echo $datapages['id'];?>">Generate Bill</a></td>

			</tr>
            
			
			
			
	
    
            <?php } ?>
			
		</table>
		
	</div>
	<div class="clear"></div>
</div>

</body>
</html>