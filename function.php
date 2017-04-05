<?php
function getChildPageById($pageid) {
	$sqlf = "select * from childpages where cpage_id='$page_id'";
	$resf = executequery($sqlf);
	$dataf = mysql_fetch_assoc($resf);
	return $dataf;
}
function getPageById($pageid) {
	$sqlf = "select * from pages where page_id='$pageid'";
	$resf = executequery($sqlf);
	$dataf = mysql_fetch_assoc($resf);
	return $dataf;
}
function getCategoryById($catid)
{
	$sqlf = "select * from category where cat_id='$catid'";
	$resf = executequery($sqlf);
	$dataf = mysql_fetch_assoc($resf);
	return $dataf;
}

function getChildCategoryById($catid)
{
	$sqlf = "select * from subcategory where childcat_id='$catid'";
	$resf = executequery($sqlf);
	$dataf = mysql_fetch_assoc($resf);
	return $dataf;
}
?>