<!-- home slider start  -->
<?php echo $transnum;?>
<div class="slider">
	<div class="list_carousel responsive">
		<ul id="foo4">
			<li><a href="store/index.php?pid=51&transnum=<?php echo $transnum;?>&username=<?php echo $username;?>"><img src="images/slider/1.jpg" width="100%" height="100%" /></a></li>		
			<li><a href="store/index.php?pid=51&transnum=<?php echo $transnum;?>&username=<?php echo $username;?>"><img src="images/slider/2.jpg" width="100%" height="100%"/></a></li>
			<li><a href="store/index.php?pid=51&transnum=<?php echo $transnum;?>&username=<?php echo $username;?>"><img src="images/slider/3.jpg" width="100%" height="100%" /></a></li>
			<li><a href="store/index.php?pid=51&transnum=<?php echo $transnum;?>&username=<?php echo $username;?>"><img src="images/slider/4.jpg"width="100%" height="100%"/></a></li>
			<li><a href="store/index.php?pid=51&transnum=<?php echo $transnum;?>&username=<?php echo $username;?>"><img src="images/slider/5.jpg" width="100%" height="100%" /></a></li>
			<li><a href="store/index.php?pid=51&transnum=<?php echo $transnum;?>&username=<?php echo $username;?>"><img src="images/slider/6.jpg" width="100%" height="100%" /></a></li>
			<li><a href="store/index.php?pid=51&transnum=<?php echo $transnum;?>&username=<?php echo $username;?>"><img src="images/slider/7.jpg" width="100%" height="100%" /></a></li>
			<!--<li><a href=""><img src="images/slider/8.jpg" width="100%" height="100%"/></a></li>
			<li><a href=""><img src="images/slider/9.jpg" width="100%" height="100%"/></a></li>
			<li><a href=""><img src="images/slider/10.jpg" width="100%" height="100%" /></a></li>
			<li><a href=""><img src="images/slider/11.jpg" width="100%" height="100%" /></a></li>-->
		</ul>
		<div class="arrow">
			<a id="prev2" class="prev" href="#"><img src="images/prev_arrow.png" width="25px" height="25px"></a>&nbsp;
			<a id="next2" class="next" href="#"><img src="images/next_arrow.png" width="25px" height="25px"></a>
		</div>
	<div class="clear"></div>
	</div>
</div>
<!----slider end------>

<div class="clear"></div>
<!-----SPECIAL OCASSIONS---->
<div class="wrapper">
    <!--<div id="st-accordion" class="st-accordion">-->
  <ul>
    <li>
	<a href="#"><h1 align="center">Our Special Occassion Products!!!!!</h1><!--<span class="st-arrow">Open or Close</span></a>-->
    <div class="st-content">
            <p style="color: navy; font-size:20pt;">Dashain Offers</p>

    <?php $sql = "SELECT * FROM product ORDER BY rand() LIMIT 6";
    $res =executequery($sql);
    while($data = mysql_fetch_assoc($res)){?>
        <a href="store/orderpage.php?pid=<?php echo $data['product_id'];?>&transnum=<?php echo $transnum;?>"><img onmouseout="this.src='userfiles/catimages/productimg/<?php echo $data['product_top'];?>'" onmouseover="this.src='images/special/addtocart.png'" src="userfiles/catimages/productimg/<?php echo $data['product_top'];?>" alt="image">
			</a><span style="top:14px; left:-80px; position:relative;"><?php echo "$".$data['price'];?></span>
			<?php }?>			
	<p style="color: navy; margin-top:20px; font-size:20pt;">Tihar Special</p>
	 <?php $sql1 = "SELECT * FROM product ORDER BY rand() LIMIT 7";
    $res1 =executequery($sql1);
    while($data1 = mysql_fetch_assoc($res1)){?>
        <a href="store/orderpage.php?pid=<?php echo $data1['product_id'];?>&transnum=<?php echo $transnum;?>"><img onmouseout="this.src='userfiles/catimages/productimg/<?php echo $data1['product_top'];?>'" onmouseover="this.src='images/special/addtocart.png'" src="userfiles/catimages/productimg/<?php echo $data1['product_top'];?>" alt="image">
			</a><span style="top:14px; left:-80px; position:relative;"><?php echo "$".$data['price'];?></span>
			<?php }?>
 </div>
</li>

					</ul>
                </div>
            <!--</div>-->
			<div class="clear"></div>		
<!------menu like content---->		
<div class="cat_container">
	<div id="tabs" class="tabs">
		<nav>
			<ul>
				<li><a href="#section-1" class=""><span>New Arrivals</span></a></li>
				<li><a href="#section-2" class=""><span>Popular</span></a></li>
				<li><a href="#section-3" class=""><span>Featured</span></a></li>
				
			</ul>
		</nav>
		<div class="content">
			<section id="section-1">
			<?php 
$sqlmenu = "SELECT * FROM product WHERE status='1' ORDER BY product_id DESC LIMIT 6 ";
$resultmenu = executequery($sqlmenu);
// print_r($resultmenu);
$c=1;
while($data1=mysql_fetch_assoc($resultmenu)):
	// print_r($data1);
	 $id= $data1['product_id'];
	 $name=$data1['product_name'];
	 $price=$data1['price'];
						 $desc=$data1['product_desc'];
						 $img1=$data1['product_top'];
						 ?>
	<div class="mediabox">
			<a href="store/index.php?pid=<?php echo $id;?>&transnum=<?php echo $transnum;?>&username=<?php echo $username;?>"><img src="userfiles/catimages/productimg/<?php echo $img1;?>" alt="<?php echo $name;?>" width="251px" height="136px"/></a>
			<h3>
			<a href="store/index.php?pid=<?php echo $id;?>&transnum=<?php echo $transnum;?>&username=<?php echo $username;?>"><?php echo $name;?></a><span class="cost"><?php echo '$'.$price;?></span>
			</h3>
			<?php if($data1['qty']>0){?>
		                	<?php echo $data1['qty'];?> <span style='font-size:10pt; color: red;'>Available on Store</span><a href="store/orderpage.php?pid=<?php echo $data1['product_id'];?>&transnum=<?php echo $transnum;?>"><img src="images/addtocart-green.png" width="100" height="30" align="middle"></a><?php }
		                	else {echo "<span style='font-size:10pt; color: red;'>Out of stock</span>";}?>
		                				<p style="margin-top:10px;"><?php echo $desc;?></p>

	 	
	</div>
	<?php endwhile;?>
</section>
			<section id="section-2">
<?php $cmtcountsql = " SELECT DISTINCT id_post from comments ORDER BY(SELECT count(id_post) as count FROM comments) DESC LIMIT 6";
  $cmt_res = executequery($cmtcountsql);
  while($data_cmt =mysql_fetch_assoc($cmt_res)):
  $prd_id = $data_cmt['id_post'];
  $sqlmenu = " SELECT * FROM product WHERE status='1' AND product_id ='$prd_id'";
  $resultmenu = executequery($sqlmenu);
  while($data1=mysql_fetch_assoc($resultmenu)):
// print_r($data1);
 $id= $data1['product_id'];
 $name=$data1['product_name'];
 $price=$data1['price'];
 $desc=$data1['product_desc'];
 $img1=$data1['product_top'];
  ?>
<div class="mediabox">
<a href="store/index.php?pid=<?php echo $id; ?>"><img src="userfiles/catimages/productimg/<?php echo $img1;?>" alt="<?php echo $name;?>" width="251px" height="136px"/></a>
<h3><a href="store/index.php?pid=<?php echo $id; ?>"><?php echo $name;?></a></h3>
<?php if($data1['qty']>0){?>
		                	<?php echo $data1['qty'];?><span style='font-size:10pt; color: red;'>Available on Store</span><a href="store/orderpage.php?pid=<?php echo $data1['product_id'];?>&transnum=<?php echo $transnum;?>"><img src="images/addtocart-green.png" width="100" height="30" align="middle"></a><?php }
		                	else {echo "<span style='font-size:10pt; color: red;'>Out of stock</span>";}?>
		                				<p style="margin-top:10px;"><?php echo $desc;?></p>
</div>
<?php endwhile; endwhile;?>
</section>
			<section id="section-3">
			<?php 
$sqlmenu = "SELECT * FROM product WHERE status='1' ORDER BY rand() DESC LIMIT 6 ";
$resultmenu = executequery($sqlmenu);
// print_r($resultmenu);
$c=1;
while($data1=mysql_fetch_assoc($resultmenu)):
	// print_r($data1);
	 $id= $data1['product_id'];
	 $name=$data1['product_name'];
	 $price=$data1['price'];
						 $desc=$data1['product_desc'];
						 $img1=$data1['product_top'];
						 ?>
	<div class="mediabox">
			<a href="store/index.php?pid=<?php echo $id;?>&transnum=<?php echo $transnum;?>&username=<?php echo $username;?>"><img src="userfiles/catimages/productimg/<?php echo $img1;?>" alt="<?php echo $name;?>" width="251px" height="136px"/></a>
			<h3>
			<a href="store/index.php?pid=<?php echo $id;?>&transnum=<?php echo $transnum;?>&username=<?php echo $username;?>"><?php echo $name;?></a><span class="cost"><?php echo '$'.$price;?></span>
			</h3>
			<?php if($data1['qty']>0){?>
		                	<?php echo $data1['qty'];?> <span style='font-size:10pt; color: red;'>Available on Store</span><a href="store/orderpage.php?pid=<?php echo $data1['product_id'];?>&transnum=<?php echo $transnum;?>"><img src="images/addtocart-green.png" width="100" height="30" align="middle"></a><?php }
		                	else {echo "<span style='font-size:10pt; color: red;'>Out of stock</span>";}?>
		                				<p style="margin-top:10px;"><?php echo $desc;?></p>

	 	
	</div>
	<?php endwhile;?>
</section>
			
		</div><!-- /content -->
	</div><!-- /tabs -->
</div>
<!--end menu like content-->

<div class="clear"></div>
<div class="brand">
	<div class="brand_title"><img src="images/brands.png"></div>

	<div class="brand_name">
	<?php $brand_sql="SELECT * FROM brand ORDER BY rand() LIMIT 10";
		 $brand_res = executequery($brand_sql);
		 while($brand_data = mysql_fetch_assoc($brand_res)):
		 $brand_name = $brand_data['brand_name'];
		 $brand_image=$brand_data['brand_image'];?>
		<div class="box">
			<a href="index.php?page=brand&brandname=<?php echo $brand_name;?>&brand_img=<?php echo $brand_image;?>"><img src="userfiles/brandimage/<?php echo $brand_image;?>"></a>
		</div>
			<?php  endwhile;?>	
	</div>
</div>
<div class="clear"></div>
		
<!---grid gallery-->
<div id="grid-gallery" class="grid-gallery">
<?php 
$sqlmenu1 = "SELECT * FROM product WHERE status='1' ORDER BY rand() ";
$resultmenu1 = executequery($sqlmenu1);
// print_r($resultmenu);
$c=1;?>
<section class="grid-wrap">
					<ul class="grid">
						<li class="grid-sizer"></li><!-- for Masonry column width -->
						
<?php
while($data2=mysql_fetch_assoc($resultmenu1)){
	// print_r($data1);
	 $id= $data2['product_id'];
	 $name=$data2['product_name'];
	 $price=$data2['price'];
						 $desc=$data2['product_desc'];
						 $img1=$data2['product_top'];?>
						 <li>
							<figure>
									<img src="userfiles/catimages/productimg/<?php echo $img1;?>">			<!-- <img src="images/grid1.jpg" alt="img01"/> -->
								<figcaption><h3><?php echo $name;?></h3><p><?php echo $desc;?></p></figcaption>
							</figure>
						</li>
						<?php }?>
						
					</ul>
				</section><!-- // grid-wrap -->
				<section class="slideshow">
				<?php 
$sqlmenu2 = "SELECT * FROM product WHERE status='1' ORDER BY rand() ";
$resultmenu2 = executequery($sqlmenu2);
// print_r($resultmenu);
$c=1;?>
					<ul>
					<?php
while($data3=mysql_fetch_assoc($resultmenu2)){
	// print_r($data1);
	 $id= $data3['product_id'];
	 $name=$data3['product_name'];
	 $price=$data3['price'];
						 $desc=$data3['product_desc'];
						 $img1=$data3['product_top'];?>
						<li>
							<figure>
								<figcaption>
<h3>									
<a href="store/index.php?pid=<?php echo $id;?>&transnum=<?php echo $transnum;?>&username=<?php echo $username;?>">	
<?php echo $name;?></a>	</h3>							
<p><?php echo $desc;?></p>
								</figcaption>
<img src="userfiles/catimages/productimg/<?php echo $img1;?>">							</figure>
						</li>
						<?php }?>
						<!-- <li>
							<figure>
								<figcaption>
									<h3>Vice velit chia</h3>
									<p>Chillwave Echo Park Etsy organic Cosby sweater seitan authentic pour-over. Occupy wolf selvage bespoke tattooed, cred sustainable Odd Future hashtag butcher.</p>
								</figcaption>
								<img src="img/large/2.png" alt="img02"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Brunch semiotics</h3>
									<p>IPhone PBR polaroid before they sold out meh you probably haven't heard of them leggings tattooed tote bag, butcher paleo next level single-origin coffee photo booth.</p>
								</figcaption>
								<img src="img/large/3.png" alt="img03"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Chillwave nihil occupy</h3>
									<p>Vice cliche locavore mumblecore vegan wayfarers asymmetrical letterpress hoodie mustache. Shabby chic lomo polaroid, scenester 8-bit Portland Pitchfork VHS tote bag.</p>
								</figcaption>
								<img src="img/large/4.png" alt="img04"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Kale chips lomo biodiesel</h3>
									<p>Chambray Schlitz pug YOLO, PBR Tumblr semiotics. Flexitarian YOLO ennui Blue Bottle, forage dreamcatcher chillwave put a bird on it craft beer Etsy.</p>
								</figcaption>
								<img src="img/large/5.png" alt="img05"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Exercitation occaecat</h3>
									<p>Cosby sweater hella lomo Thundercats VHS occupy High Life. Synth pop-up readymade single-origin coffee, fanny pack tousled retro. Fingerstache mlkshk ugh hashtag, church-key ethnic street art pug yr.</p>
								</figcaption>
								<img src="img/large/6.png" alt="img06"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Selfies viral four</h3>
									<p>Ethnic readymade pug, small batch XOXO Odd Future normcore kogi food truck craft beer single-origin coffee banh mi photo booth raw denim. XOXO messenger bag pug VHS. Forage gluten-free polaroid, twee hoodie chillwave Helvetica.</p>
								</figcaption>
								<img src="img/large/1.png" alt="img01"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Photo booth skateboard</h3>
									<p>Thundercats pour-over four loko skateboard Brooklyn, Etsy sriracha leggings dreamcatcher narwhal authentic 3 wolf moon synth Portland. Shabby chic photo booth Blue Bottle keffiyeh, McSweeney's roof party Carles.</p>
								</figcaption>
								<img src="img/large/2.png" alt="img02"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Ex fashion axe</h3>
									<p>Ennui Blue Bottle shabby chic, organic butcher High Life tattooed meggings jean shorts Brooklyn sartorial polaroid. Cray raw denim +1, bespoke High Life Odd Future banh mi chillwave Marfa kogi disrupt paleo direct trade 90's Godard. </p>
								</figcaption>
								<img src="img/large/3.png" alt="img03"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Thundercats next level</h3>
									<p>Typewriter authentic PBR, iPhone mixtape fixie post-ironic fingerstache Pitchfork artisan. Wayfarers master cleanse occupy, Tonx lo-fi swag Truffaut irony whatever Blue Bottle readymade PBR gluten-free. Lomo Pinterest Banksy fap. Retro ennui you probably haven't heard of them iPhone, PBR fashion axe polaroid.</p>
								</figcaption>
								<img src="img/large/4.png" alt="img04"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Bushwick selvage synth</h3>
									<p>Schlitz deserunt pour-over consectetur. Selfies plaid asymmetrical farm-to-table, cred gastropub photo booth narwhal non roof party velit raw denim slow-carb meggings pug. Tempor post-ironic seitan cliche bicycle rights. Meh viral Williamsburg, quinoa 8-bit kale chips YOLO Marfa accusamus.</p>
								</figcaption>
								<img src="img/large/5.png" alt="img05"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Bottle wayfarers locavore</h3>
									<p>Aliqua High Life art party fixie farm-to-table. Kitsch Echo Park shabby chic, narwhal fugiat Cosby sweater asymmetrical gastropub tofu. Authentic minim Pinterest Blue Bottle beard, aliqua chia XOXO dolor freegan banh mi vegan fugiat.</p>
								</figcaption>
								<img src="img/large/1.png" alt="img01"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Letterpress asymmetrical</h3>
									<p>Pickled hoodie Pinterest 90's proident church-key chambray. Salvia incididunt slow-carb ugh skateboard velit, flannel authentic hoodie lomo fixie photo booth farm-to-table. Minim meggings Bushwick, semiotics Vice put a bird.</p>
								</figcaption>
								<img src="img/large/1.png" alt="img01"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Vice velit chia</h3>
									<p>Tattooed assumenda chambray cray officia. 90's mollit ethnic church-key ex eu pop-up gentrify. Tonx raw denim eu, bitters nesciunt distillery Neutra pop-up. Drinking vinegar Helvetica Truffaut tattooed.</p>
								</figcaption>
								<img src="img/large/2.png" alt="img02"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Brunch semiotics</h3>
									<p>Gentrify High Life adipisicing, duis slow-carb kogi Tumblr raw denim freegan Echo Park. Fingerstache laboris pork belly messenger bag, you probably haven't heard of them vegan twee Intelligentsia Vice Etsy pickled put a bird on it Godard roof party. Meggings small batch dreamcatcher velit.</p>
								</figcaption>
								<img src="img/large/3.png" alt="img03"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Chillwave nihil occupy</h3>
									<p>Marfa exercitation non, beard +1 hashtag cardigan gluten-free mixtape church-key ugh eu Portland leggings. Ennui farm-to-table fingerstache keytar Echo Park tattooed. Seitan qui artisan, aliquip cupidatat sunt Portland wayfarers duis.</p>
								</figcaption>
								<img src="img/large/4.png" alt="img04"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Kale chips lomo biodiesel</h3>
									<p>Lomo church-key whatever, seitan laborum drinking vinegar lo-fi semiotics nihil meh. Skateboard irure before they sold out Banksy. Narwhal High Life lomo aliqua drinking vinegar. PBR&B placeat proident, craft beer forage DIY nostrud meh flexitarian keytar Helvetica.</p>
								</figcaption>
								<img src="img/large/5.png" alt="img05"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Exercitation occaecat</h3>
									<p>Skateboard Truffaut bicycle rights seitan normcore. Culpa lo-fi ennui, Pinterest before they sold out Echo Park roof party sapiente aesthetic consequat Truffaut freegan voluptate. Kogi banh mi vero nihil, freegan gluten-free cliche. Forage Etsy laboris anim normcore, McSweeney's ex.</p>
								</figcaption>
								<img src="img/large/6.png" alt="img06"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Selfies viral four</h3>
									<p>Viral roof party locavore flexitarian nihil fanny pack actually Odd Future anim commodo. Sunt yr aute, enim quis plaid sartorial duis leggings lo-fi gluten-free. Tote bag flexitarian pug stumptown, Cosby sweater try-hard ethnic scenester. Mumblecore +1 hoodie accusamus skateboard slow-carb, Thundercats Godard placeat craft beer meh enim trust fund.</p>
								</figcaption>
								<img src="img/large/1.png" alt="img01"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Photo booth skateboard</h3>
									<p>Culpa pour-over cray nesciunt dreamcatcher. Meggings distillery cillum raw denim voluptate, single-origin coffee lo-fi ethical iPhone four loko nihil salvia. Biodiesel ea Intelligentsia quis deep v, American Apparel trust fund slow-carb synth semiotics quinoa Brooklyn pour-over nulla Godard.</p>
								</figcaption>
								<img src="img/large/2.png" alt="img02"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Ex fashion axe</h3>
									<p>Bespoke irony tousled nihil flexitarian, salvia tempor nostrud Bushwick hashtag Austin ethnic disrupt. Beard Helvetica nihil, chia craft beer Wes Anderson keytar dolore. Irure incididunt flexitarian photo booth cillum, YOLO deserunt Brooklyn artisan. Brunch assumenda irony, Blue Bottle roof party DIY ullamco quis.</p>
								</figcaption>
								<img src="img/large/3.png" alt="img03"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Thundercats next level</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea.</p>
								</figcaption>
								<img src="img/large/4.png" alt="img04"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Bushwick selvage synth</h3>
									<p>Ethical Truffaut tofu food truck cred cornhole. Irure umami Austin cornhole blog ethical. Aliqua yr Truffaut, adipisicing hashtag Shoreditch eiusmod tempor literally vinyl.</p>
								</figcaption>
								<img src="img/large/5.png" alt="img05"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Bottle wayfarers locavore</h3>
									<p>Pork belly irony Shoreditch fashion axe DIY. Portland banjo irony, squid gentrify Austin fixie church-key magna. Marfa artisan Echo Park, McSweeney's banjo sunt keytar tofu. Brooklyn PBR single-origin coffee disrupt polaroid ut, gluten-free XOXO plaid magna.</p>
								</figcaption>
								<img src="img/large/1.png" alt="img01"/>
							</figure>
						</li> -->
					</ul>
					<nav>
						<span class="icon nav-prev"></span>
						<span class="icon nav-next"></span>
						<span class="icon nav-close"></span>
					</nav>
					<div class="info-keys icon">Navigate with arrow keys</div>
				</section><!-- // slideshow -->
			</div><!-- // grid-gallery -->
}


<div class="clear"></div>	
			
		




