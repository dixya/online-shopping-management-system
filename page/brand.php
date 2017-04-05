<?php //$transnum=$_SESSION['SESS_MEMBER_ID'];
$brandname=$_GET['brandname'];
$brand_img=$_GET['brand_img'];
?>
<div class="category">
<div class="cat_banner">
	<img src="userfiles/brandimage/<?php echo $brand_img;?>" width="980px" height="400px" alt="<?php echo $brandname;?>" />	
	<h1><?php echo $brandname;?></h1>
</div>
<div class="clear"></div>							
<div class="container">	
	<div id="cbp-pgcontainer" class="cbp-pgcontainer">
		<ul class="cbp-pggrid">
			<?php $prod_sql = "SELECT * FROM product WHERE brand=$brandname AND status='1'";
 		 			$prod_result = executequery($prod_sql);
					while($data_prod = mysql_fetch_assoc($prod_result)):
					$prodid = $data_prod['product_id'];
					$prod_img = $data_prod['product_top'];
					$prod_img1 = $data_prod['product_front'];
					$price = $data_prod['price'];
					$prod_name = $data_prod['product_name'];?>
					<li>
						<div class="cbp-pgcontent">
							<span class="cbp-pgrotate">Rotate Item</span>
							<div class="cbp-pgitem">
								<div class="cbp-pgitem-flip">
									<a href="store/index.php?pid=<?php echo $prodid; ?>">
										<img src="userfiles/catimages/productimg/<?php echo $prod_img;?>" width="360px" height="150px" />
										<?php if($prod_img1):?>
										<img src="userfiles/catimages/productimg/<?php echo $prod_img1;?>" width="360px" height="150px"/>
										<?php endif;?>
									</a>
								</div>
							</div><!-- /cbp-pgitem -->
							<ul class="cbp-pgoptions">
								<!--<li class="cbp-pgoptcompare">Compare</li>-->
 								<li class="cbp-pgoptfav">Favorite</li>
								<?php echo '<a rel="facebox" href="store/orderpage.php?id='.$prodid.'&trnasnum='.$transnum.'"><li class="cbp-pgoptcart"></li></a>';?>
							</ul><!-- cbp-pgoptions -->
						</div><!-- cbp-pgcontent -->
						<div class="pginfo"><a href="store/index.php?pid=<?php echo $prodid; ?>">
							<h3><?php echo $prod_name;?></h3>
							<span class="pgprice">$<?php echo $price;?></span></a>
						</div>
					</li>
					<?php endwhile;?>
		</ul><!-- /cbp-pggrid -->
	</div><!-- /cbp-pgcontainer -->
</div>	
</div> 
<script src="js/cbpShop.min.js"></script>
<script>
			var shop = new cbpShop( document.getElementById( 'cbp-pgcontainer' ) ); 
</script>