<html>
	<head>
		<link rel="stylesheet" href="css/page.css" type="text/css" />
		<link rel="stylesheet" href="css/login.css" type="text/css" />
		<script type="text/javascript">
			alert("Your Session has Expired!!\nPlease login again!");
		</script>
	</head>
	<body>
		
		<!-- header start -->
		<div class="wrap-header"style="width:100%;">
			<div class="header" style="box-shadow:none; width:100%; height:75px;">&nbsp;</div>
			
			<div style="position:relative; margin:-63px 0px 0px 130px;"><a href="index.php"><img src="image/logo.png" /></a></div>
		<!-- header ends -->
		<div class="wrap-login">
			<div  class="title"><b style="color:#000;font-size:18px;">Account Login</b><hr></div>
			<div  class="message" style="height:15px; padding:15px;">
				<font style="font-family:Arial; font-size:12px;"><b>Your session Period was expired, Please login again!</b></div>
			<div  class="login-form" style="margin-top:50px;">
				<form method=post action="customer/index.php">
				<table border=0 cellpadding=4 cellspacing=0 align=center width=50%>
					<tr><td width=25%><b style="color:#676767; font-size:13px">Username:</b></td><td width=75%><input type=text name="username" placeholder="Username"/></td></tr>
					<tr><td><b style="color:#676767; font-size:13px">Password:</b></td><td><input type=password name="password" placeholder="Password" /></td></tr>
					<tr><td>&nbsp;</td><td><input type="checkbox" name="remember" value="yes" /> <font style="font-size:14px;">Keep me logged in.</font></td></tr>
					<tr><td>&nbsp;</td><td><input type="submit" id="sign-btn" style="border-radius:3px;" value="Sign In" /> or <a href="cust_signup.php" style="text-decoration:none; font-weight:bold;color:#db3629;font-size:14px;">Sign up now</a></td></tr>
					<tr><td>&nbsp;</td><td><a href="#" style="text-decoration:none;color:#db3629;font-size:13px;">Forgot your password?</a></td></tr>
				</table>
				</form>
			</div>
		</div>
		<div style="width:90%;margin:550px 0px 0px 80px;"><hr></div>
		<div style="width:70%; height:20px; border:0px solid #000;text-align:center; margin:0px 0px 0px 250px;font-size:13px;"> Home&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;View Menu&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contact Us&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Find us in map&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Our Blog&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Like us in facebook</div>
	</body>
</html>