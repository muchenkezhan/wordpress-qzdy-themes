<?php 
ini_set("error_reporting","E_ALL & ~E_NOTICE");
// Q-Q交-流群：9173673-58
// 作者博客：https://www.aj0.cn/
if (! defined('ABSPATH')) { 
     exit;
    }
global $post_ID;
$cat_ID  = get_query_var('cat');
$category=get_the_category( $post_ID );
$catid=$category[0]->term_id;
$flkgg=get_term_meta( $catid, '_zero-classification-theme-1', true );
if($flkgg == 'theme_3'){
    include(TEMPLATEPATH . '/single/single-tw.php');
}else{
    include(TEMPLATEPATH . '/single/single-default.php');
}
