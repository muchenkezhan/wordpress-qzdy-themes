<?php 
// Q-Q交-流群：9173673-58
// 作者博客：https://www.aj0.cn/
if (! defined('ABSPATH')) { 
     exit; // Exit if accessed directly 
    }
$buju = get_option('my_framework')['opt-index-buju'];
 if($buju == 'opt_blog'){
get_template_part('/hometemplate/index_blog');
}
 if($buju == 'opt_img'){
get_template_part('/hometemplate/index_jgg');
}
?>