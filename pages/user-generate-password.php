<?php

add_action('init', 'ugp_textdomain');
function ugp_textdomain() {
	load_plugin_textdomain('ugp-domain', false, 'user-generate-password');
}
add_action( 'register_form', 'ugp_show_extra_register_fields' );
function ugp_show_extra_register_fields(){
	?>
	<p>
	<label for="password"><?php _e( '密码(8位以上)', 'ugp-domain' );?><br/>
	<input id="password" class="input" type="password" tabindex="30" size="25" value="" name="password" />
	</label>
	</p>
	<p>
	<label for="repeat_password"><?php _e( '重复密码', 'ugp-domain' );?><br/>
	<input id="repeat_password" class="input" type="password" tabindex="40" size="25" value="" name="repeat_password" />
	</label>
	</p>
	<p>
	<label for="are_you_human" style="font-size:14px"><?php _e( '很抱歉为防止机器注册，请填写本站名称：<b>'.get_bloginfo('name').'</b>' , 'ugp-domain' ); ?><br/>
	<input id="are_you_human" class="input" type="text" tabindex="40" size="25" value="" name="are_you_human" />
	</label>
	</p>
	<?php
}
/*
 * Check the form for errors
 */
add_action( 'register_post', 'ugp_check_extra_register_fields', 10, 3 );
function ugp_check_extra_register_fields($login, $email, $errors) {
	if ( $_POST['password'] !== $_POST['repeat_password'] ) {
		$errors->add( 'passwords_not_matched', __("<strong>错误</strong>: 密码不能为空", 'ugp-domain' ) );
	}
	if ( strlen( $_POST['password'] ) < 8 ) {
		$errors->add( 'password_too_short', __("<strong>错误</strong>:  密码长度必须至少为八个字符 ", 'ugp-domain' ) );
	}
	if ( $_POST['are_you_human'] !== get_bloginfo( 'name' ) ) {
		$errors->add( 'not_human', __("<strong>错误</strong>: 请正确填写本站名称.", 'ugp-domain' ) );
	}
}

/*
 * Storing WordPress user-selected password into database on registration
 */

add_action( 'user_register', 'ugp_register_extra_fields', 100 );
function ugp_register_extra_fields( $user_id ){
	$userdata = array();
	
	$userdata['ID'] = $user_id;
	if ( $_POST['password'] !== '' ) {
		$userdata['user_pass'] = $_POST['password'];
	}
	$new_user_id = wp_update_user( $userdata );
}

/*
 * Editing WordPress registration confirmation message
 */

add_filter( 'gettext', 'ugp_edit_password_email_text',20, 3 );
function ugp_edit_password_email_text ( $translated_text, $untranslated_text, $domain ) {
	if(in_array($GLOBALS['pagenow'], array('wp-login.php'))){
		if ( $untranslated_text == '密码将通过电子邮件发送给您.' ) {
			$translated_text = __( ' 如果您将密码字段留空，将为您生成一个密码字段。密码长度必须至少为八个字符.', 'ugp-domain' );
		}
		if( $untranslated_text == ' 注册完成,请检查您的电子邮件.' ) {
			$translated_text = __( '注册完成。请登录或查看您的电子邮件。', 'ugp-domain' );
		}
	}
	return $translated_text;
}
?>