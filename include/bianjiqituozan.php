<?php
function success($atts,$content=null,$code=""){
    $return = '<div class="alert alert-success">';
    $return .= do_shortcode($content);
    $return .= '</div>';
    return $return;
}
add_shortcode('success','success');
function info($atts,$content=null,$code=""){
    $return = '<div class="alert alert-info">';
    $return .= do_shortcode($content);
    $return .= '</div>';
    return $return;
}
add_shortcode('info','info');
function warning($atts,$content=null,$code=""){
    $return = '<div class="alert alert-warning">';
    $return .= do_shortcode($content);
    $return .= '</div>';
    return $return;
}
add_shortcode('warning','warning');
function danger($atts,$content=null,$code=""){
    $return = '<div class="alert alert-danger">';
    $return .= do_shortcode($content);
    $return .= '</div>';
    return $return;
}
add_shortcode('danger','danger');
function wymusic($atts,$content=null,$code=""){
    extract(shortcode_atts(array("autoplay"=>'0'),$atts));
    $return = '<iframe style="width:100%" frameborder="no" border="0" marginwidth="0" marginheight="0" height="86" src="https://music.163.com/outchain/player?type=2&id=';
    $return .= $content;
    $return .= '&auto='.$autoplay.'&height=66"></iframe>';
    return $return;
}
add_shortcode('music','wymusic');


function nrtitle($atts,$content=null,$code=""){
    $return = '<h2 class="title-h2">';
    $return .= $content;
    $return .= '</h2>';
    return $return;
}
add_shortcode('title','nrtitle');
function kbd($atts,$content=null,$code=""){
    $return = '<kbd>';
    $return .= $content;
    $return .= '</kbd>';
    return $return;
}
add_shortcode('kbd','kbd');
function nrmark($atts,$content=null,$code=""){
    $return = '<mark>';
    $return .= $content;
    $return .= '</mark>';
    return $return;
}
add_shortcode('mark','nrmark');
function striped($atts,$content=null,$code=""){
    $return = '<div class="progress progress-striped active"><div class="progress-bar" style="width: ';
    $return .= $content;
    $return .= '%;"></div></div>';
    return $return;
}
add_shortcode('striped','striped');

function heimu($atts,$content=null,$code=""){
    $return = '<span class="heimu">';
    $return .= $content;
    $return .= '</span>';
    return $return;
}
add_shortcode('heimu','heimu');
function bilibili($atts,$content=null,$code=""){
    extract(shortcode_atts(array("danmaku"=>'1'),$atts));
    extract(shortcode_atts(array("page"=>'1'),$atts));
    $return = '<div class="video-container"><iframe src="https://player.bilibili.com/player.html?bvid=';
    $return .= $content;
    $return .= '&page=';
    $return .= $page;
    $return .= '&high_quality=1&danmaku=';
    $return .= $danmaku;
    $return .= '" allowtransparency="true" width="100%" height="498" scrolling="no" frameborder="0" ></iframe></div>';
    return $return;
}
add_shortcode('bilibili','bilibili');
function vqq($atts,$content=null,$code=""){
    extract(shortcode_atts(array("auto"=>'0'),$atts));
    $return = '<div class="video-container"><iframe frameborder="0" width="100%" height="498" src="https://v.qq.com/iframe/player.html?vid=';
    $return .= $content;
    $return .= '&tiny=0&auto=';
    $return .= $auto;
    $return .= '" allowfullscreen></iframe></div>';
    return $return;
}
add_shortcode('vqq','vqq');
function youtube($atts,$content=null,$code=""){
    $return = '<div class="video-container"><iframe height="498" width="100%" src="https://www.youtube.com/embed/';
    $return .= $content;
    $return .= '" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div>';
    return $return;
}
add_shortcode('youtube','youtube');
function qzdypre($atts,$content=null,$code=""){
    $return = '<pre lay-title="</>" lay-skin="notepad">';
    $return .= $content;
    $return .= '</pre>';
    return $return;
}
add_shortcode('qzdypre','qzdypre');
add_action('init','more_button_a');
function more_button_a(){
   if(!current_user_can('edit_posts')&&!current_user_can('edit_pages')) return;
   if(get_user_option('rich_editing')=='true'){
     add_filter('mce_external_plugins','add_plugin');
     add_filter('mce_buttons','register_button');
   }
}
add_action('init','more_button_b');
function more_button_b(){
   if(!current_user_can('edit_posts')&&!current_user_can('edit_pages')) return;
   if(get_user_option('rich_editing')=='true'){
     add_filter('mce_external_plugins','add_plugin_b');
     add_filter('mce_buttons_3','register_button_b');
   }
}
function register_button($buttons){
    array_push($buttons," ","title");
    array_push($buttons," ","qzdypre");
    array_push($buttons," ","accordion");
    array_push($buttons," ","heimu");
    array_push($buttons," ","kbd");
    array_push($buttons," ","mark");
    array_push($buttons," ","striped");
    array_push($buttons," ","music");
    array_push($buttons," ","vqq");
    array_push($buttons," ","youtube");
    array_push($buttons," ","bilibili");
    return $buttons;
}
function register_button_b($buttons){
    array_push($buttons," ","success");
    array_push($buttons," ","info");
    array_push($buttons," ","warning");
    array_push($buttons," ","danger");
    return $buttons;
}
function add_plugin($plugin_array){
    $plugin_array['title'] = get_bloginfo('template_url').'/include/buttons/more.js';
        $plugin_array['qzdypre'] = get_bloginfo('template_url').'/include/buttons/more.js';
    $plugin_array['accordion'] = get_bloginfo('template_url').'/include/buttons/more.js';
    $plugin_array['heimu'] = get_bloginfo('template_url').'/include/buttons/more.js';
    $plugin_array['kbd'] = get_bloginfo('template_url').'/include/buttons/more.js';
    $plugin_array['mark'] = get_bloginfo('template_url').'/include/buttons/more.js';
    $plugin_array['striped'] = get_bloginfo('template_url').'/include/buttons/more.js';
    $plugin_array['bilibili'] = get_bloginfo('template_url').'/include/buttons/more.js';
    $plugin_array['music'] = get_bloginfo('template_url').'/include/buttons/more.js';
    $plugin_array['vqq'] = get_bloginfo('template_url').'/include/buttons/more.js';
    $plugin_array['youtube'] = get_bloginfo('template_url').'/include/buttons/more.js';
    return $plugin_array;
}
function add_plugin_b($plugin_array){
    $plugin_array['success'] = get_bloginfo('template_url').'/include/buttons/more.js';
    $plugin_array['info'] = get_bloginfo('template_url').'/include/buttons/more.js';
    $plugin_array['warning'] = get_bloginfo('template_url').'/include/buttons/more.js';
    $plugin_array['danger'] = get_bloginfo('template_url').'/include/buttons/more.js';
    return $plugin_array;
}
function add_more_buttons($buttons){
        $buttons[] = 'hr';
        $buttons[] = 'fontselect';
        $buttons[] = 'fontsizeselect';
        $buttons[] = 'styleselect';
    return $buttons;
}
add_filter("mce_buttons_2","add_more_buttons");