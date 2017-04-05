<?php
include('admin/dbconnect.php');
$min_price =  $_REQUEST["min_price"];
$max_price =  $_REQUEST["max_price"];
echo " min : $min_price.....max : $max_price";
$sql_prod = "SELECT * FROM product WHERE price BETWEEN ".$min_price." AND ".$max_price;
$res_prod = executequery($sql_prod);
?>
<h2>Product between <?php echo $min_price.'and'.$max_price.'::::'; ?></h2>
	<?php 
	while($data1 = mysql_fetch_assoc($res_prod)){?>
	<?php echo "Name:".$data1['product_name'];?>---<?php echo "Price:".$data1['price'];?></br>
	<img src="userfiles/catimages/productimg/<?php echo $data1['product_front'];?>" height="100px" width="100px">
	<?php } ?>
		