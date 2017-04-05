<?php
  include('../../admin/dbconnect.php');
echo $pid=$_GET['pid'];

$username = $_GET['username'];
echo $username;
if(isset($_GET['transnum'])){
        $transnum = $_GET['transnum'];
   echo $transnum;
  }
	$sql="INSERT INTO wishist (username, product_id) VALUES('$username', '$pid')";
			$res=executequery($sql);?>
<meta http-equiv="refresh" content="1; url=../index.php?page=reviewwishlist&transnum=<?php echo $transnum;?>&username=<?php echo $username;?>">

