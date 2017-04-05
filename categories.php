<?php

include('admin/dbconnect.php');
$sql = mysql_query("select cat_id,cat_name,cat_image from category where parent=0");
// parent categories node
$categories = array("Categories" => array());


while ($row = mysql_fetch_array($sql)) {
    $cat_id = $row['cat_id'];
    $ssql = mysql_query("select cat_id,cat_name,cat_image from category where parent='$cat_id'");



    // single category node
    $category = array(); // temp array
    $category["cat_id"] = $row["cat_id"];
    $category["name"] = $row["cat_name"];
    $category["media"] = $row["cat_image"];
    $category["sub_categories"] = array(); // subcategories again an array

    while ($srow = mysql_fetch_array($ssql)) {
        $subcat = array(); // temp array
        $subcat["cat_id"] = $srow['cat_id'];
        $subcat["name"] = $srow['cat_name'];
        // pushing sub category into subcategories node
        array_push($category["sub_categories"], $subcat);
    }

    // pushing sinlge category into parent
    array_push($categories["Categories"], $category);
}

$sql = mysql_query("select subcat_id,subcat_name,subcat_image from subcategory where parent=0");
// parent categories node
$categories = array("Categories" => array());


while ($row = mysql_fetch_array($sql)) {
    $cat_id = $row['cat_id'];
    $ssql = mysql_query("select cat_id,cat_name,cat_image from category where parent='$cat_id'");



    // single category node
    $category = array(); // temp array
    $category["cat_id"] = $row["cat_id"];
    $category["name"] = $row["cat_name"];
    $category["media"] = $row["cat_image"];
    $category["sub_categories"] = array(); // subcategories again an array

    while ($srow = mysql_fetch_array($ssql)) {
        $subcat = array(); // temp array
        $subcat["cat_id"] = $srow['cat_id'];
        $subcat["name"] = $srow['cat_name'];
        // pushing sub category into subcategories node
        array_push($category["sub_categories"], $subcat);
    }

    // pushing sinlge category into parent
    array_push($categories["Categories"], $category);
}



echo ((isset($_GET['callback'])) ? $_GET['callback'] : "") . '(' . json_encode($categories) . ')';
?>