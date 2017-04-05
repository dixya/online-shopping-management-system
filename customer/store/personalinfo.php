<?php echo $transnum=$_POST['transnum'];
echo $username=$_POST['username'];

?>
<a href="../index.php?&transnum=<?php echo $transnum;?>&username=<?php echo $username;?>">Back</a>
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
    var b=document.forms["form1"]["cntry"].value;
if (b==null || b=="")
  {
  alert("Enter Country");
  return false;
  }
    var c=document.forms["form1"]["city"].value;
if (c==null || c=="")
  {
  alert("Enter City");
  return false;
  }
    var d=document.forms["form1"]["address"].value;
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
<input type="hidden" name="transnum" id="name" value="<?php echo $_POST['transnum'] ?>" />
<input type="hidden" name="username" id="name" value="<?php echo $_POST['username'] ?>" />


<?php
// $rrrrr=$_POST['country'];
// if($rrrrr==1){
// $asas=$_POST['total'];
// }
// if($rrrrr==2){
// $asas=$_POST['total'];
// }
// if($rrrrr==3){
// $asas=$_POST['total']+500;
// } 
?>
<?php /*<input type="hidden" name="sdsd" id="name" value="<?php 
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
<input type="hidden" name="pmethod" id="name" value="<?php echo $_POST['state'] ?>" /> */?>
<?php
$qtytotal=$_REQUEST['totalqty'];
$total = $_POST['total'];?>
<?php /*// $wqwqwq=$_POST['country'];
// echo $wqwqwq; 
// if(($qtytotal>1000) && ($wqwqwq==2)){
// $NewDate=Date('y:m:d', strtotime("+2 days"));
// }
// else if(($qtytotal<1000) && ($wqwqwq==2)){
// $NewDate=Date('y:m:d', strtotime("+1 days"));
// }
// else if(($qtytotal>1000) && ($wqwqwq==3)){
// $NewDate=Date('y:m:d', strtotime("+4 days"));
// }
// else if(($qtytotal<1000) && ($wqwqwq==3)){
// $NewDate=Date('y:m:d', strtotime("+3 days"));
// }*/?>
<input type="hidden" name="total" id="total" value="<?php echo $total;?>" />

<h1>BILLING DETAILS</h1>
<label>First Name
</label>
<input type="text" name="fname" id="name" placeholder="First Name" />

<label>Last Name
</label>
<input type="text" name="lname" id="name" placeholder="Last Name"/>

<label>Contact No.
</label>
<input type="text" name="cnum" id="name" placeholder="Contact No" />

<label>Email
</label>
<input type="text" name="email" id="email" placeholder="Email" />

<label>Country
</label>
<select name="cntry">
  <option>--Select Country--</option>
  <option>Nepal</option>
  <option>India</option>
  <option>China</option>
  <option>America</option>
  <option>Japan</option>  
</select>

<label>Address
</label>
<input type="text" name="address" id="address" placeholder="Street Address" />

<label>Post Code
</label>
<input type="text" name="post" id="post" placeholder="Post COde/ZIP" />

<label>City
</label>
<input type="text" name="city" id="city" placeholder="City/Town"  />

<label>SHIP TO DIFFERENT ADDRESS?
<input type="checkbox" onclick="showMe('div1', this)" name="chk1" ></label>
  <div id="div1" style="display:none">
      <label>Delivery Address
    </label>
<input type="text" name="daddress" placeholder="Delivery Address" />
  </div>
<label><br>PAYMENT BY</label>
<span class="small">Select payment method</span>

<label>CASH ON DELIVERY</label>
<input type="submit" value="Confirm" style="margin-left: 150px;">
<label>PAYPAL</label>
  
<?php 
    $paypal_url ='https://www.sandbox.paypal.com/cgi-bin/webscr'; 
    $paypal_id ='meetmedixya@ymail.com';?>
<div class="btn">
                <form action='<?php echo $paypal_url; ?>' method='post' name='frmPayPal1'>
                    <input type='hidden' name='business' value='<?php echo $paypal_id;?>'>
                    <input type='hidden' name='cmd' value='_xclick'>
                    <input type='hidden' name='item_name' value='<?php echo $row['product_name'];?>'>
                    <input type='hidden' name='item_number' value='<?php echo $row['pid'];?>'>
                    <input type='hidden' name='amount' value='<?php echo $row['price'];?>'>
                    <input type="hidden" name="country" value="<?php echo $_POST['country']; ?>" />
                    <input type='hidden' name='no_shipping' value='1'>
                    <input type='hidden' name='currency_code' value='USD'>
                    <input type='hidden' name='handling' value='0'>
                    <input type='hidden' name='cancel_return' value='http://localhost/easyshop/customer/paypal/cancel.php'>
                    <input type='hidden' name='return' value='http://localhost/easyshop/customer/paypal/success.php'>

                    <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                    <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                </form> 

            </div>
            </form>
  </div>


<div class="spacer"></div>
  <script type="text/javascript">
function showMe (it, box) {
  var vis = (box.checked) ? "block" : "none";
  document.getElementById(it).style.display = vis;
}
</script>