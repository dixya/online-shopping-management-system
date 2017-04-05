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
<tr><td colspan="5" align="center" >Inquiry Details</td></tr>
<tr>
	<td>Contact Id</td>
    <td>Name</td>
    <td>Subject</td>
    <td>Message</td>
        <td>Email</td>
    

    <td>Date</td>
 </tr>
 <?php 
 $sql="select * from contact";
 $res=executequery($sql);
    while($data=mysql_fetch_assoc($res)){
  ?>
  <tr>
  <td><?php echo $data['contact_id'];?></td>
  <td><a href="reply.php?cid=<?php echo $data['contact_id'];?>&email=<?php echo $data['email'];?>&sub=<?php echo $data['lname'];?>">Reply to this message</a>
    <td><a href="delete.php?cid=<?php echo $data['contact_id'];?>">Delete</a>

  <td><?php echo $data['fname'];?></td>
    <td><?php echo $data['lname'];?></td>
        <td><?php echo $data['msg'];?></td>
                <td><?php echo $data['email'];?></td>
                </tr><?php }?>
  
</table>

</div>
</div>

</body>
</html>