<?php 
// Q-Q交-流群：9173673-58
// 作者博客：https://www.aj0.cn/
if (! defined('ABSPATH')) { 
     exit;
    }
    
 if(_qzdy('opt-index-buju') == 'opt_blog'){
get_template_part('/hometemplate/index_blog');
}
 if(_qzdy('opt-index-buju') == 'opt_img'){
get_template_part('/hometemplate/index_jgg');
}
?>