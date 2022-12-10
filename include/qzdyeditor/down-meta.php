<?php
function e_secret($atts, $content=null){ extract(shortcode_atts(array('key'=>null), $atts)); if(isset($_POST['e_secret_key']) && $_POST['e_secret_key']==$key){ return ' <div class="e-secret">'.$content.'</div> '; } else{ return ' <form class="e-secret" action="'.get_permalink().'" method="post" name="e-secret"><label>输入密码查看加密内容：</label><input type="password" name="e_secret_key" class="euc-y-i" maxlength="50"><input type="submit" class="euc-y-s" value="确定"> <div class="euc-clear"></div> </form> '; } } 
add_shortcode('secret','e_secret');
function hide_check_shortcode($atts, $content = null){
	if (is_user_logged_in() && !is_null($content) && !is_feed()) {
		return '<div class="hide-t"><i class="fa fa-spinner" aria-hidden="true"></i>隐藏的内容 </div> <div class="secret-password">' . do_shortcode($content) . '</div>';
	}
	return '	
	<div style="text-align:center;border:1px dashed #FF9A9A;padding:8px;margin:10px auto;color:#FF6666;">
		本文隐藏内容
		<a href="'.get_option('siteurl').'./wp-login.php?redirect_to=.'.urlencode(get_permalink()).'">登陆</a> 后才可以浏览
		</div>';
}
add_shortcode('hide', 'hide_check_shortcode');
function button_link_jzbut($atts,$content=null){
	global $wpdb, $post;
	extract(shortcode_atts(array("href"=>'http://'),$atts));
	if ( get_post_meta($post->ID, 'down_link_much', true) ) {
		return '<div class="qzdy-down-urljz"><a href="'.$href.'" class="layui-btn qzdy-down-ah" rel="external nofollow" target="_blank">'.$content.'</a></div>';
	} else {
		return '<div class="qzdy-down-urljz"><a href="'.$href.'" class="layui-btn qzdy-down-ah" rel="external nofollow" target="_blank">'.do_shortcode(''.do_shortcode( $content ).'').'</a></div>';
	}
}
add_shortcode('jzbut','button_link_jzbut');
function button_link($atts,$content=null){
	global $wpdb, $post;
	extract(shortcode_atts(array("href"=>'http://'),$atts));
	if ( get_post_meta($post->ID, 'down_link_much', true) ) {
		return '<a href="'.$href.'" class="layui-btn qzdy-down-ah" rel="external nofollow" target="_blank">'.$content.'</a>';
	} else {
		return '<a href="'.$href.'" class="layui-btn qzdy-down-ah" rel="external nofollow" target="_blank">'.do_shortcode(''.do_shortcode( $content ).'').'</a>';
	}
}
add_shortcode('link','button_link');
function xcollapse($atts,$content=null,$code=""){
    extract(shortcode_atts(array("title"=>__('标题内容','moedog')),$atts));
    $return = '<div class="layui-collapse" lay-accordion="">
        
        
        <div class="layui-colla-item">
          <h2 class="layui-colla-title">';
    $return .= $title;
    $return .= '<i class="layui-icon layui-colla-icon"></i></h2>
          <div class="layui-colla-content">
            <p>';
    $return .= do_shortcode($content);
    $return .= '</p>
          </div>
        </div>
      </div>';
    return $return;
}
add_shortcode('collapse','xcollapse');
function iframe_add_shortcode( $atts ) {
	$defaults = array(
		'src' => '',
		'width' => '100%',
		'height' => '500',
		'scrolling' => 'yes',
		'class' => 'iframe-class',
		'frameborder' => '0'
	);

	foreach ( $defaults as $default => $value ) {
		if ( ! @array_key_exists( $default, $atts ) ) {
			$atts[$default] = $value;
		}
	}
	$html = '';
	$html .= '<iframe';
	foreach( $atts as $attr => $value ) {
		if ( strtolower($attr) != 'same_height_as' AND strtolower($attr) != 'onload'
			AND strtolower($attr) != 'onpageshow' AND strtolower($attr) != 'onclick') {
			if ( $value != '' ) {
				$html .= ' ' . esc_attr( $attr ) . '="' . esc_attr( $value ) . '"';
			} else {
				$html .= ' ' . esc_attr( $attr );
			}
		}
	}
	$html .= '></iframe>'."\n";

	if ( isset( $atts["same_height_as"] ) ) {
		$html .= '
			<script>
			document.addEventListener("DOMContentLoaded", function(){
				var target_element, iframe_element;
				iframe_element = document.querySelector("iframe.' . esc_attr( $atts["class"] ) . '");
				target_element = document.querySelector("' . esc_attr( $atts["same_height_as"] ) . '");
				iframe_element.style.height = target_element.offsetHeight + "px";
			});
			</script>
		';
	}
	return $html;
}
add_shortcode('iframe','iframe_add_shortcode');
add_action( 'wp_insert_comment', 'auto_reply', 10, 2 );

  function auto_reply($comment_id, $comment_object) {
			
			setcookie("fbreply","1");

		}
add_shortcode('reply', 'reply_to_read');
 
function reply_to_read($atts, $content=null) {
extract(shortcode_atts(array("notice" => '<div class="reply-to-read"><p>温馨提示：此处内容需要<a href="#respond" title="评论本文">评论本文</a>后才能查看。</p></div>'), $atts));


if($name = $_COOKIE['fbreply']=="1"){
	return do_shortcode($content);
}
else{
	return $notice;
}
}
function my_videos( $atts, $content = null ) {
	extract( shortcode_atts( array (
		'src' => '""'
	), $atts ) );
	return '<div class="video-content"><video src="'.$src.'" controls="controls" width="100%"></video></div>';
}
add_shortcode('videos','my_videos');
function zm_green($atts, $content=null){
	return '<div class="alert alert-success">'.do_shortcode( $content ).'</div>';
}

function zm_red($atts, $content=null){
	return '<div class="alert alert-info">'.do_shortcode( $content ).'</div>';
}

function zm_gray($atts, $content=null){
	return '<div class="alert alert-warning">'.do_shortcode( $content ).'</div>';
}

function zm_yellow($atts, $content=null){
	return '<div class="alert alert-danger">'.do_shortcode( $content ).'</div>';
}

add_shortcode('mark_a','zm_green');

add_shortcode('mark_b','zm_red');
add_shortcode('mark_c','zm_gray');
add_shortcode('mark_d','zm_yellow');
function begin_add_mce_button() {
	if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
		return;
	}
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', 'begin_add_tinymce_plugin' );
		add_filter( 'mce_buttons', 'begin_register_mce_button' );
	}
}

function begin_add_tinymce_plugin( $plugin_array ) {
	$plugin_array['begin_mce_button'] = get_bloginfo( 'template_url' ) . '/include/qzdyeditor/mce-button.js';
	return $plugin_array;
}
function begin_register_mce_button( $buttons ) {
	array_push( $buttons, 'begin_mce_button' );
	return $buttons;
}
if (in_array($pagenow, array('post.php', 'post-new.php', 'page.php', 'page-new.php'))) {

	add_action('init', 'begin_add_mce_button');
}