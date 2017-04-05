<?php 
$id = $_GET['id'];
 $sql1 = "SELECT * FROM shop WHERE id=$id AND status='1'";
 		 $result1=executequery($sql1);
 		 ?>
 <link rel="stylesheet" type="text/css" href="css/component.css" />
<script src="js/modernizr.custom.js"></script>
<div class="category">
<div class="cat_banner">
		<img src="userfiles/shopimages/<?php echo $image;?>" width="980px" height="400px" alt="<?php echo $name;?>" />	
	<h1><?php echo $name;?></h1>
	<h2><?php echo $desc;?></h2>
</div>
<div class="clear"></div>

<div class= "cat_content1">
<ul>
 		 <?php 	while( $data1=mysql_fetch_assoc($result1)):
 		  $image=$data1['image'];
 		 $desc=$data1['desc'];
 		 $name=$data1['name'];
 		 ?>
 		 <li>
 		 <a href="index.php?page=shop&id=<?php echo $id;?>&transnum=<?php echo $transnum;?>">
		<img src="userfiles/shopimages/<?php echo $image;?>" width="980px" height="150px" alt="<?php echo $name;?>" />	
	<h1><?php echo $name;?></h1></a>
	</li>
	</ul>
</div>
							
<div class="container">	
			<div id="cbp-pgcontainer" class="cbp-pgcontainer">
				<ul class="cbp-pggrid">
				<?php  $sql3="SELECT * FROM product WHERE subcat_id=$sub_id AND status='1' ORDER BY product_id DESC LIMIT 4" ;
					$result_prod=executequery($sql3); 
				while($data_prod=mysql_fetch_array($result_prod)):
					  $prodid=$data_prod['product_id'];
					  $prod_img = $data_prod['product_top'];
					  $prod_img1 = $data_prod['product_front'];
					  $price = $data_prod['price'];
					  $prod_name = $data_prod['product_name'];?>
					<li>
						<div class="cbp-pgcontent">
							<span class="cbp-pgrotate">Rotate Item</span>
							<div class="cbp-pgitem">
								<div class="cbp-pgitem-flip">
								<a href="store/index.php?pid=<?php echo $prodid; ?>&transnum=<?php echo $transnum;?>">
									<img src="userfiles/catimages/productimg/<?php echo $prod_img;?>" width="360px" height="150px" />
									<?php if($prod_img1):?>
									<img src="userfiles/catimages/productimg/<?php echo $prod_img1;?>" width="360px" height="150px"/>
								<?php endif;?>
								</a>
								</div>
							</div><!-- /cbp-pgitem -->
							<ul class="cbp-pgoptions">
<!-- 								<li class="cbp-pgoptcompare">Compare</li>-->
 								<li class="cbp-pgoptfav">Favorite</li>
								
								<?php echo '<a rel="facebox" href="store/orderpage.php?id='.$prodid.'&transnum='.$transnum.'"><li class="cbp-pgoptcart"></li></a>';?>

							</ul><!-- cbp-pgoptions -->
						</div><!-- cbp-pgcontent -->
						<div class="pginfo"><a href="store/index.php?pid=<?php echo $prodid; ?>&transnum=<?php echo $transnum;?>">
							<h3><?php echo $prod_name;?></h3>
							<span class="pgprice">$<?php echo $price;?></span></a>
						</div>
					</li>
				<?php endwhile;?>
				</ul><!-- /cbp-pggrid -->
					<?php endwhile;?>

			</div><!-- /cbp-pgcontainer -->
		</div>	
		</div> 
							
<script src="js/cbpShop.min.js"></script>
<script>
			var shop = new cbpShop( document.getElementById( 'cbp-pgcontainer' ) ); 
</script>