<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header("location:login.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shop Management</title>
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
$email=$_GET['email'];
$cid=$_GET['cid'];
$sub=$_GET['sub'];

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
<form name="frm" method="post" action="#">
Answer:<textarea name="reply" rows=20 cols=20></textarea>
<input type="submit" name="submit" value="Reply" >

</form>

</div>
<?php
if(isset($_POST['submit'])){
	$reply=$_POST['reply'];
	mail('meetmedixya@ymail.com',$sub,$reply);
	header("location:manageinquiry.php");
}
?>
</div>
</div>
</body>
</html>