<?php
require 'db_config.php';

session_start();
$uid = $_SESSION['uid'];
$username=$_SESSION['username'];

$item_no = $_GET['item_number'];
$item_transaction = $_GET['tx'];
$item_price = $_GET['amt'];
$item_currency = $_GET['cc'];

//Getting product details
$sql=mysql_query("select product,price,currency from producst where pid='$item_no'");
$row=mysql_fetch_array($sql);
$price=$row['price'];
$currency=$row['currency'];

//Rechecking the product details
if($item_price==$price && item_currency==$currency)
{

$result = mysql_query("INSERT INTO sales(pid, uid, saledate,transactionid) VALUES('$item_no', '$uid', NOW(),'$item_transaction')");
if($result){
  echo "<h1>Welcome, $username</h1>";
    echo '<h1>Payment Successful</h1>';
    echo "<b>Example Query</b>: INSERT INTO sales(pid, uid, saledate) VALUES('<font color='#f00;'>$item_no</font>', '<font color='#f00;'>$uid</font>', <font color='#f00;'>NOW()</font>)";
}else{
    echo "Payment Error";
}
}
else
{
echo "Payment Failed";
}
?>
