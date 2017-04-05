<?php
include('../admin/dbconnect.php');
$min_price =  $_REQUEST["min_price"];
$max_price =  $_REQUEST["max_price"];
$transnum =  $_REQUEST["transnum"];

?>
<h2>Product between <?php echo $min_price.'and'.$max_price; ?></h2> 
	<div id="cbp-pgcontainer" class="cbp-pgcontainer">
			<ul class="cbp-pggrid">	
 			<?php echo $transnum;
			$sql_prod = "SELECT * FROM product WHERE price BETWEEN ".$min_price." AND ".$max_price;
			$res_prod = executequery($sql_prod);
			$rows=mysql_num_rows($res_prod);
			if($rows>=1){
	while($data = mysql_fetch_assoc($res_prod)){
					
				 /* <img src="userfiles/catimages/productimg/<?php echo $data['product_top']; ?>" height="360" width="150"><br>
		                 <ul  class="prod"><li ><?php echo $data['product_name'];?></li>
		                	<li>Price=Rs.<?php echo $data['price'];?></li>
		                	<?php if($data['qty']>0){?>
		                	<li>Only<?php echo $data['qty'];?> available..<a href=""><h3>ADD TO CART</h3></a><?php }
		                	else {echo "Out of stock";}?></li>
		                </ul>
		                 */?>
							  <?php $prodid = $data['product_id'];
							  $prod_img = $data['product_top'];
							  $prod_img1 = $data['product_front'];
							  $price = $data['price'];
							  $prod_name = $data['product_name'];?>
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
											</div><!--cbp-pgitem-flip-->
										</div><!-- /cbp-pgitem -->
										<ul class="cbp-pgoptions">
			 								<li class="cbp-pgoptfav">Favorite</li>
											<?php echo '<a rel="facebox" href="store/orderpage.php?pid='.$prodid.'&trnasnum='.$transnum.'"><li class="cbp-pgoptcart"></li></a>';?>

										</ul><!-- cbp-pgoptions -->
									</div><!-- cbp-pgcontent -->
									<div class="pginfo"><a href="store/index.php?pid=<?php echo $prodid; ?>">
										<h3><?php echo $prod_name;?></h3>
										<span class="pgprice">$<?php echo $price;?></span></a>
									</div>
								</li>
								<?php }}?>
				</ul><!-- /cbp-pggrid -->
		</div><!-- /cbp-pgcontainer -->
		