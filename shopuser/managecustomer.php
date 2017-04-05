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
$sql = "select * from orders group by confirmation ";
$result = executequery($sql);

$rows=mysql_num_rows($result);
$pageno=$rows/5;
$id=$_GET['id'];
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
				<th>Confirmation no</th>
				<th>Customer name</th>
								<th>view details</th>


				<th>Status</th>
			</tr>
			
			<?php
			$i=0;
		
						while($datapages = mysql_fetch_assoc($result)) {
			$i++;
			if($i>$id*5 &&$i<=($id+1)*5){
			?>
			<tr>
				<td><?php echo $datapages['confirmation'];?></td>
								<td><?php echo $datapages['username'];
								$confirmation=$datapages['confirmation'];?></td>

								<td><a href="viewcustdetails.php?con=<?php echo $confirmation;?>&shopno=<?php echo $shopno;?>&cust=<?php echo $datapages['username'];?>">View</a></td>


				
                            <td>
                            <?php if($datapages['status']==0){echo "Pending";}
                              if($datapages['status']==1){echo "Processing";}
                               if($datapages['status']==2){echo "Delivered";}?>
                             	</td>

			</tr>
            
			
			
			
	
    
            <?php }
            } ?>
			
		</table>
		
	</div>
	<div class="clear"></div>
		<div class="last">
	<?php 
	for($a=0;$a<$pageno;$a++){?>
	<a href="managecart.php?id=<?php echo $a;?>"><?php echo $a+1;?></a><?php
				}?>
				</div><!--end of last div-->
</div>

</body>
</html>