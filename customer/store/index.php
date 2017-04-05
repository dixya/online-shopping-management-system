<?php
	require_once('../../admin/dbconnect.php');
		// require_once('../auth.php');
	if(isset($_GET['transnum'])){
			 	$transnum = $_GET['transnum'];
	 // echo $transnum;
	}
	if(isset($_GET['username'])){
			 	$username = $_GET['username'];
	 // echo $username;
	}

?>
<html>
<head>
<!-- <link rel="stylesheet" href="main.css" type="text/css" media="screen" charset="utf-8">
 --><!-- <link rel="stylesheet" href="master.css" type="text/css" media="screen" charset="utf-8">
 -->
<!--sa poip up-->
<link href="src/facebox_single.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox1]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>
  <style>
  table {
    border-collapse: collapse;
    border-spacing: 0;
}
table a{
	text-decoration: none;
	color:#720000;


}

body{
	background: url('../images/stacked_circles.png') repeat scroll left top #FFFFFF;
    font-size: 13px;
	font-family: 'helvetica,arial,sans-serif';
color: #444546;
}
#wrapper{
	margin:0 auto;
	width:980px;
}
.clearfix{
	clear:both;
}
#note{
	background-color: #fff;
	padding:10px;
	margin-bottom:10px;
}
#content{
	width:980px;
	margin: 0 auto;
}
#productlist{
	padding:10px;
	float:left;
	width:65%;
	margin-top: 5px;
	*border-style: solid;
}
.product-display{
	margin-left: 70px;
	background: url('../images/inner.png');

		}
#productlist h2{
	width:650px;
	height: 40px;
	color: #464646;
	background: url('../images/foo-bg.jpg');
	display: block;
	font-family: 'droidsans';
	text-shadow: 1px 0 0 #8a5346;
	padding: 5px;
	font-size: 30px;
}
#orderlist{
	padding:10px;
	float:right;
	width:30%;
}
/*.pngfix{
	padding:5px;
}*/
.pic{
	width:980px;
	margin:0 auto;
}
.single-menu {
	width: 980px;
	margin:auto;
	margin-top:0px;
}
.similar{
	margin:10px 0;
}
.pad25{
	margin:15px 0; 
}
.stuff{
	

}

/* general ul style */
.single-menu ul {
	margin: 0;
	padding: 0;
	list-style-type: none;
}
.single-menu li{list-style: none; float:left; margin-right: 15px; margin-top: 10px;}
.single-menu ul a{text-decoration: none; color: #5E5652; font-size: 16px; }

.clear{
	clear:both;
	float:none;}
.main_container{
	width:100%;
	height:auto;
	margin-left:auto;
	margin-right:auto;
	*border-style:solid;
}
/*topmost header  */
.header-top{
	border:1px solid #47a3da;
}
/*--end topmost header--*/

 /*header and menu*/
.header-menu{
	width:980px;
	*background:silver;
	*border-style:solid;
	margin:auto;
	margin-top:10px;
	border-bottom-style:ridge;
	}

#header{
	width:980px;
	height:80px;
	margin:auto;
	margin-top:10px;
	margin-bottom:5px;
	*background:blue;}
/*---logo--*/
.logo{
	width:200px;
	height:80px;
	float:left;
	margin-top:0px;
	margin-left:0px;}
/*greeting*/
.greet{
	margin-left: 0px;
	color:red;
}
/*----cart, notification, wishlist---*/
.shortcut{
	float:left;
/*	width:180px;
*/	height:80px;
	/*margin-right:5px;*/
	margin-left: 0px;
}
.shortcut img{
margin-right:10px;	
}
.ul_tooltip li {
	list-style: none;
	float:left;
}

a.tooltip {outline:none; }
a.tooltip strong {line-height:30px;}
a.tooltip:hover {text-decoration:none;} 
a.tooltip span {
    z-index:10;
    display:none; 
    padding:14px 20px;
    margin-top:15px; 
    margin-left:-150px;
    width:150px; 
    line-height:16px;
    height: 100px;
}
a.tooltip:hover span{
    display:inline;
    border-color: #000; 
    position:absolute; 
    border:2px solid #FFF;  
    color:#000;
    /*background:#000 url(src/css-tooltip-gradient-bg.png) repeat-x 0 0;*/
    background: #fff;
}
.arrow-top  {
	z-index:20;
	position:absolute;
	width: 0px;
	height: 0px;
	top: -10px;
	left: 150px;
	border-color:transparent;
	border-style: solid;
	border-width: 15px;
	border-top-width:0px;
	border-bottom-color: #fff;

}

    
/*CSS3 extras*/
a.tooltip span
{
    border-radius:4px;
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    -moz-box-shadow: 0px 0px 8px 2px #DCDEDE;
    -webkit-box-shadow: 0px 0px 8px 2px #DCDEDE;
    box-shadow: 0px 0px 8px 2px #DCDEDE;
    opacity: 1;
    /*-webkit-box-shadow: 0px 0px 8px 3px rgba(0, 0, 0, 0.4) ;
	-moz-box-shadow: 0px 0px 8px 3px rgba(0, 0, 0, 0.4) ;
	-ms-box-shadow: 0px 0px 8px 3px rgba(0, 0, 0, 0.4) ;
	-o-box-shadow: 0px 0px 8px 3px rgba(0, 0, 0, 0.4) ;
	box-shadow: 0px 0px 8px 3px rgba(0, 0, 0, 0.4) ;*/
}

.cart-data  {
	position: relative;
	width: 50px;
	top: -50px;
	left: 30px;
	text-decoration: none;
	color: black;
}


/*--end of cart wishlist and notification--*/

/*--search---*/
.search{
	float:left;
	width:320px;
	height:auto;
	margin-left:30px;
	margin-right:20px;
	padding:2px;
	margin-top:-5px;
	*text-align:left;
	}
.search form{
	width:320px;
	height:50px;
	}
.search-input{
	width:290px;
	height:40px;
	margin-top:20px;
	margin-left:0px;
	background:#ECECEC;
	border: none;
	outline: none;
	padding:5px;
	/*-webkit-transition: all 1s ease;
  -moz-transition: all 1s ease;
  -ms-transition: all 1s ease;
  -o-transition: all 1s ease;
  transition: all 1s ease;*/

}
.search-input:hover{
	background:#fff;
	width:250px;
	color:black;
	padding:2px;
	}	

.search-submit {
	width: 45px;
	height: 40px;
	background: #ECECEC url('../images/search.png') no-repeat 13px 13px;
	margin-top:20px;
	margin-left:-2px;
	cursor: pointer;
	text-align: center;
	display: block;
	border: none;
	outline: none;
	/*-webkit-appearance: none;*/
}

.search-submit:hover{
	color:#EDEEEF;}


/* start searching*/
.search_first{
	width:980px;
	margin: auto;
	margin-top:20px;
	height:auto;}

.filter{
	float:left;
	width:20%; 
	height: auto;
	}
.filter ul{
	list-style:none;
	width:20%;
	margin:10px 2px 10px 10px;
	padding:10px;
	}
.filter h3{
	color: #07839f;}
.brand {
	padding:8px;
	margin:10px;}
/*.filter .form{width: 15%;}
.filter .input [type=checkbox]{width: 15%;}*/
.search_item{
	float:left;
	width: 55%;
	color:red;
	margin-left: 5px;
	border-style: solid;
}
.sort{
	float: right;
	width: 25%; 
	margin-left:5px; 
	border-style: solid;
}
.sort li{
	list-style:none;
	}
.search_product{
	float:left;
	width:70%;
	position:relative;
}
.products{
	width:40%;
	float:left;
	margin-top: 0px;
	margin-left: 5px;
	}
.price-slider{
	width:50px;
	margin: auto;
	border-style: solid;
}
/*--end of search--*/

/*----- user login register -----*/
.user{
	float:right;
	margin-top:-55px;
	margin-right: 0px;
	width:270px;
	margin-left: -10px;
	/*height:83px;*/
	/*margin-left:60px;*/
	/*margin-top:-24px;*/
	}
.user1{
	
	/*height:70px;*/
	padding:8px;
	
	
	}
.user1 li{
	font-size:15px;
	height: 20px;
	list-style:none;
	float:left;
	padding:0 12px 0 2px;
	margin-left:0px;
	color: navy;

	}
.user1 li  a{
	text-decoration:none;
	color: navy;
	}

/*.user1 a:hover{color:silver;}*/


/*------------------------------------------------FANCYBOX CSS(LOGIN,REGISTER)----------------------------*/
/*outer transparent background outside fancybox--*/
.overlay {
background-color: rgba(0, 0, 0, 0.6);
bottom: 0;
cursor: default;
/*left: 0;*/
opacity: 0;
position: fixed;
right: 0;
top: 0;
visibility: hidden;
z-index: 1;
-webkit-transition: opacity .5s;
-moz-transition: opacity .5s;
-ms-transition: opacity .5s;
-o-transition: opacity .5s;
transition: opacity .5s;

}
.overlay:target {
visibility: visible;
opacity: 1;
}
.overlay:target+.popup {
top: 50%;
opacity: 1;
visibility: visible;
}
/*close button*/
.close {
	background: url('../images/close.png') no-repeat;

background-color: rgba(0, 0, 0, 0);
height: 40px;
line-height: 30px;
position: absolute;
right: 3px;
text-align: center;
text-decoration: none;
top: 9px;
width: 30px;

}
.close:before {
/*color: rgba(255, 255, 255, 0.9);
content: "X";*/
font-size: 24px;
text-shadow: 0 -1px rgba(0, 0, 0, 0.9);
}

/*-------fancybox content---------*/
.popup {
background-color: #fff;
/*border: 1px solid #47A3DA;*/
display: inline-block;
left: 50%; 
color:#666;
width:800px;
height:auto;
opacity: 0;
padding: 15px;
position: fixed;
text-align: justify;
top: 40%;
visibility: hidden;
z-index: 10;
-webkit-transform: translate(-50%, -50%);
-moz-transform: translate(-50%, -50%);
-ms-transform: translate(-50%, -50%);
-o-transform: translate(-50%, -50%);
transform: translate(-50%, -50%);
/*-webkit-border-radius: 10px;
-moz-border-radius: 10px;
-ms-border-radius: 10px;
-o-border-radius: 10px;
border-radius: 10px;*/
-webkit-box-shadow: 0px 0px 10px 5px rgba(0, 0, 0, 0.4) ;
-moz-box-shadow: 0px 0px 10px 5px rgba(0, 0, 0, 0.4) ;
-ms-box-shadow: 0px 0px 10px 5px rgba(0, 0, 0, 0.4) ;
-o-box-shadow: 0px 0px 10px 5px rgba(0, 0, 0, 0.4) ;
box-shadow: 0px 0px 10px 5px rgba(0, 0, 0, 0.4) ;
/*-webkit-transition: opacity .5s, top .5s;
-moz-transition: opacity .5s, top .5s;
-ms-transition: opacity .5s, top .5s;
-o-transition: opacity .5s, top .5s;
transition: opacity .5s, top .5s;*/
}
.popup div {
margin-bottom: 15px;
height: auto;

}
.popup h2{
	color:#07839f; 
	line-height:0.1em;
	text-align: center;
	margin-bottom: 17px;
}
/*popup with login,register form*/
.scroll{
	height: 300px;
	overflow: auto;
}
.first_popup{
	float:left;
	width:45%;
	height:auto;
	margin-top: 2px;
	padding:5px;
	margin-left: 30px;
}
.first_popup input[type="text"], .first_popup input[type="password"] {
margin: 0 0 5px 0;
width:250px;
height:35px;
padding: 4px;
background:#fff;
/*border: 1px solid #66c8de;
-moz-box-shadow: 0 1px 1px #ddd inset, 0 1px 0 #fff;
-webkit-box-shadow: 0 1px 1px #ddd inset, 0 1px 0 #fff;
box-shadow: 0 1px 1px #ddd inset, 0 1px 0 #fff;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
border-radius: 3px;*/
}
.first_popup input[type="text"]:hover, .first_popup input[type="password"]:hover {
background: #fff;
border: 1px solid #000;
}
a.forgot{
	font-style:italic;
	font-size: 14px;
	line-height:24px;
	color:#ffa800;
	margin: 0 0 0 120px;
	text-shadow:1px 1px 1px #fff;}
a.forgot:hover{
	color:#000;
}

.bottom{
	margin-top:20px;
	clear:both;
	color:#fff;
	width: 270px;
}
.bottom a{
	display:block;
	clear:both;
	padding:5px;
	color:#ffa800;
	font-size: 16px;
	margin: 5px;

}

.remember{
	width:200px;
	margin:20px 0px 20px 0px;
	
}
.remember input{
	float:left;
	width:16px;
	height: 16px;
	margin:2px 5px 0px 50px;
}
.text{
	margin:0px;
	color:#000;
	font-size: 15px;
}


 .bottom input[type="submit"] {
	background: #FFA800;
	color: #fff;
	font-family: "Trebuchet MS", "Myriad Pro", sans-serif;
	font-size: 14px;
	font-weight: bold;
	padding: 8px 0 9px;
	text-align: center;
	width: 100px;
	cursor:pointer;
	margin:10px 10px 5px 70px;
	border:none;
	outline:none;
	/*text-shadow: 0px 1px 0px #fff;
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
	border-radius: 4px;
	-moz-box-shadow: 0px 0px 2px #fff ;
	-webkit-box-shadow: 0px 0px 2px #fff ;
	box-shadow: 0px 0px 2px #fff ;*/
}
.bottom input[type="submit"]:hover {
	background: #FFA800;
	border:none;
	outline:none;
	/*-moz-box-shadow: 0px 0px 2px #eaeaea inset;
	-webkit-box-shadow: 0px 0px 2px #eaeaea inset;
	box-shadow: 0px 0px 2px #eaeaea inset;
	color: #222;*/
}

/*--css for dividing two popups-*/

.vertical_line{width:10%;
	height:auto;
float:left;
margin-left: 0px;}

 .divider {
 display: inline-block;
 width: 0;
 height: 7em;
 border-left: 1px solid #ccc;
 border-right: 1px solid #ccc;
 margin-left: 0px;
 vertical-align: center;
}
.or{
-webkit-border-radius: 50%;
-moz-border-radius: 50%;
border-radius: 50%;
border: 1px solid #adaeaf;
background: #fff;
height: 26px;
width: 26px;
font-family: DIN,Helvetica,Arial,sans-serif;
line-height: 26px;
margin-left: -13px;
margin-top: 8px;
}
/*second popup with facebook connect*/
.second_popup{
	width:35%;
	height:auto;
	float:right;
	margin-top:100px;
	margin-left:0px;
}


.second_popup img{
	cursor:pointer;
	margin-left:auto;
	margin-right: auto;
	vertical-align: center;
}
/*------------------------------------------------END FANCYBOX CSS(LOGIN,REGISTER)----------------------------*/


/*---------------- menu----------------------*/>
*:before {
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
}
.clearfix:before,
.clearfix:after {
	content: " ";
	display: table;
}

.clearfix:after {
	clear: both;
}
.cbp-hrmenu {
	width: 980px;
	margin:auto;
	margin-top:0px;
}

/* general ul style */
.cbp-hrmenu ul {
	margin: 0;
	padding: 0;
	list-style-type: none;
}

/* first level ul style */
.cbp-hrmenu > ul,
.cbp-hrmenu .cbp-hrsub-inner {
	width: 100%;
	max-width: 1024px;
	margin:0 auto;
	*padding: 0 1.875em;
}

.cbp-hrmenu > ul > li {
	display: inline-block;

}

.cbp-hrmenu > ul > li > a {
	font-weight: 800;
	font-size:16px;
	line-height:24px;
	padding:1em 1em 5px 1em;
	color:#5E5652;;
	display: inline-block;
	text-decoration: none;
}

.cbp-hrmenu > ul > li > a:hover {
	color: #000;
	background:#EDEEEF;
	
	
}

.cbp-hrmenu > ul > li.cbp-hropen a,
.cbp-hrmenu > ul > li.cbp-hropen > a:hover {
	background: #EDEEEF;
	color: black;

	
}


/* sub-menu */
 .cbp-hrsub-inner > ul > li.cbp-hropen > a {
	float:left !important;
	width: 33%;
}

.cbp-hrmenu .cbp-hrsub {
	position:absolute;
    *margin-top:-50px;
    margin:0 0px 0 0px;
    background-color:#fff;
    z-index:1;
	display: none;
	/*color: black;*/
	background:  #EDEEEF;
	width: 100%;
	left: 0;
}

.cbp-hropen .cbp-hrsub {
	display: block;
	padding-bottom: 3em;
}

/*.cbp-hrmenu .cbp-hrsub-inner > div {
	width: 33%;
	float: left !important;
	padding: 0 2em 0;
	margin:auto;
}
*/
.cbp-hrmenu .cbp-hrsub-inner:before,
.cbp-hrmenu .cbp-hrsub-inner:after {
	content: " ";
	display: table;
}

.cbp-hrmenu .cbp-hrsub-inner:after {
	clear: both;
}

.cbp-hrmenu .cbp-hrsub-inner > div a {
	line-height: 2em;
	text-decoration: none;
	

}
.tree{margin:auto;
	width:980px;
	margin-top: 10px;}



  </style>
 <script language="javascript" type="text/javascript">
// If you have any problem contact me at http://roshanbh.com.np
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }
	
	function getState(countryId) {		
		
		var strURL="findState.php?country="+countryId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('statediv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
	function getCity(countryId,stateId) {		
		var strURL="findCity.php?country="+countryId+"&state="+stateId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('citydiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
</script>
<script type="text/javascript">
function validateForm()
{
var x=document.forms["form1"]["total"].value;
if (x==null || x=="")
  {
  alert("Take Your Order first");
  return false;
  }
var con = confirm("Are You Sure? you want to order this product?");
if (con ==false)
{
return false;
}
}
</script>
</head>
<body>
<div class="main_container">
<?php include("../customer_header.php");?>
<div id="wrapper">
	
	<div class="clearfix"></div>
	<?php if(isset($_GET['pid']))
			{
			$pid=$_GET['pid'];
			$sql1 ="SELECT * FROM product WHERE product_id=$pid";
			$result1= executequery($sql1);
			$row=mysql_fetch_assoc($result1);
			$subid = $row['subcat_id'];
			$photot= $row['product_top'];
			$photof= $row['product_front'];
			$photol= $row['product_left'];
			$photor= $row['product_right'];
			$name= $row['product_name'];
			$brand =$row['brand'];
			$price= $row['price'];
			$qty= $row['qty'];
			$desc=$row['product_desc'];
			$sql2 = "SELECT * FROM subcategory WHERE subcat_id= $subid";
       		$result2 = executequery($sql2);
       		$data1 = mysql_fetch_assoc($result2);
       		$catid = $data1['cat_id'];
    		$sql3 = "SELECT * FROM category WHERE cat_id= $catid";
       		$result3 = executequery($sql3);
       		$data2 = mysql_fetch_assoc($result3);?> 
			<p class="tree"><a href="../index.php?page=category&catid=<?php echo $data2['cat_id']; ?>&transnum=<?php echo $transnum;?>"><?php echo $data2['cat_name']; ?></a>>  
    		<a href="../index.php?page=subcategory&subcatid=<?php echo $data1['subcat_id']; ?>&transnum<?php echo $transnum;?>"><?php echo $data1['subcat_name']; ?></a>> 
    		<?php echo $name;?></p>
	<div id="content">
		<div id="productlist">

			<div class="product-display">
							<img src="../images/divide.png" width="100%" height="5px">

				<div>
					<a title="Click to Zoom" class="fancybox" rel="pita-gallery" href="../userfiles/catimages/productimg/<?php echo $photot;?>">
					<img id="img1" src="../userfiles/catimages/productimg/<?php echo $photot;?>" data-zoom-image="../userfiles/catimages/productimg/<?php echo $photot;?>" width="493px" height="274px"/>
					</a>
					<div id="gallery_01">
					<a  href="#" class="active" data-image="../userfiles/catimages/productimg/<?php echo $photot;?>"
					data-zoom-image="../userfiles/catimages/productimg/<?php echo $photot;?>">
					<img src="../userfiles/catimages/productimg/<?php echo $photot;?>" width="96px" height="86px" /></a>
					<a  href="#" data-image="../userfiles/catimages/productimg/<?php echo $photof;?>" data-zoom-image="../userfiles/catimages/productimg/<?php echo $photof;?>">
					<img src="../userfiles/catimages/productimg/<?php echo $photof;?>" width="96px" height="86px" /></a>
					<a href="#" data-image="../userfiles/catimages/productimg/<?php echo $photol;?>" data-zoom-image="../userfiles/catimages/productimg/<?php echo $photol;?>">
					<img src="../userfiles/catimages/productimg/<?php echo $photol;?>"  width="96px" height="86px" /></a>
					<a href="#" data-image="../userfiles/catimages/productimg/<?php echo $photor;?>" data-zoom-image="../userfiles/catimages/productimg/<?php echo $photor;?>">
					<img src="../userfiles/catimages/productimg/<?php echo $photor;?>" width="96px" height="86px" /></a>
					</div>
				</div>
			</div>
			<div class="product-desc">
				<img src="../images/divide.png" width="100%" height="5px">
				<h2 style="color:navy;"><img src="../images/horz-divider.png"><?php echo $name;?><img src="../images/horz-divider.png"></h2>


					<?php echo '<a rel="facebox1" href="orderpage.php?pid='.$row['product_id'].'&transnum='.$transnum.'"><img src="../images/addcart.png" alt="'.htmlspecialchars($row['product_name']).'" width="200" height="70" class="pngfix" /></a>';?>
					<?php echo '<a href="addtowishlist.php?username='.$username.'&transnum='.$transnum.'&pid='.$row['product_id'].'" id="open" ><img src="../images/ws.jpg" alt="" width="210" height="60" /></a>';?>
					<div id="main" style="display:none; float:right;" >
						Added to wishlist!!!!
					</div>
	
					<h3 style="color:#006400; font-size:20pt;">PRODUCT DETAILS:</h3>
					<p ><?php echo $desc;?></p>
					<table cellpadding="10px" cellspacing="10px" width="100%" border="1" >
						<tr>
							<td width="25"><div align="center">PRICE</td><td><?php echo $price;?></td>
							<td width="25"><div align="center">BRAND</td><td><?php echo $brand;?></td>
						</tr>
						<tr>
							<td width="25"><div align="center">MODEL</td><td><?php echo $row['model'];?></td>
							<td width="25"><div align="center">CONFIGURATION</td><td><?php echo $row['configuration'];?></td>
						</tr><tr>
							<td width="25"><div align="center">CATEGORY</td><td><?php echo $data1['subcat_name'];?></td>
							<td width="25"><div align="center">SHOP NO.</td><td><?php echo $row['shopno'];?></td>
						</tr>
					</table>

			
				<?php }	?>


				<script type="text/javascript">
					$(function(){
				        $('#open').live('click',function(){
				            $('#main').show();
				            $('#open').hide();
				        });
				    });
				</script>
				</script>
				<!--comment start-->
			<div class="cmt-container" >
    <?php 
    $sql = mysql_query("SELECT * FROM comments WHERE id_post = '$pid'") or die(mysql_error());;
    while($affcom = mysql_fetch_assoc($sql)){ 
        $name = $affcom['name'];
        $email = $affcom['email'];
        $comment = $affcom['comment'];
        $date = $affcom['date'];

        // Get gravatar Image 
        // https://fr.gravatar.com/site/implement/images/php/
        $default = "mm";
        $size = 35;
        $grav_url = "http://www.gravatar.com/avatar/".md5(strtolower(trim($email)))."?d=".$default."&s=".$size;

    ?>
    <div class="cmt-cnt">
        <img src="<?php echo $grav_url; ?>" />
        <div class="thecom">
            <h5><?php echo $name; ?></h5><span data-utime="1371248446" class="com-dt"><?php echo $date; ?></span>
            <br/>
            <p>
                <?php echo $comment; ?>
            </p>
        </div>
    </div><!-- end "cmt-cnt" -->
    <?php } ?>


    <div class="new-com-bt">
        <span>WRITE A COMMENT ...</span>
    </div>
    <div class="new-com-cnt">
    <form name="comment" action="addcomment.php" method="post">
        <input type="text" id="name-com" name="name-com" value="" placeholder="Your name" />
        <input type="text" id="mail-com" name="mail-com" value="" placeholder="Your e-mail adress" />
        <textarea class="the-new-com" name="the-new-com"></textarea>
        <input type="hidden" name="prodid" value="<?php echo $pid;?>">
        <input type="hidden" name="transnum" value="<?php echo $transnum;?>">
        <input type="submit" value="post comment" name="save">
        </form>
    </div>
    <div class="clear"></div>
</div><!-- end of comments container "cmt-container" -->

		</div>	
		</div>		
		<div id="orderlist">
			<table width="100%" border="1" cellpadding="2" cellspacing="2">
				<tr>
					<td></td>
					<td width="25"><div align="center"><strong>Qty</strong></div></td>
					<td width="150"><div align="left"><strong>Name</strong></div></td>
					<td width="25"><div align="center"><strong>Total</strong></div></td>
				</tr>
				<?php $result3 = mysql_query("SELECT * FROM orders WHERE confirmation='$transnum'");
					while($row3 = mysql_fetch_array($result3))
						{
						echo '<tr>';
						echo '<td><a href="deleteorder.php?pid='.$row3['id'].'&transnum='.$transnum.'" class="delbutton" title="Click To Delete"><img src="img/delete.png"></a></td>';
						echo '<td><div align="center">'.$row3['qty'].'</div></td>';
						echo '<td>'.$row3['product_name'].'</td>';
						echo '<td><div align="center">'.$row3['total'].'</div></td>';
						echo '</tr>';
						}?>
				<tr>
				 	<td colspan="3"><div align="right"><span style="color:#B80000; font-size:13px; font-weight:bold; font-family:Arial, Helvetica, sans-serif;">Grand Total: </span></div></td>
					<td><div align="center">
					<?php $result5 = mysql_query("SELECT sum(total) FROM orders WHERE confirmation='$transnum'");
					while($row5 = mysql_fetch_array($result5)){ 
						echo $row5['sum(total)']; 
						$sfdddsdsd=$row5['sum(total)'];}?> </div>
					</td>
				</tr>
			</table>
			<form method="post" action="personalinfo.php" name="form1" onsubmit="return validateForm()">
			<input type="hidden" name="transnum" value="<?php echo $transnum; ?>" />
			<input type="hidden" name="username" value="<?php echo $username; ?>" />
			
			<input type="hidden" name="total" value="<?php echo $sfdddsdsd; ?>" />
			<input type="hidden" name="totalqty" value="<?php $result6 = mysql_query("SELECT sum(qty) FROM orders WHERE confirmation='$transnum'");
				while($row6 = mysql_fetch_array($result6)){ 
				echo $row6['sum(qty)'];}?>
				" />
			<input type="submit" value="Check Out">
			</form>
			<!-- similar product start-->
			<img src="../images/title6.gif" alt="" width="300" height="23" class="pad25" />	
			<hr>				
			<div class="similar">
				   <?php    $sql_sim = "SELECT * FROM product WHERE subcat_id=$subid and product_id<>$pid ORDER BY product_id LIMIT 5";
				      $result_sim = executequery($sql_sim);
				      while($data_sim = mysql_fetch_assoc($result_sim)) {
				      	$sim_id = $data_sim['product_id'];?>
					<table cellspacing="5" cellpadding="5">	
						<tr>
							<td><a href="index.php?pid=<?php echo $sim_id; ?>&transnum=<?php echo $transnum;?>" class="name"><img src="../userfiles/catimages/productimg/<?php echo $data_sim['product_top']; ?>" alt="" width="154" height="90" /></a></td> &nbsp;&nbsp;&nbsp;&nbsp;
					     <td width="125px"><a href="index.php?pid=<?php echo $sim_id; ?>" class="name"><?php echo $data_sim['product_name']; ?></a><br>
					     <span>$<?php echo $data_sim['price']; ?></span>
					   <?php echo '<a rel="facebox" href="orderpage.php?pid='.$sim_id.'&transnum='.$transnum.'"><img src="../images/cartblue.png" alt="" width="61" height="45" /></a>';?></td>
					    <?php } ?>
					    </tr>
				 </table>
				 
		</div><!--oreder list closes -->
	</div>
	<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
</div>
<!--script for zooming product image-->
<script type="text/javascript" src="../js/zoomfancyjs/zoomjs"></script>
<script src="../js/zoomfancyjs/jquery.elevatezoom.min.js" type="text/javascript"></script>
<script src="../js/zoomfancyjs/jquery.fancybox.pack.js" type="text/javascript"></script>
	<script>
          jQuery(".fancybox").fancybox();
    </script>
<script type="text/javascript">
$(document).ready(function() {
$("#img1").elevateZoom({ gallery: 'gallery_01', cursor: 'pointer', galleryActiveClass: "active" });
$("#img1").bind("click", function(e) {
var ez = $('#img1').data('elevateZoom');
ez.closeAll();
$.fancybox(ez.getGalleryList());
return false;
});
});
</script>

<style>
 .first input[type="submit"] {
	background: #FFA800;
	color: #fff;
	font-family: "Trebuchet MS", "Myriad Pro", sans-serif;
	font-size: 14px;
	font-weight: bold;
	padding: 5px;
	text-align: center;
	width: 120px;
	height: 30px;
	cursor:pointer;
	margin:15px 2px 10px 5px;
	border:medium;
	border-radius: 5px;
	outline:none;}
.first input[type="submit"]:hover {
	background: #FFA800;
	border:none;
	outline:none;}

	.wcd{width:33%; height:40px; float:left;}
.wcd-logo{font-size: 36px; color: #fff;text-align: center; float:left; cursor: pointer;  color:#fff; font-size: 32px; font-family: 'Varela Round', sans-serif;
-webkit-transition:color 0.3s ease-in;  -moz-transition:color 0.3s ease-in; x²-o-transition:color 0.3s ease-in; transition:color 0.3s ease-in;
   }
   .wcd-logo:hover{color:#3facff;}
   /**
  Tutorial : Comments System with Reply Usong jQuery & Ajax
  Author: Amine Kacem
  Author URI: http://www.webcodo.com
*/

/* the comments container  */
.cmt-container{ 
	width: 540px;
	height: auto; min-height: 30px;
	padding: 10px;
	margin: 10px auto;
	background-color: #fff;
	border: #d3d6db 1px solid;
	-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px;
} 

.cmt-cnt{
	width: 100%; height: auto; min-height: 35px; 
	padding: 5px 0;
	overflow: auto;
}
.cmt-cnt img{
	width: 35px; height: 35px; 
	float: left; 
	margin-right: 10px;
	-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px;
	background-color: #ccc;
}
.thecom{
	width: auto; height: auto; min-height: 35px; 
	background-color: #fff;
}
.thecom h5{
	display: inline;
	float: left;
	font-family: tahoma;
	font-size: 13px;
	color: #3b5998;
	margin: 0 15px 0 0;
}
.thecom .com-dt{
	display: inline;
	float: left;
	font-size: 12px; 
	line-height: 18px;
	color: #ccc;
}
.thecom p{
	width: auto;
	margin: 5px 5px 5px 45px;
	color: #4e5665;
}
.new-com-bt{
	width: 100%; 	height: 30px;
	border: #d3d7dc 1px solid;
	-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px;
	background-color: #f9f9f9;
	color: #adb2bb;
	cursor: text;
}
.new-com-bt span{
	display: inline;
	font-size: 13px;
	margin-left: 10px;
	line-height: 30px;
}
.new-com-cnt{ width: 100%; height: auto; min-height: 110px; }
.the-new-com{ /* textarea */
	width: 98%; height: auto; min-height: 70px;
	padding: 5px; margin-bottom: 8px;
	border: #d3d7dc 1px solid;
	-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px;
	background-color: #f9f9f9;
	color: #333;
	resize: none;
}
.new-com-cnt input[type="text"]{
	margin: 0;
	height: 20px;
	padding: 5px;
	border: #d3d7dc 1px solid;
	-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px;
	background-color: #f9f9f9;
	color: #333;
	margin-bottom:5px;
}
.cmt-container textarea:focus, .new-com-cnt input[type="text"]:focus{
	border-color: rgba(82, 168, 236, 0.8);
  outline: 0;
  outline: thin dotted \9;
  /* IE6-9 */
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.4);
     -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.4);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.4);
}
.bt-add-com{
	display: inline;
	float: left;
	padding: 8px 10px;  margin-right: 10px;
	background-color: #3498db;
	color: #fff; cursor: pointer;
	opacity: 0.6;
	-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px;
}
.bt-cancel-com{
	display: inline;
	float: left;
	padding: 8px 10px; 
	border: #d9d9d9 1px solid;
	background-color: #fff;
	color: #404040;	cursor: pointer;
	-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px;
}




</style>

</body>
</html>