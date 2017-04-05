<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
	header("location:login.php");
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="wrapper">
	<?php include("sidebaruser.php");?>
	<div class="content">
    		<?php if(isset($_GET['msg'])){?>
            <p class="msg"><?php echo $_GET['msg'];}?></p>
	<p>welcome <?php echo $_SESSION['username'];?></p>
	</div>
	<div class="clear"></div>
</div>
</body>
</html>