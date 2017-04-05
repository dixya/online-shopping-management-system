<?php
include("dbconnect.php");
$p= $_GET['p'];
// deletion of parent page
if($p==1){
		$pid = $_GET['pid'];
		$sqlc = "select * from childpages where page_id='$pid'";
		$resultc = executequery($sqlc);
		$rowsc = mysql_num_rows($resultc);
		if($rowsc > 0) {
			header("location:managepages.php?msg=cant delete, one or more child pages present");
		}else {
		$sql = "select page_image from pages where page_id='$pid'";
		$result = executequery($sql);
		$data = mysql_fetch_assoc($result);
		$imgname = $data['page_image'];
		if(!empty($imgname)) {
			unlink("../userfiles/".$imgname);
		}
		$sql = "delete from pages where page_id='$pid'";
		$result = executequery($sql);
		header("location:managepages.php?msg=page deleted successfully");
		}//end of else
}
//deletion of child page
if($p==2){
		$pid = $_GET['pid'];
		$sql = "select cpage_image from pages where cpage_id='$pid'";
		$result = executequery($sql);
		$data = mysql_fetch_assoc($result);
		$imgname = $data['cpage_image'];
		if(!empty($imgname)) {
			unlink("../userfiles/".$imgname);
		}
		$sql = "delete from childpages where cpage_id='$pid'";
		$result = executequery($sql);
		header("location:managepages.php?msg=page deleted successfully");
}
//deletion of category
if($p==3){
		$pid = $_GET['pid'];
		$sqlc = "select * from subcategory where cat_id='$pid'";
		$resultc = executequery($sqlc);
		$rowsc = mysql_num_rows($resultc);
		if($rowsc > 0) {
			header("location:managecategory.php?msg=cant delete, one or more subcategory present");
		}else {
		$sql = "select cat_image from category where cat_id='$pid'";
		$result = executequery($sql);
		$data = mysql_fetch_assoc($result);
		$imgname = $data['cat_image'];
		if(!empty($imgname)) {
			unlink("../userfiles/catimages/".$imgname);
		}
		$sql = "delete from category where cat_id='$pid'";
		$result = executequery($sql);
		header("location:managecategory.php?msg=category deleted successfully");
		}//end of else

}
//deletion of sub category

if($p==4){
		$pid = $_GET['pid'];
		$sql = "select subcat_image from subcategory where subcat_id='$pid'";
		$result = executequery($sql);
		$data = mysql_fetch_assoc($result);
		$imgname = $data['subcat_image'];
		if(!empty($imgname)) {
			unlink("../userfiles/catimages".$imgname);
		}
		$sql = "delete from subcategory where subcat_id='$pid'";
		$result = executequery($sql);
		header("location:managecategory.php?msg=subcategory deleted successfully");
}
// deletion of product
if($p==5){
		$pid = $_GET['pid'];
		$sql = "select product_image from product where product_id='$pid'";
		$result = executequery($sql);
		$data = mysql_fetch_assoc($result);
		$imgname = $data['product_image'];
		if(!empty($imgname)) {
			unlink("../userfiles/catimages/productimg".$imgname);
		}
		$sql = "delete from product where product_id='$pid'";
		$result = executequery($sql);
		header("location:manageproduct.php?msg=product deleted successfully");
}
// deletion of carts
if($p==6){
		$pid = $_GET['pid'];
		//$sql = "select cart_image from cart where cart_no='$pid'";
		//$result = executequery($sql);
		//$data = mysql_fetch_assoc($result);
		//$imgname = $data['product_image'];
		//if(!empty($imgname)) {
		//	unlink("../userfiles/catimages/productimg".$imgname);
		//}
		$sql = "delete from cart where cart_no='$pid'";
		$result = executequery($sql);
		header("location:managecart.php?msg=cart deleted successfully");
}
?>