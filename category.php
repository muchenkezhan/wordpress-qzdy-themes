<?php 
ini_set("error_reporting","E_ALL & ~E_NOTICE");
if (! defined('ABSPATH')) { 
     exit;
    }
$cat_ID = get_query_var('cat');
if($card_mode = get_term_meta( $cat_ID, '_zero-classification-theme-1', true )){
if($card_mode == 'theme_1'){
	include(TEMPLATEPATH . '/category/category-default.php');
}elseif($card_mode == 'theme_2'){
	include(TEMPLATEPATH . '/category/category-jgg.php');
}elseif($card_mode == 'theme_3'){
	include(TEMPLATEPATH . '/category/category-tw.php');
}
}elseif(!$card_mode = get_term_meta( $cat_ID, '_zero-classification-theme-1', true )){
    	include(TEMPLATEPATH . '/category/category-default.php');
}
 