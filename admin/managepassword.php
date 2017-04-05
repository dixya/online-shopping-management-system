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
<title>:: Administration Panel  ::</title>

<link rel="stylesheet" type="text/css" href="css/960.css" />
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/text.css" />
<link rel="stylesheet" type="text/css" href="css/blue.css" />
<link type="text/css" href="css/smoothness/ui.css" rel="stylesheet" />  
<link rel="stylesheet" href="css/febe/style.css" type="text/css" media="screen" charset="utf-8">
<!--<link rel="stylesheet" type="text/css" href="style.css" />-->
<script type="text/javascript">
function validate(){
var oldpassword=document.frmpwd.oldpwd.value;
var newpassword=document.frmpwd.newpwd.value;
var repassword=document.frmpwd.repwd.value;
if(oldpassword=="" || newpassword=="" || repassword==""){
	alert("any field can't be empty");
	return false;
	}
	return true;
	frmpwd.submit();
}
</script>
</head>
<body><div class="container_16" id="wrapper">	
	
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
	<?php
		if(isset($_GET['msg'])) {
		?>
		<p class="msg"><?php echo $_GET['msg'];?></p>
		<?php } ?>
	<h2>Update Password</h2>
		<form name="frmpwd" method="post" action="updatepassword.php">
			<table border="1" id="box-table-a">
				<tr>
					<td>Old Password</td>
					<td><input type="password" name="oldpwd"  />
				</tr>
				<tr>
					<td>New Password</td>
					<td><input type="password" name="newpwd"  />
				</tr>
				<tr>
					<td>Retype Password</td>
					<td><input type="password" name="repwd"  />
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="submit" value="change" onclick="return validate()" /></td>
				</tr>
			</table>
		</form>	
	</div>
	<div class="clear"></div>
</div>
</div>
</body>
</html><?php /*
session_start();
if(!isset($_SESSION['admin_username']) && !isset($_SESSION['password'])) {
	header("location:login.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Administration Panel  ::</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript">
function validate(){
var oldpassword=document.frmpwd.oldpwd.value;
var newpassword=document.frmpwd.newpwd.value;
var repassword=document.frmpwd.repwd.value;
if(oldpassword=="" || newpassword=="" || repassword==""){
	alert("any field can't be empty");
	return false;
	}
	return true;
	frmpwd.submit();
}
</script>
</head>
<body>
<div class="wrapper">
	<?php include("sidebar.php");?>
	<div class="content1">
	<?php
		if(isset($_GET['msg'])) {
		?>
		<p class="msg"><?php echo $_GET['msg'];?></p>
		<?php } ?>
	<h2>Update Password</h2>
		<form name="frmpwd" method="post" action="updatepassword.php">
			<table>
				<tr>
					<td>Old Password</td>
					<td><input type="password" name="oldpwd"  />
				</tr>
				<tr>
					<td>New Password</td>
					<td><input type="password" name="newpwd"  />
				</tr>
				<tr>
					<td>Retype Password</td>
					<td><input type="password" name="repwd"  />
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="submit" value="change" onclick="return validate()" /></td>
				</tr>
			</table>
		</form>	
	</div>
	<div class="clear"></div>
</div>
</body>
// </html>*/?>