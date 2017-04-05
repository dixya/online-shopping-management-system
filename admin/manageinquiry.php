<?php
session_start();
if(!isset($_SESSION['admin_username']) && !isset($_SESSION['password'])) {
  header("location:login.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shop Management</title>
<!--<link rel="stylesheet" type="text/css" href="style.css" />-->

<link rel="stylesheet" type="text/css" href="css/960.css" />
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/text.css" />
<link rel="stylesheet" type="text/css" href="css/blue.css" />
<link type="text/css" href="css/smoothness/ui.css" rel="stylesheet" />  
<link rel="stylesheet" href="css/febe/style.css" type="text/css" media="screen" charset="utf-8">
</head>
<body>
<?php
include("dbconnect.php");

?>
<div class="container_16" id="wrapper"> 
  
    <div class="clear"></div>
  <div class="content">
  <div class="grid_8" id="logo"> WELCOME <?php echo $_SESSION['admin_username'];?></div>
    <div class="grid_8">
<!-- USER TOOLS START -->
      <div id="user_tools"><span><a href="logout.php">Logout</a></span></div>
    </div>
<!-- USER TOOLS END -->    
<div class="grid_16" id="header">
<!-- MENU START -->
<?php include('sidebar.php');?>
<!-- MENU END -->
  <div class="clear"></div>
</div>
   <div class="grid_16" id="content">
    <!--  TITLE START  --> 
    <div class="grid_9">
    <h1 class="dashboard">Dashboard</h1>
    </div>
    <div class="clear">
    </div>
</div>
 <div class="clear"></div>
    <!--THIS IS A WIDE PORTLET-->
    <div class="portlet" >
<table border="1" cellspacing="5" cellpadding="5" width="100%">
<tr><td colspan="8" align="center" >Inquiry Details</td></tr>
<tr>
	<td>Contact Id</td>
  <td>Reply</td>
  <td> Delete</td>
  
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
</div>

</body>
</html>