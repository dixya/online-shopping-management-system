<?php 
$pid= $_GET['pid']; 
if(isset($_GET['transnum'])){
        $transnum = $_GET['transnum'];
 
  }
   if(isset($_GET['username'])){
        echo $username = $_GET['username'];
  }?>
  <div class="category">
  <table border="1" cellspacing="5" cellpadding="10" align="center" width="100%" style="margin-top:60px;">
 <tr align="center">
 <th colspan=6 align="center" style="color:navy; font-size:18pt;">MY WISHLIST</th></tr>
 <tr><th>S.N</th>
 <th>Product-name</th> 
 <th> Unit Price</th>
 <th>Remove from Wishlist</th>
 </tr>
  <?php
 $w_sql="SELECT * FROM wishist WHERE username='$username'";
 $w_res=executequery($w_sql);
 $sn =1;
 while($w_pid=mysql_fetch_assoc($w_res)){
  $wpid = $w_pid['product_id'];
  $psql = "SELECT * FROM product WHERE product_id='$wpid'";
  $pres = executequery($psql);?>
  <?php
   while($pdata = mysql_fetch_assoc($pres)){
    $pname = $pdata['product_name'];
    $price = $pdata['price'];?>
     <tr align="center">
     <td><?php echo $sn;?></td>
     <td><?php echo $pdata['product_name'];?></td>
      <td><?php echo $pdata['price'];?></td>
        <td><a href="deletewishlist.php?id=<?php echo $pdata['product_id'];?>" class="delbutton" title="Click To Delete"><img src="images/delete.png"></a></td>
      </tr>
   <?php $sn++;
    } 
    }
    ?>
    </table>
    </div>