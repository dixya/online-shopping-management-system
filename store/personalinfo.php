<style>
body{
font-family:"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
font-size:12px;
}
p, h1, form, button{border:0; margin:0; padding:0;}
.spacer{clear:both; height:1px;}
/* ----------- My Form ----------- */
.myform{
margin:0 auto;
width:400px;
padding:14px;
}

/* ----------- stylized ----------- */
#stylized{
border:solid 2px #b7ddf2;
background:#ebf4fb;
}
#stylized h1 {
font-size:14px;
font-weight:bold;
margin-bottom:8px;
}
#stylized p{
font-size:11px;
color:#666666;
margin-bottom:20px;
border-bottom:solid 1px #b7ddf2;
padding-bottom:10px;
}
#stylized label{
display:block;
font-weight:bold;
text-align:right;
width:140px;
float:left;
}
#stylized .small{
color:#666666;
display:block;
font-size:11px;
font-weight:normal;
text-align:right;
width:140px;
}
#stylized input{
float:left;
font-size:12px;
padding:4px 2px;
border:solid 1px #aacfe4;
width:200px;
margin:2px 0 20px 10px;
}
#stylized select{
float:left;
font-size:12px;
padding:4px 2px;
border:solid 1px #aacfe4;
width:200px;
margin:2px 0 20px 10px;
}
#stylized button{
clear:both;
margin-left:150px;
width:125px;
height:31px;
background:#666666 url(img/button.png) no-repeat;
text-align:center;
line-height:31px;
color:#FFFFFF;
font-size:11px;
font-weight:bold;
}
</style>
<script type="text/javascript">
function validateForm()
{
var x=document.forms["form1"]["fname"].value;
if (x==null || x=="")
  {
  alert("Enter Firstname");
  return false;
  }
  var y=document.forms["form1"]["lname"].value;
if (y==null || y=="")
  {
  alert("Enter Lastname");
  return false;
  }
  var z=document.forms["form1"]["cnum"].value;
if (z==null || z=="")
  {
  alert("Enter Contact Number");
  return false;
  }
  var a=document.forms["form1"]["email"].value;
if (a==null || a=="")
  {
  alert("Enter Email Address");
  return false;
  }
    var b=document.forms["form1"]["paddress"].value;
if (b==null || b=="")
  {
  alert("Enter Address");
  return false;
  }
    var c=document.forms["form1"]["city"].value;
if (c==null || c=="")
  {
  alert("Enter City");
  return false;
  }
    var d=document.forms["form1"]["daddress"].value;
if (d==null || d=="")
  {
  alert("Enter Delivery Address");
  return false;
  }
  var con = confirm("Are You Sure? you want to proceed?");
if (con ==false)
{
return false;
}
}
</script>
<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script> 
<div id="stylized" class="myform">
<form method="post" action="saveform.php" name="form1" onsubmit="return validateForm()">
<input type="hidden" name="transnum" id="name" value="<?php echo $_POST['transnumber'] ?>" />

<?php
$rrrrr=$_POST['country'];
if($rrrrr==1){
$asas=$_POST['total'];
}
if($rrrrr==2){
$asas=$_POST['total'];
}
if($rrrrr==3){
$asas=$_POST['total']+500;
} 
 ?>
<input type="text" name="ototal" id="name" value="<?php echo $asas ?>" style="display:none;" />
<input type="hidden" name="sdsd" id="name" value="<?php 
$rrrrr=$_POST['country'];
if($rrrrr==1){
echo 'Cash On delivery';
}
if($rrrrr==2){
echo 'Shipping Inside Batangas';
}
if($rrrrr==3){
echo 'Shipping Outside Batangas';
}
?>" />
<input type="hidden" name="pmethod" id="name" value="<?php echo $_POST['state'] ?>" />
<?php
$qtytotal=$_POST['totalqty'];
$wqwqwq=$_POST['country'];
echo $wqwqwq; 
if(($qtytotal>1000) && ($wqwqwq==2)){
$NewDate=Date('y:m:d', strtotime("+2 days"));
}
else if(($qtytotal<1000) && ($wqwqwq==2)){
$NewDate=Date('y:m:d', strtotime("+1 days"));
}
else if(($qtytotal>1000) && ($wqwqwq==3)){
$NewDate=Date('y:m:d', strtotime("+4 days"));
}
else if(($qtytotal<1000) && ($wqwqwq==3)){
$NewDate=Date('y:m:d', strtotime("+3 days"));
}
//echo '<input type="hidden" name="date" id="name" value="'.$NewDate.'" />';
?>
<h1>Personal Information form</h1>


<label>First Name
<span class="small">Add your first name</span>
</label>
<input type="text" name="fname" id="name" />

<label>Last Name
<span class="small">Add your last name</span>
</label>
<input type="text" name="lname" id="name" />

<label>Contact No.
<span class="small">Add your Contact number</span>
</label>
<input type="text" name="cnum" id="name" />

<label>Email
<span class="small">Add a valid address</span>
</label>
<input type="text" name="email" id="email" />

<label>Address
<span class="small">permanent address</span>
</label>
<input type="text" name="paddress" id="name" />
<label>City
<span class="small">permanent address</span>
</label>
<input type="text" name="city" id="name" />

<label>Delivery Addres
<span class="small">Delivery Address</span>
</label>
<input type="text" name="daddress" id="name" />
<input type="submit" value="Confirm" style="margin-left: 150px;">
<div class="spacer"></div>

</form>
</div>