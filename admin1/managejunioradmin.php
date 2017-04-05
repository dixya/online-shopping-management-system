<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>junior admin management</title>
</head>
<body>
<?php
$shopid=$_GET['shopno'];
include("dbconnect.php");
$sql="select * from adminuser";
$res=executequery($sql);
while($data=mysql_fetch_assoc($res)){
?>
<table class="jproduct" name="jproduct" border="1">
<tr>
	<td colspan=2>shop no<?php echo $data['shopno'];?></td>
</tr><?php }

$sql="select * from product where shopno='$shopid'";
$res=executequery($sql);
while($data=mysql_fetch_assoc($res)){?>
<tr><td>product name</td>
	<td>status</td></tr>
<tr>
	<td><?php echo $data['product_name'];?></td>
    <td><?php echo $data['status'];?></td>
</tr>
</table>
<?php }?>

</body>
</html>