<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
	if (! function_exists('_qzdy')) {
    function _qzdy($option = '', $default = null) {
        $options = get_option('my_framework');
        return (isset($options[$option])) ? $options[$option] : $default;
}}
function _get_category_tags($args) {
    if (empty($args['categories'])) {
        return false;
    }
    global $wpdb;
    $tags_num = (int)_qzdy('filter_item_tags_num',10);
    $tags = $wpdb->get_results
        ("
        SELECT DISTINCT terms2.term_id as tag_id, terms2.name as tag_name
        FROM
            $wpdb->posts as p1
            LEFT JOIN $wpdb->term_relationships as r1 ON p1.ID = r1.object_ID
            LEFT JOIN $wpdb->term_taxonomy as t1 ON r1.term_taxonomy_id = t1.term_taxonomy_id
            LEFT JOIN $wpdb->terms as terms1 ON t1.term_id = terms1.term_id,
            $wpdb->posts as p2
            LEFT JOIN $wpdb->term_relationships as r2 ON p2.ID = r2.object_ID
            LEFT JOIN $wpdb->term_taxonomy as t2 ON r2.term_taxonomy_id = t2.term_taxonomy_id
            LEFT JOIN $wpdb->terms as terms2 ON t2.term_id = terms2.term_id
        WHERE
            t1.taxonomy = 'category' AND p1.post_status = 'publish' AND terms1.term_id IN (" . $args['categories'] . ") AND
            t2.taxonomy = 'post_tag' AND p2.post_status = 'publish'
            AND p1.ID = p2.ID
        ORDER by tag_name LIMIT {$tags_num}
    ");
    $count = 0;
    if (!empty($tags)) {
        foreach ($tags as $tag) {
            $mytag[$count] = get_term_by('id', $tag->tag_id, 'post_tag');
            $count++;
        }
    } else {
        $mytag = null;
    }
    return $mytag;
}
function csf_add_custom_wp_enqueue()
{
    wp_enqueue_style('csf_custom_css', get_template_directory_uri() . '/qzdy_core/assets/css/qzdy_style.css');
}
add_action('csf_enqueue', 'csf_add_custom_wp_enqueue');
if (_qzdy('weiyu-1')) {
require get_template_directory() . '/include/weiyu.php';}
require get_template_directory() . '/include/qzdyshow-ua/show-useragent.php';
require get_template_directory() . '/pages/user-generate-password.php';
require get_template_directory() . '/qzdy_core/qzdy_core.php';
require get_template_directory() . '/include/expand/zn.php';
require get_template_directory() . '/include/assembly/mox.php';
require get_template_directory() . '/include/qzdy_email.php';
require get_template_directory() . '/include/assembly/Mimetic.php';
if (!empty(_qzdy('zero-bjq-zengqiang'))) {
require get_template_directory() . '/include/bianjiqituozan.php';
}
require get_template_directory() . '/include/qzdyeditor/down-meta.php';
require get_template_directory() . '/include/qzdy_translate_id.php';
require get_template_directory() . '/include/avatar/avatar.php';
require 'include/update/plugin-update-checker.php';
require 'include/seo.php';
include ("include/buttons/highlightjs/pure-highlightjs.php");
function UpdateCheck($url,$flag = 'qzdy'){
    return Puc_v4_Factory::buildUpdateChecker(
        $url,
        __FILE__,
      $flag
    );
 } 
switch(_qzdy('qzdy_update_source')){
    case 'github':
        $myUpdateChecker = UpdateCheck('https://github.com/muchenkezhan/wordpress-qzdy-themes','wordpress-qzdy-themes');
        break;
    default:
        $myUpdateChecker = UpdateCheck('https://www.aj0.cn/details.json');
}
function wpc_add_custom_admin_css() {
echo '<link rel="stylesheet" href="', get_template_directory_uri() . '/qzdy_style/dist/css/layui.css"   media="all">';
}
add_action('admin_head', 'wpc_add_custom_admin_css');
function short_title() {
$mytitleorig = get_the_title();
$title = htmlspecialchars($mytitleorig, ENT_QUOTES, "UTF-8");
$limit = "40";
$pad="";
if(strlen($title) >= ($limit+3)) {
$title = mb_substr($title, 0, $limit) . $pad; }
echo $title;
}
if( !current_user_can( 'manage_options' ) ) {
add_action( 'admin_menu', function(){
remove_menu_page( 'upload.php' );
remove_menu_page( 'edit-comments.php' );
remove_menu_page( 'tools.php' );
remove_menu_page( 'index.php' );
function admin_bar_item ( WP_Admin_Bar $admin_bar ) {
	$admin_bar->remove_menu('my-framework');
}
add_action( 'admin_bar_menu', 'admin_bar_item', 500 );
});
}
function customize_app_password_availability( $available, $user ) {
    if ( ! user_can( $user, 'manage_options' ) ) {
        $available = false;
    }
    return $available;
}
add_filter( 'wp_is_application_passwords_available_for_user', 'customize_app_password_availability', 10, 2 );
    function my_unregister_widgets() {   
    unregister_widget( 'WP_Widget_Search' );   
    unregister_widget('WP_Widget_Categories');
    unregister_widget('WP_Widget_Links');
    unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_Recent_Posts');
    unregister_widget('WP_Widget_RSS');
    unregister_widget('WP_Widget_Tag_Cloud');
    unregister_widget('WP_Nav_Menu_Widget');
    unregister_widget('WP_Widget_Media_Gallery');
    unregister_widget('WP_Widget_Media_Video');
    unregister_widget('WP_Widget_Media_Audio');
    }  
add_action('widgets_init', 'my_unregister_widgets');
function lingfeng_pagenavi( $range = 4 ) {
    global $paged,$wp_query;
    $max_page='';
    if ( !$max_page ) {
        $max_page = $wp_query->max_num_pages;
    }
    if( $max_page >1 ) {
        echo "<div class='fenye'>"; 
        if( !$paged ){
            $paged = 1;
        }
        if( $paged != 1 ) {
            echo "<a href='".get_pagenum_link(1) ."' class='extend' title='跳转到首页'><<</a>";
        }
        previous_posts_link('<');
        if ( $max_page >$range ) {
            if( $paged <$range ) {
                for( $i = 1; $i <= ($range +1); $i++ ) {
                    echo "<a href='".get_pagenum_link($i) ."'";
                if($i==$paged) echo " class=\"current\"";echo ">$i</a>";
                }
            }elseif($paged >= ($max_page -ceil(($range/2)))){
                for($i = $max_page -$range;$i <= $max_page;$i++){
                    echo "<a href='".get_pagenum_link($i) ."'";
                    if($i==$paged)echo " class=\"current\"";echo ">$i</a>";
                    }
                }elseif($paged >= $range &&$paged <($max_page -ceil(($range/2)))){
                    for($i = ($paged -ceil($range/2));$i <= ($paged +ceil(($range/2)));$i++){
                        echo "<a href='".get_pagenum_link($i) ."'";if($i==$paged) echo " class=\"current\"";echo ">$i</a>";
                    }
                }
            }else{
                for($i = 1;$i <= $max_page;$i++){
                    echo "<a href='".get_pagenum_link($i) ."'";
                    if($i==$paged)echo " class=\"current\"";echo ">$i</a>";
                }
            }
        next_posts_link('>');
        if($paged != $max_page){
            echo "<a href='".get_pagenum_link($max_page) ."' class='extend' title='跳转到最后一页'>>></a>";
        }
        echo '<span>['.$max_page.']</span>';
        echo "</div>\n";  
}
}?>
<?php
 register_nav_menus( array(
'nav' => 'PC端导航', 
'navs' => '移动端导航'
) );
add_theme_support( 'post-thumbnails' ); 
add_theme_support('post-thumbnails', array('post'));
add_theme_support('post-thumbnails', array('page'));
function theme_settings_admin() {
        include_once('functions.php');  
}
if ( function_exists('add_theme_support') );
add_theme_support('post-thumbnails');
function catch_first_image() {
    global $post, $posts;$first_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/iU', $post->post_content, $matches);
	@$first_img = $matches [1] [0];
	if(empty($first_img)){
		$random = mt_rand(1, 5);
		echo get_bloginfo ( 'stylesheet_directory' );
		echo '/images/random/'.$random.'.jpg';
		}
  return $first_img;
}
function post_thumbnail_srcs(){
	global $post;
	if( $values = get_post_custom_values("thumb") ) {
		$values = get_post_custom_values("thumb");
		$post_thumbnail_src = $values [0];
	} elseif( has_post_thumbnail() ){
		$thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');
		$post_thumbnail_src = $thumbnail_src [0];
	} else {
		$post_thumbnail_src = '';
		ob_start();
		ob_end_clean();
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
		if(!empty($matches[1][0])){
			$post_thumbnail_src = $matches[1][0];
		}else{
			$random = mt_rand(1, 5);
			$post_thumbnail_src = get_template_directory_uri().'/images/random/'.$random.'.jpg';
		}
	};
	echo $post_thumbnail_src;
}
function post_thumbnail_srcs_php(){
	global $post;
	if( $values = get_post_custom_values("thumb") ) {
		$values = get_post_custom_values("thumb");
		$post_thumbnail_srcs = $values [0];
		$post_thumbnail_src=get_template_directory_uri().'/timthumb.php?src='.$post_thumbnail_srcs.'&w=300&h=240&zc=1&q=100';
	} elseif( has_post_thumbnail() ){
		$thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');
		$post_thumbnail_srcs = $thumbnail_src [0];
		$post_thumbnail_src=get_template_directory_uri().'/timthumb.php?src='.$post_thumbnail_srcs.'&w=300&h=240&zc=1&q=100';
	} else {
		$post_thumbnail_src = '';
		ob_start();
		ob_end_clean();
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
		if(!empty($matches[1][0])){
			$post_thumbnail_srcs = $matches[1][0];
			$post_thumbnail_src=get_template_directory_uri().'/timthumb.php?src='.$post_thumbnail_srcs.'&w=300&h=240&zc=1&q=100';
		}else{
			$random = mt_rand(1, 5);
			$post_thumbnail_src = get_template_directory_uri().'/images/random/'.$random.'.jpg';
		}
	};
	echo $post_thumbnail_src;
}
add_theme_support('post-thumbnailss');
function catch_first_images($key1) {
    global $post, $posts;
      $first_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/iU', get_post($key1)->post_content, $matches);
	@$first_img = $matches [1] [0];
	if(empty($first_img)){
		$random = mt_rand(1, 5);
echo get_bloginfo ( 'stylesheet_directory' );
		echo '/images/random/'.$random.'.jpg';
		}
  return $first_img;
}
?>
<?php
function meta_SEO() {
global $post;
$output = '';
if (is_single()){
$keywords = ''; 
$description = '';
if ($post->post_excerpt) {
$description = $post->post_excerpt;
$description = str_replace("\r\n","",$description);
$description = str_replace("\n","",$description);
$description = str_replace("\"","'",$description);
$description .= '...';
} else {
$description = mb_strimwidth(strip_tags($post->post_content),0,400);
$description = str_replace("\r\n","",$description);
$description = str_replace("\n","",$description);
$description = str_replace("\"","'",$description);
$description .= '...';
} 
$tags = wp_get_post_tags($post->ID);
foreach ($tags as $tag ) {
$keywordarray[] = $tag->name;
}
$keywords = implode(',',array_unique((array)$keywordarray));
} else if (is_category()){
$description = strip_tags(trim(category_description()));
$keywords = single_cat_title('', false);
}else {
$keywords = _qzdy('zero-footer-wzgjc');
$description = _qzdy('zero-footer-wzms');
}
$output .= '<meta name="keywords" content="' . $keywords . '" />' . "\n";
$output .= '<meta name="description" content="' . $description . '" />' . "\n";
echo "$output";
}
?>
<?php 
function meta_pd_seo_key_and_des() {
    if(is_page()){
$qzdy_zdy_ym_key=get_post_meta( get_the_ID(), 'qzdy_zdy_ym_key', true );
$qzdy_zdy_ym_des=get_post_meta( get_the_ID(), 'qzdy_zdy_ym_des', true );
if(!empty($qzdy_zdy_ym_key)){
$flkggs.='<meta name="keywords" content="' . $qzdy_zdy_ym_key . '" />' . "\n";
    }else{
        $qzdy_zzdy_page_bt=get_the_title();
        @$flkggs.='<meta name="keywords" content="'.$qzdy_zzdy_page_bt.'" />' . "\n";
    }
if(!empty($qzdy_zdy_ym_des)){
    $flkggs.='<meta name="keywords" content="' . $qzdy_zdy_ym_des . '" />' . "\n";
}else{
    $my_excerpt = get_the_excerpt();
    $my_content = str_replace(array("/r/n","/rn", "/r", "/n", " ", "&nbsp", "/t", "&#160;", "/x0B", "&nbsp;","[&hellip;]"),"",$my_excerpt);
     $flkggs.='<meta name="keywords" content="'. $my_content .'" />' . "\n";
}
    echo $flkggs;
    }
    elseif(is_single()){
return  _my_keywords()._descriptions();
    }else{
    return  meta_SEO(); } 
}
    function record_visitors()  
    {
        if (is_singular())  
        {  
          global $post;  
          $post_ID = $post->ID;  
          if($post_ID)  
          {
              $post_views = (int)get_post_meta($post_ID, 'views', true);  
              if(!update_post_meta($post_ID, 'views', ($post_views+1)))  
              {  
                add_post_meta($post_ID, 'views', 1, true);  
              }  
          }  
        }  
    }  
    add_action('wp_head', 'record_visitors');  
    function post_views($before = '(点击 ', $after = ' 次)', $echo = 1)  
    {
      global $post;  
      $post_ID = $post->ID;  
      $views = (int)get_post_meta($post_ID, 'views', true);  
      if ($echo) echo $before, number_format($views), $after;  
      else return $views;  
}
function _descriptions(){
    global $post; 
    $my_content = strip_tags(get_the_excerpt(), $post->post_content);
    $my_content = str_replace(array("/r/n","/rn", "/r", "/n", " ", "&nbsp", "/t", "&#160;", "/x0B", "&nbsp;","[&hellip;]"),"",$my_content);
    $my_content = mb_strimwidth($my_content,0,240,"..." );
    $my_content = ltrim($my_content);
    $my_content = preg_replace("/(\s|\ \;|　|\xc2\xa0)/","",$my_content);
		$seo_descriptions = get_post_meta( get_the_ID(), 'opt-textseoms', true );
		if(!empty($seo_descriptions)){
		$description = $seo_descriptions;
		} else{
		$description = $my_content;
		}
		echo '<meta name="description" content="'.$description.'" />' . "\n";
}
function _wenzhangbanquan(){
    $bq_content='非特殊说明，本博所有文章均为博主原创。';
		$bq_descriptions = get_post_meta( get_the_ID(), 'opt-wz-textbanquan', true );
		if(!empty($bq_descriptions)){
		$descriptions = $bq_descriptions;
		} else{
		$descriptions = $bq_content;
		}
		echo $descriptions;
}
function _zero_wz_autoMenu_ml_kg(){
   $zero_wz_autoMenu_ml_kg = get_post_meta( get_the_ID(), '_zero-wz-autoMenu-ml-kg', true );
    if($zero_wz_autoMenu_ml_kg){
       $ml_html='<div class="autoMenu qzdysjflml" id="autoMenu" data-autoMenu> </div>';
    }else{$ml_html='';}
    echo $ml_html;
}
function new_excerpt_length( $length ) {
	return 240;
}
add_filter( "excerpt_length", "new_excerpt_length" );
function _my_keywords(){
global $post;
$gettags = get_the_tags($post->ID);
if ($gettags) {
foreach ($gettags as $tag) {
$posttag[] = $tag->name;
}
$tags = implode( ',', $posttag );
}
		$seo_keywords = get_post_meta( get_the_ID(), 'opt-textseogjc', true );
		if(!empty($seo_keywords)){
		$description = $seo_keywords;
		} else{
		$description = $tags;
		}
		echo '<meta name="keywords" content="'.$description.'" />' . "\n";
}
function af_titledespacer($title) {
return trim($title);
}
add_filter('wp_title', 'af_titledespacer');
?>
<?php 
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var) {
return is_array($var) ? array_intersect($var, array('layui-nav-item','menu-item-has-children','current-menu-item','layui-this')) : '';
}
?>
<?php
function codedocs_add_classes_on_li($classes) { $classes[] = 'layui-nav-item'; return $classes;
}add_filter( 'nav_menu_css_class', 'codedocs_add_classes_on_li' );
?>
<?php 
class Header_Menu_Walker extends Walker_Nav_Menu{	
function start_lvl(&$output, $depth = 0, $args = array() ) {
	$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); 
    $display_depth = ( $depth + 1); 
	$classes = array( '', 
	( $display_depth % 2 ? 'menu-odd' : 'menu-even' ), 
	( $display_depth =1 ? '' : '' ), 
	);
	$class_names = implode( ' ', $classes );
	$output .= "\n" . $indent . '<ul class="layui-nav-child layui-anim layui-anim-upbit">' . "\n"; 
}
function end_lvl(&$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>";
}
}
?>
<?php 
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
    'name'          => __( '主侧边栏'),
    'id'            => 'sidebar-01',
    'description'   => '将在网页中显示的侧边栏',
    'class'         => '',
    'before_widget' => '<div id="%1$s" class="widget %2$s component_s layui-hide-xs layui-form">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3  class="title-sidebar">',
    'after_title'   => '</h3>' ));
    register_sidebar(array(
    'name'          => __( '内容边栏'),
    'id'            => 'sidebar-02',
    'description'   => '将在网页中显示的侧边栏',
    'class'         => '',
    'before_widget' => '<div id="%1$s" class="widget %2$s component_s layui-hide-xs layui-form">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3  class="title-sidebar">',
    'after_title'   => '</h3>' ));
}
function example_theme_support() {
    $jyxgju = get_option('my_framework')['zero-ht-jyxbxgj'];
	if($jyxgju == true){
         remove_theme_support( 'widgets-block-editor' );
   }
}
add_action( 'after_setup_theme', 'example_theme_support' );
function example_theme_supports() {
    $jyxgjus = get_option('my_framework')['zero-ht-jyxbbjq'];
	if($jyxgjus == true){
add_filter('use_block_editor_for_post', '__return_false');
   }
}
add_action( 'init', 'example_theme_supports' );
function imagesalt($content) {
       global $post;
       $pattern ="/<img(.*?)src=('|\")(.*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>/i";
       $replacement = '<img$1src=$2$3.$4$5 alt="'.$post->post_title.'" title="'.$post->post_title.'"$6>';
       $content = preg_replace($pattern, $replacement, $content);
       return $content;
}
add_filter('the_content', 'imagesalt');
function example_theme_supportss() {
    $htkqzdytx = get_option('my_framework')['zero-ht-htkqzdttx'];
	if(!empty($htkqzdytx)){
require_once(dirname(__FILE__) . '/include/author-avatars.php');
   }
}
add_action( 'init', 'example_theme_supportss' );
function example_theme_qtlogo() {
    $htkglogo = get_option('my_framework')['zero-ht-logokg'];
	if(!empty($htkglogo)){
     $qtwz='<span>'. _qzdy('zero-qt-wzlogo') .'</span>';
     $yanshe= '15px';
   }else{
     $qtwz='<img src="'. _qzdy('zero-footer-logo') .'"  alt="'.get_bloginfo('name').'">';
   }
echo $qtwz;
}
function qt_header_kggd() {
    $qt_header_tp = get_option('my_framework')['zero-header-gbqzbjan'];
	if(!empty( $qt_header_tp)){
     $qtwzpx= '200px';
   }else{
      $qtwzpx= '60px';
   }
echo $qtwzpx;
}
function qt_header_kgtp() {
    $qt_header_tp = get_option('my_framework')['zero-header-gbqzbjan'];
	if(!empty( $qt_header_tp)){
     $qtwzpx= _qzdy('zero-footer-qzbj');
   }else{
      $qtwzpx= 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
   }
echo $qtwzpx;
}
function qt_header_kgbanner_height() {
   if(_qzdy('opt-index-banner-moxin') =='opt-index-xbanner') {
        $heig='style="height:60px; background-image: url(data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7);"';
    }else{
        $heig='style="height:130px; background-image: url(data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7);"';
    }echo $heig;
}
function qt_header_kgzys() {
    $qt_header_tp = get_option('my_framework')['zero-header-gbqzbjan'];
	if(!empty( $qt_header_tp) && _qzdy('opt-index-header-color-box') =='opt-index-header-color-box1'){
     $qtwzpx='background-color: rgba(0, 0, 0, 0.5);';
   }else if(_qzdy('opt-index-header-color-box') =='opt-index-header-color-box1'){
      $qtwzpx= 'background-color:#202935;';
   }
echo $qtwzpx;
}
function dy_footer_color() {
	if(_qzdy('opt-index-header-color-box') =='opt-index-header-color-box1'){
     echo $css='dy-background-secondary';
   }
}
function add_js_to_foot_beijingtexiao() {echo "<script src=".get_template_directory_uri()."/include/assemblycssjs/effect.js></script>";}
if(!empty(_qzdy('zero-index-js-to-footer'))){add_action( 'wp_footer', 'add_js_to_foot_beijingtexiao' );}
function lxbjtexiao(){
    if(!empty(_qzdy('zero-index-js-to-footer'))){
        echo '<canvas style="display: block; position: fixed; margin: 0px; padding: 0px; border: 0px none; outline: currentcolor none 0px; left: 0px; top: 0px; width: 100%; height: 100%; z-index: -1;" width="1091" height="927"></canvas>';
    }
}
function add_js_to_index_texiao_kg() {echo "<link href=".get_template_directory_uri()."/include/assemblycssjs/snowflake.css rel='stylesheet'>";}
if(!empty(_qzdy('zero-index-texiao-box')=='zero-index-texiao-xuehua')){add_action( 'wp_head', 'add_js_to_index_texiao_kg' );}
function qianduanpiaoloutexiao(){
    if(_qzdy('zero-index-texiao-box')=='zero-index-texiao-xuehua'){
        echo '<div class="dssdds"><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div><div class="snow"></div></div>';
    }
}
function example_theme_yinghua() {
	if(!empty(_qzdy('zero-index-texiao-box')=='zero-index-texiao-yinghua')){
     $qtwz0="<script type='text/javascript'> var system ={}; 
 var p = navigator.platform; 
 system.win = p.indexOf('Win') == 0; 
 system.mac = p.indexOf('Mac') == 0; 
 system.x11 = (p == 'X11') || (p.indexOf('Linux') == 0); 
 if(system.win||system.mac||system.xll){
$.getScript('".get_bloginfo('template_url')."/qzdy_style/hua.js'); }
 </script>";
 echo $qtwz0;
   }
}
function add_stylesheet_to_head() {echo "<link href=".get_template_directory_uri()."/include/assemblycssjs/home-colour/style.css rel='stylesheet'>";}
if(_qzdy('opt-index-header-color-box') =='opt-index-header-color-box2'){add_action( 'wp_head', 'add_stylesheet_to_head' );}
function qz_head_mbl(){
    if(_qzdy('opt-index-header-color-box') =='opt-index-header-color-box3'){
        echo 'qz_head_mbl';
    }
}
function qz_sidebar_mbl(){
    if(_qzdy('opt-index-header-color-box') =='opt-index-header-color-box3'){
        echo ' qz_sidebar_mbl';
    }else{
        echo ' layui-bg-black';
    }
}
function add_page_center_maxheight() {
$qzdy_pre_maxheight=_qzdy('page-center-code-maxheight');
echo "<style>pre.pure-highlightjs{max-height: $qzdy_pre_maxheight;overflow: auto;}</style>
";}
if(_qzdy('page-center-code-maxheight')){add_action( 'wp_head', 'add_page_center_maxheight' );}
require get_stylesheet_directory(). '/include/mb_hot.php'; 
require get_stylesheet_directory(). '/include/categories.php';
require get_stylesheet_directory(). '/include/qzdy_label.php'; 
require get_stylesheet_directory(). '/include/qzdy_column.php'; 
require get_stylesheet_directory(). '/include/qzdy_personal.php'; 
require get_stylesheet_directory(). '/include/widget-catpost.php'; 
require get_stylesheet_directory(). '/include/widget-latest-classification.php'; 
require get_stylesheet_directory(). '/include/widget_yiyan.php'; 
require get_stylesheet_directory(). '/include/widget_zuixinpinglun.php'; 
require get_stylesheet_directory(). '/include/widget_qzdy_zhuanti.php'; 
require get_stylesheet_directory(). '/include/widget_img_shuibiankankan.php'; 
require get_stylesheet_directory(). '/include/qzdy_login.php'; 
require get_stylesheet_directory(). '/include/qzdy_login_button.php'; 
require get_stylesheet_directory(). '/include/qzdy_pinglunzuixing.php'; 
require get_stylesheet_directory(). '/include/qzdy_personal_left.php'; 
function show_category(){
    global $wpdb;
    $request = "SELECT $wpdb->terms.term_id, name FROM $wpdb->terms ";
    $request .= " LEFT JOIN $wpdb->term_taxonomy ON $wpdb->term_taxonomy.term_id = $wpdb->terms.term_id ";
    $request .= " WHERE $wpdb->term_taxonomy.taxonomy = 'category' ";
    $request .= " ORDER BY term_id asc";
    $categorys = $wpdb->get_results($request);
    foreach ($categorys as $category) {
        $output = '分类名:【'.$category->name."】,ID:【".$category->term_id.'】；';
        echo $output;
    }
}
if (in_array($pagenow, array('post.php', 'post-new.php', 'page.php', 'page-new.php'))) {
 add_action('after_wp_tiny_mce', 'my_quicktags');
}
function my_quicktags($mce_settings) {?>
<script type="text/javascript">
QTags.addButton( 'my_per_html', 'HTML代码高亮', '<pre lay-title="HTML" lay-skin="notepad"> 这里是代码</pre>', '' );
QTags.addButton( 'my_per_css', 'CSS代码高亮', '<pre lay-title="CSS" lay-skin="notepad"> 这里是代码</pre>', '' );
QTags.addButton( 'my_per_js', 'JS代码高亮', '<pre lay-title="JS" lay-skin="notepad"> 这里是代码</pre>', '' );
QTags.addButton( 'my_per_php', 'PHP代码高亮', '<pre lay-title="PHP" lay-skin="notepad"> 这里是代码</pre>', '' );
QTags.addButton( 'my_per_xz', '蓝色下载按钮', '<a href="下载地址" class="layui-btn layui-btn-normal">一个可跳转的按钮</a>', '' );
QTags.addButton( 'my_per_xz1', '白色下载按钮', '<a href="下载地址" class="layui-btn layui-btn-primary">一个可跳转的按钮</a>', '' );
QTags.addButton( 'my_per_xz2', '深色下载按钮', '<a href="下载地址" class="layui-btn layui-btn-primary layui-border-black">一个可跳转的按钮</a>', '' );
QTags.addButton( 'my_per_fg1', '默认分割线', '<hr>', '' );
QTags.addButton( 'my_per_fg2', '赤色分割线', '<hr class="layui-border-red">', '' );
QTags.addButton( 'my_per_fg3', '橙色分割线', '<hr class="layui-border-orange">', '' );
QTags.addButton( 'my_per_fg4', '墨绿分割线', '<hr class="layui-border-green">', '' );
QTags.addButton( 'my_per_fg5', '青色分割线', '<hr class="layui-border-cyan">', '' );
QTags.addButton( 'my_per_fg6', '蓝色分割线', '<hr class="layui-border-blue">', '' );
QTags.addButton( 'my_per_fg7', '黑色分割线', '<hr class="layui-border-black">', '' );
QTags.addButton( 'my_per_yy1', '文字引用区域绿', '<blockquote class="layui-elem-quote">引用区域的文字</blockquote>', '' );
QTags.addButton( 'my_per_yy2', '文字引用区域灰', '<blockquote class="layui-elem-quote layui-quote-nm">引用区域的文字</blockquote>', '' );
QTags.addButton( 'my_per_kpmb', '卡片面板', '<div class="layui-card"><div class="layui-card-header">标题</div><div class="layui-card-body">这里是内容</div></div>', '' );
QTags.addButton( 'my_per_password', '密码可见', '[secret key="设置密码"]加密内容[/secret]', '' );
QTags.addButton( 'my_per_loginkejian', '登录回复可见', '[reply]登录回复可见内容[/reply]', '' );
function my_quicktags() {
}
</script>
<?php }
function qzdy_prevent_theme() { 
	if(!empty(_qzdy('zero-body-tzhkg'))){
$ssssa=_qzdy('opt-body-tzh1');
$gsfgs=_qzdy('opt-body-tzh2');
echo  ' ',$ssssa,' ',$gsfgs;
}}
function plc_comment_post( $incoming_comment ) {
        $incoming_comment['comment_content'] = htmlspecialchars($incoming_comment['comment_content']);
        $incoming_comment['comment_content'] = str_replace( "'",'', $incoming_comment['comment_content'] );
        return( $incoming_comment );
}
function plc_comment_display( $comment_to_display ) {
        $comment_to_display = str_replace( '', "'", $comment_to_display );
        return $comment_to_display;
}
function xintheme_prohibit_comment_post( $incoming_comment ) {
    $pattern = '/[一-龥]/u';
    if(!preg_match($pattern, $incoming_comment['comment_content'])) {
    wp_die( "抱歉，本站禁止全英文评论，请输入一些汉字，谢谢！<a href=\"#\" onclick=\"javascript:history.back(-1);\">返回到上一页</a>" );
    }
    return( $incoming_comment );
}
if (!empty(_qzdy('zero-footer-page-comtywkg'))) {
add_filter('preprocess_comment', 'xintheme_prohibit_comment_post');
}
add_filter( 'preprocess_comment', 'plc_comment_post', '', 1);
add_filter( 'comment_text', 'plc_comment_display', '', 1);
add_filter( 'comment_text_rss', 'plc_comment_display', '', 1);
add_filter( 'comment_excerpt', 'plc_comment_display', '', 1);
 function example_theme_sup() {
    $jyxgju = get_option('my_framework')['zero-htai-wxts'];
	if($jyxgju == true){
     function wpso_wechet_comment_notify($comment_id) {
$sdasassss=_qzdy('zero-footer-serverjiang');
$text = get_bloginfo('name'). '上有新的评论';
$comment = get_comment($comment_id);
$desp = $comment->comment_author.' 同学在文章《'.get_the_title($comment->comment_post_ID).'》中给您的留言为：'.$comment->comment_content;
$key = $sdasassss;
$postdata = http_build_query( array( 'text' => $text, 'desp' => $desp ));
$opts = array('http' =>
array(
'method'  => 'POST',
'header'  => 'Content-type: application/x-www-form-urlencoded',
'content' => $postdata));
$context = stream_context_create($opts);
$admin_email = get_bloginfo ('admin_email');
$comment_author_email = trim($comment->comment_author_email);
if($admin_email!=$comment_author_email){
return $result = file_get_contents('https://sctapi.ftqq.com/'.$key.'.send', false, $context);
}
}   add_action('comment_post', 'wpso_wechet_comment_notify', 19, 2);
   }
}
add_filter('comment_post','example_theme_sup'); 
add_filter('sanitize_file_name','fanly_custom_upload_name', 5, 1 );
function fanly_custom_upload_name($file){
    $info   = pathinfo($file);
    $ext    = empty($info['extension']) ? '' : '.' . $info['extension'];
    $name   = basename($file, $ext);
    if(preg_match("/[一-龥]/u",$file)){
        $file   = substr(md5($name), 0, 20) . rand(00,99) . $ext;
    }elseif(is_numeric($name)){
        $file   = substr(md5($name), 0, 20) . rand(00,99) . $ext;
    }
    return $file;
}
function example_theme_liebiao_kuandu() {
    global $wp_query;
$cat_ID = get_query_var('cat');
$flkgg=get_term_meta($cat_ID,'_prefix_taxonomy_options',true);
	if(! empty($flkgg['_zero-classification-cbl-kg'])){
	    $layui_col_md='9';
   }else{
       $layui_col_md='12';
   }
echo $layui_col_md;
}
function get_category_root_id($cat) {
    $this_category = get_category($cat);
    while ($this_category->category_parent) 
    {
        $this_category = get_category($this_category->category_parent);
    }
    return $this_category->term_id; 
}
function get_category_deel($cat) {
    $categories        = get_terms('category', array('hide_empty' => 0, 'parent' => 0));
    $get_term_children = get_term_children($cat_ID, 'category'); 
}
function  qzdy_sidebar_switch_left() {
global $wp_query;
$cat_ID = get_query_var('cat');
$flkgg=get_term_meta($cat_ID,'_prefix_taxonomy_options',true);
if(!empty($flkgg['_zero-classification-cbl-kg']) && _qzdy('opt-index-sidebar-position') == 'opt-sidebar-left'){
    echo 'qzdy-3-9';
}
}
function  qzdy_sidebar_guanbi() {
    if(is_category()){
    global $wp_query;
$cat_ID = get_query_var('cat');
$flkggs=get_term_meta($cat_ID,'_prefix_taxonomy_options',true);
if(empty($flkggs['_zero-classification-cbl-kg']) ){
    echo 'style="display: none;"';
}
    }
}
function  qzdy_sidebar_fangxiang() {
if(_qzdy('opt-index-sidebar-position') == 'opt-sidebar-left'){
    echo 'qzdy-3-9';
}
}
function  qzdy_classification_banner() {
global $wp_query;
$cat_ID  = get_query_var('cat');
$flkgg=get_term_meta($cat_ID,'_prefix_taxonomy_options',true);
$banner= _qzdy('zero-header-classification-banner-morenbanner');
if(!empty($flkgg['zero-header-classification-banner-imgurl'])  && !empty(is_category( $category ))){
$banner=$flkgg['zero-header-classification-banner-imgurl'];
}
elseif(empty($flkgg['zero-header-classification-banner-imgurl'])  && !empty(is_category( $category ))){
$banner= _qzdy('zero-header-classification-banner-morenbanner');
}
echo $banner;
}
function  qzdy_home_banner_body_height() {
    $ttf='';
       if(_qzdy('opt-index-banner-moxin') =='opt-index-dbanner' && !empty(_qzdy('zero-header-gbqzbjan'))) {
        $ttf='<style>.layui-content{margin-top: -100px;}</style>';
    }
       elseif(_qzdy('opt-index-banner-moxin') =='opt-index-dbanner') {
        $ttf='<style>.layui-content{margin-top: -70px;}</style>';
    }
    echo $ttf;
}
function custom_login() {   
echo '<link rel="stylesheet" tyssspe="text/css" href="' . get_bloginfo('template_directory') . '/custom_login/custom_login.css" />'; }   
add_action('login_head', 'custom_login');   
function custom_loginlogo_url($url) {
return '';
}
add_filter( 'login_headerurl', 'custom_loginlogo_url' );
function search_filter_page($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}
add_filter('pre_get_posts','search_filter_page');
function exclude_category_home( $query ) {
    $sadads=_qzdy('zero-qt-index-paichuid');
    if ( $query->is_home ) {
        $query->set( 'cat', ''.$sadads.'' );
    }
    return $query;
}
add_filter( 'pre_get_posts', 'exclude_category_home' );
function comment_admin_title($comment){
if($comment == 1){
   return '<span class="bb-comment isauthor" title="作者">博主</span>';}}
   function comment_admin_title_admin($comment){
if($comment == 1){
   return 'adminhighlight ';}}
function simple_comment($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>
<li class="comment" id="comment-<?php comment_ID(); ?>">
<div class="media">
<div class="media-left">
<?php if (function_exists('get_avatar') && get_option('show_avatars')) { echo get_avatar($comment, 48); } ?>
</div>
<div class="media-body">
<?php printf(__('<p class="'.comment_admin_title_admin($comment->user_id).'author_name">%s'.comment_admin_title($comment->user_id).'</p>'), get_comment_author_link()); ?>
<?php if ($comment->comment_approved == '0') : ?>
<em>评论等待审核...</em><br />
<?php endif; ?>
<?php comment_text(); ?>
</div>
</div>
<div class="comment-metadata">
<span class="comment-pub-time">
<?php echo get_comment_time('Y-m-d H:i');
if ( current_user_can('level_10') ) {
$url = home_url();
echo '<a id="delete-'. $comment->comment_ID .'" href="'.admin_url("comment.php?action=cdc&c=$comment->comment_ID").'" >&nbsp;删除</a>
<a id="delete-'. $comment->comment_ID .'" href="' . wp_nonce_url("$url/wp-admin/comment.php?action=editcomment&c=" . $comment->comment_post_ID . '&c=' . $comment->comment_ID, 'delete-comment_' . $comment->comment_ID) . '" >&nbsp;编辑</a>';
} ?>
</span>
<?php $commentOutput=''; $commentOutput .= CID_return_comment_browser_by_id($comment->comment_ID);
      echo $commentOutput;
?>
<span class="comment-btn-reply">
<i class="fa fa-reply"></i> <?php comment_reply_link(array_merge( $args, array('reply_text' => '回复','depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
</span>
</div>
<?php } 
function MBT_sanitize_user ($username, $raw_username, $strict) {
 $username = wp_strip_all_tags( $raw_username );
 $username = remove_accents( $username );
 $username = preg_replace( '|%([a-fA-F0-9][a-fA-F0-9])|', '', $username );
 $username = preg_replace( '/&.+?;/', '', $username ); 
 if ($strict) {
 $username = preg_replace ('|[^a-z\p{Han}0-9 _.\-@]|iu', '', $username);
 }
 $username = trim( $username );
 $username = preg_replace( '|\s+|', ' ', $username );
 return $username;
}
add_filter ('sanitize_user', 'MBT_sanitize_user', 10, 3);
function my_login_redirect($redirect_to, $request, $user){
    if( is_array( $user->roles ) ) {
          if( in_array( "administrator", $user->roles ) ) {
                return home_url().'/wp-admin/';
           } else {
               return home_url();
           }
     }
 }
 add_filter("login_redirect", "my_login_redirect", 10, 3);
    add_action('wp_ajax_nopriv_bigfa_like', 'bigfa_like');
    add_action('wp_ajax_bigfa_like', 'bigfa_like');
    function bigfa_like(){
        global $wpdb,$post;
        $id = $_POST["um_id"];
        $action = $_POST["um_action"];
        if ( $action == 'ding'){
        $bigfa_raters = get_post_meta($id,'bigfa_ding',true);
        $expire = time() + 99999999;
        $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false; 
        setcookie('bigfa_ding_'.$id,$id,$expire,'/',$domain,false);
        if (!$bigfa_raters || !is_numeric($bigfa_raters)) {
            update_post_meta($id, 'bigfa_ding', 1);
        }
        else {
                update_post_meta($id, 'bigfa_ding', ($bigfa_raters + 1));
            }
        echo get_post_meta($id,'bigfa_ding',true);
        }
        die;
    }
    function custom_login_head(){
    $str=_qzdy('zero-login-background-image');
    if (!empty($str)) {
        $imgurl=_qzdy('zero-login-background-image');
         echo'<style type="text/css">body{background: url('.$imgurl.');background-image:url('.$imgurl.');-moz-border-image: url('.$imgurl.');background-size: cover;
background-position: top;
position: relative;
overflow-x: hidden;}</style>';
    }else{
          echo'<style type="text/css">body{background:#f2f2f2;}</style>';
    }
}
add_action('login_head', 'custom_login_head');
function custom_loginlogo() {
    $str=_qzdy('zero-login-background-image-logo');
    if (!empty($str)) {
        if(_qzdy('opt-index-lgoin-muban')=='opt-login-er'){
        echo '<link rel="stylesheet" id="wp-admin-css" href="'.get_bloginfo('template_directory').'/qzdy_style/houtai.css" type="text/css" />';
        }
echo '<style type="text/css">.language-switcher{display: none;}#reg_passmail:after{content:"温馨提示：邮箱请认真填写，用于接收评论信息，用户资料皆是保密。";}
h1 a {background: url('.$str.') !important; background-size: 100% 100% !important;}
</style>';
}else{
     if(_qzdy('opt-index-lgoin-muban')=='opt-login-er'){
        echo '<link rel="stylesheet" id="wp-admin-css" href="'.get_bloginfo('template_directory').'/qzdy_style/houtai.css" type="text/css" />';
        }
    echo '<style type="text/css">.language-switcher{display: none;}#reg_passmail:after{content:"温馨提示：邮箱请认真填写，用于接收评论信息，用户资料皆是保密。";}
h1 a {background: url('.get_template_directory_uri().'/custom_login/logo.png'.') !important; background-size: 100% 100% !important;}
</style>';
} }
add_action('login_head', 'custom_loginlogo');
    function zero_wzl_category(){
    if (!empty(_qzdy('zero-wzl-category'))) {
add_action( 'load-themes.php',  'no_category_base_refresh_rules');
add_action('created_category', 'no_category_base_refresh_rules');
add_action('edited_category', 'no_category_base_refresh_rules');
add_action('delete_category', 'no_category_base_refresh_rules');
function no_category_base_refresh_rules() {
    global $wp_rewrite;
    $wp_rewrite -> flush_rules();
}
add_action('init', 'no_category_base_permastruct');
function no_category_base_permastruct() {
    global $wp_rewrite, $wp_version;
    if (version_compare($wp_version, '3.4', '<')) {
        $wp_rewrite -> extra_permastructs['category'][0] = '%category%';
    } else {
        $wp_rewrite -> extra_permastructs['category']['struct'] = '%category%';
    }
}
add_filter('category_rewrite_rules', 'no_category_base_rewrite_rules');
function no_category_base_rewrite_rules($category_rewrite) {
    $category_rewrite = array();
    $categories = get_categories(array('hide_empty' => false));
    foreach ($categories as $category) {
        $category_nicename = $category -> slug;
        if ($category -> parent == $category -> cat_ID)
            $category -> parent = 0;
        elseif ($category -> parent != 0)
            $category_nicename = get_category_parents($category -> parent, false, '/', true) . $category_nicename;
        $category_rewrite['(' . $category_nicename . ')/(?:feed/)?(feed|rdf|rss|rss2|atom)/?$'] = 'index.php?category_name=$matches[1]&feed=$matches[2]';
        $category_rewrite['(' . $category_nicename . ')/page/?([0-9]{1,})/?$'] = 'index.php?category_name=$matches[1]&paged=$matches[2]';
        $category_rewrite['(' . $category_nicename . ')/?$'] = 'index.php?category_name=$matches[1]';
    }
    global $wp_rewrite;
    $old_category_base = get_option('category_base') ? get_option('category_base') : 'category';
    $old_category_base = trim($old_category_base, '/');
    $category_rewrite[$old_category_base . '/(.*)$'] = 'index.php?category_redirect=$matches[1]';
    return $category_rewrite;
}
add_filter('query_vars', 'no_category_base_query_vars');
function no_category_base_query_vars($public_query_vars) {
    $public_query_vars[] = 'category_redirect';
    return $public_query_vars;
}
add_filter('request', 'no_category_base_request');
function no_category_base_request($query_vars) {
    if (isset($query_vars['category_redirect'])) {
        $catlink = trailingslashit(get_option('home')) . user_trailingslashit($query_vars['category_redirect'], 'category');
        status_header(301);
        header("Location: $catlink");
        exit();
    }
    return $query_vars;
}}}
if (!empty(_qzdy('zero-wzl-category'))) {
add_action( 'after_setup_theme', 'zero_wzl_category' );
}
function showCommentsWithUserAgent($comment, $args, $depth)
{
    if ('div' === $args['style']) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
?>
    <<?php echo $tag; ?><?php comment_class(empty($args['has_children']) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
    <?php if ('div' != $args['style']) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body clearfix">
    <?php endif; ?>
    <?php
            if ($args['avatar_size'] != 0)
        echo get_avatar($comment, $args['avatar_size']);
        ?>
    <div class="comment-author vcard">
        <div class="meta">
            <?php printf(__('<span class="name">%s</span>'), get_comment_author_link()); ?>
            <?php printf(__('<span class="date">%1$s · %2$s</span>'), get_comment_date('Y-n-j'), get_comment_time('G:i')); ?>
        </div>
        <?php if ($comment->user_id == '1')
            echo '<i class="fas fa-user-check" data-toggle="tooltip" data-placement="auto top" title="" data-original-title="jxtxzzw"></i>';
        ?>
                <?php if ($comment->pin_top == '1') echo '<i class="fas fa-thumbtack" data-toggle="tooltip" data-placement="auto top" data-original-title="置顶"></i>'; ?>
        <?php CID_print_comment_flag(); 
        ?>
        <?php CID_print_comment_browser(); 
        ?>
        <?php if ($comment->comment_approved == '0') : ?>
            <em class="comment-awaiting-moderation">
                <?php _e('评论正在等待管理员审核...'); ?>
            </em>
            <br/>
        <?php endif; ?>
        <div class="comment-text">
            <?php comment_text(); ?>
        </div>
        <div class="reply">
            <?php $args['reply_text'] = '' ?>
            <div title="<?php echo get_option('comment_reply_tooltip'); ?>" data-toggle="tooltip" class="comment-reply-link-wrap">
                <?php comment_reply_link(array_merge($args, array('add_below' => $add_below, 'depth' => $depth , 'max_depth' => $args['max_depth']))); ?>
            </div>
        </div>
    </div>
    <?php if ('div' != $args['style']) : ?>
        </div>
    <?php endif; ?>
<?php
}
add_filter( 'pre_option_link_manager_enabled', '__return_true' );
function  link_ico($friendimg){
    if(empty(_qzdy('zero-footer-youqinglink-ico'))){ 
if(empty($friendimg)) $friendimg = get_stylesheet_directory_uri().'/images/yqlj.jpg';
        return '<img src="'.$friendimg.'">';
    }
}
    function par_pagenavi($range = 3){
        global $paged, $wp_query;
        if ( !$max_page ) {$max_page = $wp_query->max_num_pages;}
        if($max_page > 1){if(!$paged){$paged = 1;}
        if($paged != 1){echo "<a href='" . get_pagenum_link(1) . "' class='extend' title='跳转到首页'>«</a>";}
        if($max_page > $range){
            if($paged < $range){for($i = 1; $i <= ($range + 1); $i++){echo "<a href='" . get_pagenum_link($i) ."'";
            if($i==$paged)echo " class='current'";echo ">$i</a>";}}
        elseif($paged >= ($max_page - ceil(($range/2)))){
            for($i = $max_page - $range; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
            if($i==$paged)echo " class='current'";echo ">$i</a>";}}
        elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
            for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){echo "<a href='" . get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a>";}}}
        else{for($i = 1; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
        if($i==$paged)echo " class='current'";echo ">$i</a>";}}
        next_posts_link(' »');
    }
    }
function og(){
    if(is_single() && _qzdy('rp-article-og-switch')){
        include(TEMPLATEPATH . '/include/go.php');
    }
}
function Bing_enqueue_scripts(){
    if(!is_404() && !is_single() && !is_page() && _qzdy('rp-fanye-mode')==2){
  wp_register_script( 'themes_js', get_bloginfo( 'template_directory' ) . '/qzdy_style/pageturning.js' );
  wp_enqueue_script( 'themes_js' );
}
}
add_action( 'wp_footer', 'Bing_enqueue_scripts' );
function wpb_hook_style() {
  if (_qzdy('zero-index-gg-notice')) { 
    ?>
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/qzdy_style/module/message/message.css"  media="all">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/qzdy_style/module/message/iconfont.css"  media="all">
    <?php
  }
}
add_action('wp_head', 'wpb_hook_style');
function sing_code_box_javascript() {
      if (is_single() || is_page()) { 
    ?>
<script src="<?php bloginfo('template_url'); ?>/qzdy_style/code.js"></script>
    <?php }
}
add_action('wp_head', 'sing_code_box_javascript');
function header_hide_javascript() {
      if (_qzdy('zero-header-float')) { 
    ?>
<script src="<?php bloginfo('template_url'); ?>/qzdy_style/header-hide.js"></script>
    <?php }
}
add_action('wp_footer', 'header_hide_javascript');
add_filter( 'csf_fa4', '__return_true' );
function custom_posts_per_page($query){
 if(is_home()){
if(!is_paged()){
    $sl=_qzdy('qzdy-index-piece');
}else{
    $sl=_qzdy('qzdy-index-piece');
}
  $query->set('posts_per_page',$sl);
 }
}
add_action('pre_get_posts','custom_posts_per_page');
function kratos_comment_err($a){
    header('HTTP/1.0 500 Internal Server Error');
    header('Content-Type: text/plain;charset=UTF-8');
    echo $a;
    exit;
}
function spam_protection($commentdata){
    if(!is_user_logged_in()){
        if($_POST['co_num1']+$_POST['co_num2']-3!=$_POST['code']) kratos_comment_err(__('验证码错误','moedog'));
    }
    return $commentdata;
}
add_filter('pre_comment_on_post','spam_protection');
function my_enqueue_scripts() {
wp_deregister_script('jquery');
}
add_action( 'wp_enqueue_scripts', 'my_enqueue_scripts', 1 );
if ( !is_admin() ) {
function my_init_method() {
wp_deregister_script( 'jquery' );
}
add_action('init', 'my_init_method');
}
function web_widget_zan(){
    ?>
<script>var shangs=document.getElementById("shangs"); shangs.onclick=function(){layer.open({type: 1,title:'打赏作者',skin: 'layui-layer-demo',closeBtn: 0,anim: 2,shadeClose: true,content: '<?php echo _qzdy('widget-icon-dashang-html');?>' });}</script>
    <?php
}
function web_widget_zan_switch(){
add_action('wp_footer', 'web_widget_zan');
}
function web_widget_personal_left(){
    ?>
      <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/qzdy_style/module/bubble/style.css">
 	<script src="<?php bloginfo('template_url'); ?>/qzdy_style/module/bubble/bubble.js"></script>
    <?php
}
function web_widget_personal_left_switch(){
add_action('wp_footer', 'web_widget_personal_left');
}
function _rp_tw_wzzz(){
    $wzzz = get_post_meta( get_the_ID(), 'rp-wzzz', true );
    if($wzzz){
        $wzzz=$wzzz;
    }elseif(_qzdy('rp-tw-dwzz')){
        $wzzz=_qzdy('rp-tw-dwzz');
    }else{
         $wzzz=post_views('',' 浏览');
    }
    echo $wzzz;
}
function _rp_tw_imgzz(){
    $wzzz = get_post_meta( get_the_ID(), 'rp-imgzz', true );
    if($wzzz){
        $wzzz='摄影 | '.$wzzz;
    }elseif(_qzdy('rp-tw-imgzz')){
        $wzzz='摄影 | '._qzdy('rp-tw-imgzz');
    }else{
         $wzzz='';
    }
    echo $wzzz;
}
function web_body_back(){
    if(_qzdy('zero-body-background') == 'img'){
  $html='background-image: url('. _qzdy('zero-body-background-image') .');';
        echo $html;
    }else if(_qzdy('zero-body-background') == 'color'){
            $cll=count(_qzdy('zero-body-background-color'));
            $ca=1;
            $html='';
            foreach(_qzdy('zero-body-background-color') as $ii ) { 
            $class=($ca<$cll)?',':'';
            $html .=$ii.$class;
            $ca++;
            }
              echo 'background: linear-gradient(135deg, '.$html.');';
    }else if(_qzdy('zero-body-background') == 'd_color'){
      $html=$qtwzpx='background: '._qzdy('zero-body-background-d-color').';'; 
      echo $html.';';
    }else{
        echo 'background: #f1f3f4;'; 
    }
}
    function wpkj_change_search_url_rewrite() {
        if ( is_search() && ! empty( $_GET['s'] ) ) {
            wp_redirect( home_url( "/search/" ) . urlencode( get_query_var( 's' ) ) );
            exit();
        }   
    }
    add_action( 'template_redirect', 'wpkj_change_search_url_rewrite' );
add_action ('wp_enqueue_scripts', 'add_fancybox_script');
function add_fancybox_script() {
    if ( is_single() ) {
        wp_enqueue_script ('fancybox-script', get_template_directory_uri() . '/include/imgbox/fancybox.umd.js', array(), '4.0', true);     
        wp_add_inline_script ('fancybox-script', $add_script, 'after');
   }
}
add_action ('get_footer', 'fancy_footer_styles' );
function fancy_footer_styles() {
    if ( is_single() ) {
        wp_enqueue_style( 'fancybox-style', get_template_directory_uri() . '/include/imgbox/fancybox.css' );
    }   
};
function filter_pre_get_posts( $query ){
    $cat_num=_qzdy('qzdy-category-piece');
  if ( $query->is_main_query() ){
    $num = '';    
    if ( is_category(array(9)) ){ $num = 14; }
    else if ( is_category() ){ $num = $cat_num; }
    if ( '' != $num ){ $query->set( 'posts_per_page', $num ); }
  }
  return $query;
}
add_action('pre_get_posts', 'filter_pre_get_posts');