<?php $transnum=$_SESSION['SESS_MEMBER_ID'];
$catid=$_GET['cat_id'];
 $sql1="SELECT * FROM category WHERE cat_id=$catid AND status='1'";
 		 $result=executequery($sql1);
 		 $data=mysql_fetch_assoc($result);
 		 $image=$data['cat_image'];
 		 $desc=$data['cat_desc'];
 		 $name=$data['cat_name'];
 		 ?>
 		 <link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>

<div class="category">
<div class="cat_banner">
		<img src="userfiles/catimages/<?php echo $image;?>" width="980px" height="400px" alt="<?php echo $name;?>" />	
	<h1><?php echo $name;?></h1>
	<h2><?php echo $desc;?></h2>
</div>
<div class="clear"></div>
<div class="cat_content1">
	<div class="brand">
	<div class="brand_title"><img src="images/brands.png"></div>

	<div class="brand_name"><img src="images/brand.jpg"></div>
</div>
</div>
<?php $sql2="SELECT * FROM subcategory WHERE cat_id=$catid AND status='1'";
 		 $result1=executequery($sql2);?>

<div class= "cat_content1">
<ul>
 		 <?php 	while( $data1=mysql_fetch_assoc($result1)):
 		 $sub_image=$data1['subcat_image'];
 		$sub_id=$data1['subcat_id'];
 		 $sub_name=$data1['subcat_name'];
 		 ?>
 		 <li>
 		 <a href="index.php?page=subcategory&subcatid=<?php echo $sub_id;?>">
		<img src="userfiles/catimages/<?php echo $sub_image;?>" width="980px" height="150px" alt="<?php echo $sub_name;?>" />	
	<h1><?php echo $sub_name;?></h1></a>
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
								<a href="store/index.php?pid=<?php echo $prodid; ?>">
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
					<?php endwhile;?>

			</div><!-- /cbp-pgcontainer -->
		</div>	
		</div> 
							
<script src="js/cbpShop.min.js"></script>
<script>
			var shop = new cbpShop( document.getElementById( 'cbp-pgcontainer' ) ); 
</script>