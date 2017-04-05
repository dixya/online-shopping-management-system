<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shop Management</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<?php
include("dbconnect.php");

?>
<div class="wrapper">
<?php include("sidebar.php");?>
<div class="content1">
<table border="1">
<tr><td colspan="5" align="center" >Shop Details</td></tr>
<tr>
	<td>Shop no</td>
    <td>View shop</td>
    <td>Username</td>
    <td>Shop_Status</td>
    <td>Rating</td>
 </tr>
 <?php 
 $sql="select shopno,username,status from shopuser";
 $res=executequery($sql);
    while($data=mysql_fetch_assoc($res)){
  ?>
  <tr>
  <td><?php echo $data['shopno'];?></td>
  <td><a href="viewshop.php?sid=<?php echo $data['shopno'];?>&username=<?php echo $data['username'];?>&s=1">View Shop products</a>
  <td><?php echo $data['username'];?></td>
  <td><?php if($data['status']==1) {?>
						<a href="updatestatus.php?pid=<?php echo $data['shopno'];?>&status=0&page=shop">Active</a>
					<?php } else { ?>
						<a href="updatestatus.php?pid=<?php echo $datapages['shopno'];?>&status=1&page=shop">In Active</a>
					<?php }//end of else ?></td>
<?php }?>
</table>

</div>
</div>

</body>
</html>