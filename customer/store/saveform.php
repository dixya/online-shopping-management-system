<?php

require "../../admin/dbconnect.php";
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$cnum=$_POST['cnum'];
$transnum=$_POST['transnum'];
$username = $_POST['username'];
echo $transnum;
$address=$_POST['address'];
$deliveryaddress=$_POST['daddress'];
$date=$_POST['date'];
$country=$_POST['cntry'];
$city=$_POST['city'];
$postalcode=$_POST['post'];
$status='Pending';
$total=$_POST['total'];
//$dmethod=$_POST['sdsd'];
// $pmethod=$_POST['pmethod'];
// if($pmethod=='BDO'){
// $accountnum='2617 2008 1809 2224';
// }
// else if($pmethod=='Metro Bank'){
// $accountnum='1722 0629 1418 2308';
// }
// else if($pmethod=='Smart Padala'){
// $accountnum='1211 5623 1973 2189';
// }
// else if($pmethod=='Cash On Delivery'){
// $accountnum='Cash On Delivery';
// }
if($deliveryaddress){
	$one= mysql_query("INSERT INTO reservation (firstname, lastname, city, address, email, contact, confirmation, status, payable, date, delivery, username) 
	VALUES ('$fname','$lname','$city','$address','$email','$cnum','$transnum','$status','$total','$date','$deliveryaddress', '$username')");
}
else{
$one= mysql_query("INSERT INTO reservation (firstname, lastname, city, address, email, contact, confirmation, status, payable, date, delivery, username) 
	VALUES ('$fname','$lname','$city','$address','$email','$cnum','$transnum','$status','$total','$date','$address', '$username')");
}

header("location: print.php?transnum=$transnum");
echo $total;
$mail_To = $email;
$mail_Subject = "Order notification From Easy Shop";
$mail_Body = "First Name: $fname\n".
"Last Name: $lname\n".
"Email: $email \n".
"City: $city \n".
"Country: $country \n".
"Contact Number: $cnum\n".
"Total Amount: $total\n ".
"Postal Code : $postalcode\n ".
"Confirmation Number: $transnum\n ";
if($deliveryaddress){
	"Shipping Address: $deliveryaddress\n";

}
else{
	"Shipping Address: $address\n";

}
mail($mail_To, $mail_Subject, $mail_Body);


?>