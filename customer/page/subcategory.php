<?php
echo $transnum;
$username = $_SESSION['username'];
echo $username;
$subcatid=$_GET['subcatid'];
 $sql1="SELECT * FROM subcategory WHERE subcat_id=$subcatid AND status='1'";
 		 $result=executequery($sql1);
 		 $data=mysql_fetch_assoc($result);
 		 $sub_image=$data['subcat_image'];
 		 $sub_desc=$data['subcat_desc'];
 		 $sub_name=$data['subcat_name'];
 		 $cat_id = $data['cat_id'];?>
 		 	

<div class="category">
<div class="cat_banner">
		<img src="userfiles/catimages/<?php echo $sub_image;?>" width="980px" height="400px" alt="<?php echo $sub_name;?>" />	
	<h1><?php echo $sub_name;?></h1>
	<h2><?php echo $sub_desc;?></h2>
</div>
<div class="clear"></div>
<!-- <div class="cat_content1">
	<div class="brand">
	<div class="brand_title"><img src="images/brands.png"></div>

	<div class="brand_name"><img src="images/brand.jpg"></div>
</div>
</div> -->
<div class="brand">
	<div class="brand_title"><img src="images/brands.png"></div>

	<div class="brand_name">

	<?php
		 $sql="SELECT cat_name FROM category WHERE cat_id='$cat_id'";
		$result=executequery($sql);
		while($data=mysql_fetch_assoc($result)){
			$cname = $data['cat_name'];
	 $brand_sql="SELECT * FROM brand WHERE category='$cname' LIMIT 10";
		 $brand_res = executequery($brand_sql);
		 while($brand_data = mysql_fetch_assoc($brand_res)):
		 $brand_name = $brand_data['brand_name'];
		 $brand_image=$brand_data['brand_image'];?>
		<div class="box">
			<a href="index.php?page=brand&brandname=<?php echo $brand_name;?>&brand_img=<?php echo $brand_image;?>&transnum=<?php echo $transnum;?>"><img src="userfiles/brandimage/<?php echo $brand_image;?>"></a>
		</div>
			<?php  endwhile; }?>	
	</div>
</div>
<?php $sql2="SELECT * FROM product WHERE subcat_id=$subcatid AND status='1'";
	$result_prod=executequery($sql2);?> 
							
<div class="container">	
			<div id="cbp-pgcontainer" class="cbp-pgcontainer">
				<ul class="cbp-pggrid">
				<?php while($data_prod=mysql_fetch_array($result_prod)):
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
								<a href="store/index.php?pid=<?php echo $prodid; ?>&transnum=<?php echo $transnum;?>&username=<?php echo $username;?>">
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
								<?php echo '<a rel="facebox" href="store/orderpage.php?pid='.$prodid.'&trnasnum='.$transnum.'"><li class="cbp-pgoptcart"></li></a>';?>

							</ul><!-- cbp-pgoptions -->
						</div><!-- cbp-pgcontent -->
						<div class="pginfo"><a href="store/index.php?pid=<?php echo $prodid; ?>&transnum=<?php echo $transnum;?>&username=<?php echo $username;?>">
							<h3><?php echo $prod_name;?></h3>
							<span class="pgprice">$<?php echo $price;?></span>
							<?php if($data['qty']>0){?></a>
		                	<li>Only<?php echo $data['qty'];?> available..<a href=""><h3>ADD TO CART</h3></a><?php }
		                	else {echo "Out of stock";}?>
							
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
				
