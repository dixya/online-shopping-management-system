<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Administration Panel ::</title>
<link rel="stylesheet" type="text/css" href="style.css" />

<script language="javascript" src="jquery.js"></script>
<script language="javascript" src="jquery.pstrength-min.1.2.js"></script>
<script type="text/javascript">

$(function() {
$('.password').pstrength();
});


//username validation
$(document).ready(function()
{
	$("#username").blur(function()
	{
		//remove all the class add the messagebox classes and start fading
		$("#msgbox").removeClass().addClass('messagebox').text('Checking...').fadeIn("slow");
		//check the username exists or not from ajax
		$.post("user_availability.php",{ username:$(this).val() } ,function(data)
        {
		  if(data=='no') //if username not avaiable
		  {
		  	$("#msgbox").fadeTo(200,0.1,function() //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('User Name Already exists!').addClass('messageboxerror').fadeTo(900,1);
			});		
          }
		  else
		  {
		  	$("#msgbox").fadeTo(200,0.1,function()  //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('Username Available').addClass('messageboxok').fadeTo(900,1);	
			});
		  }
				
        });
 
	});
});
function validate(){
	email=document.frmsignup.email.value;	
	if(frmsignup.fname.value==""||frmsignup.lname.value==""||frmsignup.username.value==""||frmsignup.password.value==""||frmsignup.email.value==""||frmsignup.address.value==""||frmsignup.phone.value==""||frmsignup.captcha.value==""){
	alert("any fields can't be empty");}
	/*if(email!=""){
		at=email.indexOf('@');
				dot=email.indexOf('.');
					if(at==-1 || dot==-1){
		alert("invalid email, either @ or . is missing");
		var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
  alert("Not a valid e-mail address");
 document.frmsignup.email.focus();
		return false;
					}
	}
	return true;	
		frmsignup.submit();
}*/
if(email!=""){
var atpos=email.indexOf("@");
var dotpos=email.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
  {
  alert("Not a valid e-mail address");
   document.frmsignup.email.focus();
  return false;
  }
  return true;	
		frmsignup.submit();

}
}
</script>

</head>

<body>
<div class="wrapper">
<div class="content1">
	<div class="login">
		<?php if(isset($_GET['msg'])) {?>
		<p class="msg"><?php echo $_GET['msg'];?></p>
		<?php } ?>
		<p class="title">Admin Sign-Up</p>
		<form name="frmsignup" method="post" action="#">
			<table border="0">

			<tr><td>First name:</td><td> <input type="text" name="fname" value=""/></td></tr>
			<tr><td>Last name: </td><td><input type="text" name="lname"  value=""/></td></tr>
            <tr><td>Username: </td><td><input type="text" style="BORDER:1px solid #349534; width:150px;" name="username" id="username"size="30" maxlength="20"  value="">
		Status:<span id="msgbox" style="display:none; font-size:9px;"></span></td></tr>
			<tr><td>Password: </td><td><input type="password" name="password" style="BORDER:1px solid #349534; width:150px;" class="password" /></td></tr>
			<tr><td>E-mail: </td><td><input type="text" name="email"  value="" /></td></tr>
			<tr><td>Address:</td><td> <input type="text" name="address"  value="" /></td></tr>
		    <tr><td>Phone: </td><td><input type="text" name="phone"  value=""/></td></tr>
		    <tr><td><img src="captcha.php" /></td></tr>
		 <tr> <td> Enter Image Text</td><td><input name="captcha" type="text">
             </td></tr>
			<tr><td><input type="submit" name="submit" value="Register" onclick="return validate()" /></td></tr>
</table>
		</form>
	</div>
</div>
</div>

</body>
</html>