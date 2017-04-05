<?php 
$pid = $_GET['prodid'];
$sql = "SELECT * FROM product WHERE product_id=$pid";
$result = executequery($sql);
$data = mysql_fetch_assoc($result);
$subid = $data['subcat_id'];
$photot= $data['product_top'];
$photof= $data['product_front'];
$photol= $data['product_left'];
$photor= $data['product_right'];
$name= $data['product_name'];
$brand =$data['brand'];
$price= $data['price'];
$qty= $data['qty'];
$desc=$data['product_desc'];

?>


 <?php /* <style type="text/css">
#gallery_01 img{border:2px solid white;width: 96px;}
.active img{border:2px solid #333 !important;}
</style>*/ ?>



    <?php $sql1 = "SELECT * FROM subcategory WHERE subcat_id= $subid";
       $result1 = executequery($sql1);
       $data1 = mysql_fetch_assoc($result1);
       $catid = $data1['cat_id'];
        ?>
    <?php $sql2 = "SELECT * FROM category WHERE cat_id= $catid";
       $result2 = executequery($sql2);
       $data2 = mysql_fetch_assoc($result2);
     ?> 

    
    <p class="tree"><a href="index.php?page=category&catid=<?php echo $data2['cat_id']; ?>"><?php echo $data2['cat_name']; ?></a>  >  <a href="index.php?page=subcategory&subcatid=<?php echo $data1['subcat_id']; ?>"><?php echo $data1['subcat_name']; ?></a>  >  <?php  echo $data['product_name'];?></p>
 <div class="product_container">
  <div class="product_display">
<div>
<a title="Click to Zoom" class="fancybox" rel="pita-gallery" href="userfiles/catimages/productimg/<?php echo $photot;?>">
<img id="img1" src="userfiles/catimages/productimg/<?php echo $photot;?>" data-zoom-image="userfiles/catimages/productimg/<?php echo $photot;?>" width="493px" height="274px"/>
</a>
<div id="gallery_01">
<a  href="#" class="active" data-image="userfiles/catimages/productimg/<?php echo $photot;?>"
data-zoom-image="userfiles/catimages/productimg/<?php echo $photot;?>">
<img src="userfiles/catimages/productimg/<?php echo $photot;?>" width="96px" height="86px" /></a>
<a  href="#" data-image="userfiles/catimages/productimg/<?php echo $photof;?>" data-zoom-image="userfiles/catimages/productimg/<?php echo $photof;?>">
<img src="userfiles/catimages/productimg/<?php echo $photof;?>" width="96px" height="86px" /></a>
<a href="#" data-image="userfiles/catimages/productimg/<?php echo $photol;?>" data-zoom-image="userfiles/catimages/productimg/<?php echo $photol;?>">
<img src="userfiles/catimages/productimg/<?php echo $photol;?>"  width="96px" height="86px" /></a>
<a href="#" data-image="userfiles/catimages/productimg/<?php echo $photor;?>" data-zoom-image="userfiles/catimages/productimg/<?php echo $photor;?>">
<img src="userfiles/catimages/productimg/<?php echo $photor;?>" width="96px" height="86px" /></a>
</div>
</div>
</div>

 <div class="product_overview">
      
      <ul>
        <h1><li>Title of product:</li></h1>
             <p><strong>Short features:</strong></p>


        <li>Brand:<?php echo $name; ?></li>
        <li>Buy Now:</li>
        <li>Price:</li>
        <li>Model:</li>
        <li>Brand:</li>
         <li class="color"><span>Price</span>$<?php echo $data['price']; ?></li>
      <li><span>Brand</span><?php echo $data['brand']; ?></li>
      <li class="color"><span>Model</span><?php echo $data['model']; ?></li>
      <li><span>Configuration</span><?php echo $data['configuration']; ?></li>

      </ul>
    </div>
    <div class="clear"></div>
    <div class="product_desc">
      <h2>Product Description</h2>
      <p>hhhhhhhhhhhhhhhhhhhhhhhhhhvnnnnnnnnnnnnnnnnnnn          nvsiiiiiiiufhsuirghuigbbbbbbbbbbbbbbbbbgggggggggggggg</p>
           <a href="cart.php"><button>Add to Cart</button></a><img src="images/carts.gif" alt="" width="16" height="24" class="carts" />
     <a href="#" class="comments">View Comments (27)</a>

    </div>
  </div>

    </div>
   
   </div>
   <img src="images/title6.gif" alt="" width="537" height="23" class="pad25" />
   <?php    $sql_sim = "SELECT * FROM product WHERE subcat_id=$subid and product_id<>$pid";
      $result_sim = executequery($sql_sim);
      while($data_sim = mysql_fetch_assoc($result_sim)) {
    ?>
   <div class="stuff">
    <div class="item">
     <img src="userfiles/catimages/productimg/<?php echo $data_sim['product_image']; ?>" alt="" width="124" height="90" />
     <a href="index.php?page=single&prodid=<?php echo $data_sim['product_id']; ?>" class="name"><?php echo $data_sim['product_name']; ?></a>
     <span>$<?php echo $data_sim['price']; ?></span>
     <a href="#"><img src="images/tcart.gif" alt="" width="71" height="19" /></a>
    </div>
    <?php }
    ?>

   </div>
  </div>
  </div>
  </div>
 </div>  