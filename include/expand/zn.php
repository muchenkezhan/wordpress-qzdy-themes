<?php 
//禁用所有文章类型的修订版本
add_filter( 'wp_revisions_to_keep', 'specs_wp_revisions_to_keep', 10, 2 );
function specs_wp_revisions_to_keep( $num, $post ) {
return 0;
}
// 编辑器增强
function enable_more_buttons($buttons) {
	$buttons[] = 'del';
	$buttons[] = 'copy';
	$buttons[] = 'cut';
	$buttons[] = 'fontselect';
	$buttons[] = 'fontsizeselect';
	$buttons[] = 'styleselect';
	$buttons[] = 'wp_page';
	$buttons[] = 'backcolor';
	return $buttons;
}
add_filter( "mce_buttons_2", "enable_more_buttons" );
// 禁止代码标点转换
remove_filter( 'the_content', 'wptexturize' );
// 禁止后台加载谷歌字体
function wp_remove_open_sans_from_wp_core() {
	wp_deregister_style( 'open-sans' );
	wp_register_style( 'open-sans', false );
	wp_enqueue_style('open-sans','');
}
add_action( 'init', 'wp_remove_open_sans_from_wp_core' );
//去除头部多余加载信息
remove_action( 'wp_head', 'wp_generator' );//移除WordPress版本
remove_action( 'wp_head', 'rsd_link' );//移除离线编辑器开放接口
remove_action( 'wp_head', 'wlwmanifest_link' );//移除离线编辑器开放接口
remove_action( 'wp_head', 'index_rel_link' );//去除本页唯一链接信息
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); //清除前后文信息
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );//清除前后文信息
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );//清除前后文信息
remove_action( 'wp_head', 'feed_links', 2 );//移除文章和评论feed
remove_action( 'wp_head', 'feed_links_extra', 3 ); //移除分类等feed
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 ); //移除wp-json
remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); //头部的JS代码
add_filter( 'show_admin_bar', '__return_false' );//移除wp-json链接
remove_action( 'wp_head', 'rel_canonical' ); //rel=canonical
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 ); //rel=shortlink
//remove_action( 'wp_head', 'wp_print_styles', 8 ); //移除后台插件加载css
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );//移除emoji载入js
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );//emoji载入js
remove_action( 'wp_print_styles', 'print_emoji_styles' );//移除emoji载入css
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action('wp_head','wp_resource_hints',2);//移除dns-prefetch
remove_action( 'wp_head', 'wp_print_styles', 8 );//载入css
// 禁止加载block-library/style.min.css

add_action('wp_enqueue_scripts', function () {

   wp_dequeue_style('wp-block-library');

});
function my_remove_recent_comments_style() {
global $wp_widget_factory;
remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'] ,'recent_comments_style'));
}
?>