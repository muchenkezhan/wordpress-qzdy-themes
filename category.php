<?php 
ini_set("error_reporting","E_ALL & ~E_NOTICE");
if (! defined('ABSPATH')) { 
     exit;
    }
$cat_ID = get_query_var('cat');
$flkgg=get_term_meta($cat_ID,'_prefix_taxonomy_options',true);
if($flkgg['_zero-classification-theme-1'] == 'theme_1'){
	include(TEMPLATEPATH . '/category/category-default.php');
}elseif($flkgg['_zero-classification-theme-1'] == 'theme_2'){
	include(TEMPLATEPATH . '/category/category-jgg.php');
}elseif($flkgg['_zero-classification-theme-1'] == 'theme_3'){
	include(TEMPLATEPATH . '/category/category-tw.php');
}else{
	include(TEMPLATEPATH . '/category/category-default.php');
}
