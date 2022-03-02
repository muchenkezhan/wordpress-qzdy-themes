<?php
add_action('admin_menu', 'of_postviews_menu');
function of_postviews_menu() { 
	add_options_page('浏览计数','<span class="bem"></span>浏览计数','manage_options','views_options', 'postviews_options');
}

add_action( 'wp_head', 'of_process_postviews' );
function of_process_postviews() {
	global $user_ID, $post;
	if( is_int( $post ) ) {
		$post = get_post( $post );
	}
	if( ! wp_is_post_revision( $post ) && ! is_preview() ) {
		if( is_single() || is_page() ) {
			$id = intval( $post->ID );
			$views_options = get_option( 'views_options' );
			if ( !$post_views = get_post_meta( $post->ID, 'views', true ) ) {
				$post_views = 0;
			}
			$should_count = false;
			switch( intval( $views_options['count'] ) ) {
				case 0:
					$should_count = true;
					break;
				case 1:
					if(empty( $_COOKIE[USER_COOKIE] ) && intval( $user_ID ) === 0) {
						$should_count = true;
					}
					break;
				case 2:
					if( intval( $user_ID ) > 0 ) {
						$should_count = true;
					}
					break;
			}
			if( intval( $views_options['exclude_bots'] ) === 1 ) {
				$bots = array(
					'Google Bot' => 'google'
					, 'MSN' => 'msnbot'
					, 'Alex' => 'ia_archiver'
					, 'Lycos' => 'lycos'
					, 'Ask Jeeves' => 'jeeves'
					, 'Altavista' => 'scooter'
					, 'AllTheWeb' => 'fast-webcrawler'
					, 'Inktomi' => 'slurp@inktomi'
					, 'Turnitin.com' => 'turnitinbot'
					, 'Technorati' => 'technorati'
					, 'Yahoo' => 'yahoo'
					, 'Findexa' => 'findexa'
					, 'NextLinks' => 'findlinks'
					, 'Gais' => 'gaisbo'
					, 'WiseNut' => 'zyborg'
					, 'WhoisSource' => 'surveybot'
					, 'Bloglines' => 'bloglines'
					, 'BlogSearch' => 'blogsearch'
					, 'PubSub' => 'pubsub'
					, 'Syndic8' => 'syndic8'
					, 'RadioUserland' => 'userland'
					, 'Gigabot' => 'gigabot'
					, 'Become.com' => 'become.com'
					, 'Baidu' => 'baiduspider'
					, 'so.com' => '360spider'
					, 'Sogou' => 'spider'
					, 'soso.com' => 'sosospider'
					, 'Yandex' => 'yandex'
				);
				$useragent = isset( $_SERVER['HTTP_USER_AGENT'] ) ? $_SERVER['HTTP_USER_AGENT'] : '';
				foreach ( $bots as $name => $lookfor ) {
					if ( ! empty( $useragent ) && ( stristr( $useragent, $lookfor ) !== false ) ) {
						$should_count = false;
						break;
					}
				}
			}
			if( $should_count && ( ( isset( $views_options['use_ajax'] ) && intval( $views_options['use_ajax'] ) === 0 ) || ( !defined( 'WP_CACHE' ) || !WP_CACHE ) ) ) {
				if( isset( $views_options['random_count'] ) && intval( $views_options['random_count'] ) === 1 ) {
					update_post_meta( $id, 'views', ( $post_views + mt_rand(1, $views_options['rand_mt']) ) );
					do_action( 'postviews_increment_views', ( $post_views + mt_rand(1, $views_options['rand_mt']) ) );
				} else {
					update_post_meta( $id, 'views', ( $post_views + 1 ) );
					do_action( 'postviews_increment_views', ( $post_views + 1 ) );
				}
			}
		}
	}
}

add_action('wp_enqueue_scripts', 'of_postview_cache_count_enqueue');
function of_postview_cache_count_enqueue() {
	global $user_ID, $post;

	if( !defined( 'WP_CACHE' ) || !WP_CACHE )
		return;

	$views_options = get_option( 'views_options' );

	if( isset( $views_options['use_ajax'] ) && intval( $views_options['use_ajax'] ) === 0 )
		return;

	if ( !wp_is_post_revision( $post ) && ( is_single() || is_page() ) ) {
		$should_count = false;
		switch( intval( $views_options['count'] ) ) {
			case 0:
				$should_count = true;
				break;
			case 1:
				if ( empty( $_COOKIE[USER_COOKIE] ) && intval( $user_ID ) === 0) {
					$should_count = true;
				}
				break;
			case 2:
				if ( intval( $user_ID ) > 0 ) {
					$should_count = true;
				}
				break;
		}
		if ( $should_count ) {
			wp_enqueue_script( 'wp-postviews-cache', get_template_directory_uri() . '/js/postviews-cache.js', array(), '', true );
			wp_localize_script( 'wp-postviews-cache', 'viewsCacheL10n', array( 'admin_ajax_url' => admin_url( 'admin-ajax.php' ), 'post_id' => intval( $post->ID ) ) );
		}
	}
}

function of_should_views_be_displayed($views_options = null) {
	if ($views_options == null) {
		$views_options = get_option('views_options');
	}
	$display_option = 0;
	return ($display_option == 0);
}

function be_the_views($display = true, $prefix = '', $postfix = '', $always = false) {
	$post_views = intval( get_post_meta( get_the_ID(), 'views', true ) );
	$views_options = get_option('views_options');
	if ($always || of_should_views_be_displayed($views_options)) {
		$output = $prefix.str_replace( array( '%VIEW_COUNT%', '%VIEW_COUNT_ROUNDED%' ), array( number_format_i18n( $post_views ), of_postviews_round_number( $post_views) ), stripslashes( $views_options['template'] ) ).$postfix;
		if ( of_get_option( 'user_views' )) {
			if ( is_user_logged_in()) {
				if($display) {
					echo apply_filters('be_the_views', $output);
				} else {
					return apply_filters('be_the_views', $output);
				}
			}
		} else {
			if($display) {
				echo apply_filters('be_the_views', $output);
			} else {
				return apply_filters('be_the_views', $output);
			}
		}
	}
	elseif (!$display) {
		return '';
	}
}

add_action('publish_post', 'of_add_views_fields');
add_action('publish_page', 'of_add_views_fields');
function of_add_views_fields($post_ID) {
	global $wpdb;
	if(!wp_is_post_revision($post_ID)) {
		add_post_meta($post_ID, 'views', 0, true);
	}
}

add_filter('query_vars', 'of_views_variables');
function of_views_variables($public_query_vars) {
	$public_query_vars[] = 'v_sortby';
	$public_query_vars[] = 'v_orderby';
	return $public_query_vars;
}

add_action( 'wp_ajax_postviews', 'of_increment_views' );
add_action( 'wp_ajax_nopriv_postviews', 'of_increment_views' );
function of_increment_views() {
	if( empty( $_GET['postviews_id'] ) )
		return;

	if( !defined( 'WP_CACHE' ) || !WP_CACHE )
		return;

	$views_options = get_option( 'views_options' );

	if( isset( $views_options['use_ajax'] ) && intval( $views_options['use_ajax'] ) === 0 )
		return;

	$post_id = intval( $_GET['postviews_id'] );
	if( $post_id > 0 ) {
		$post_views = get_post_custom( $post_id );
		$post_views = intval( $post_views['views'][0] );
		if( intval( $views_options['random_count'] ) === 1 ) {
			update_post_meta( $post_id, 'views', ( $post_views + mt_rand(1, $views_options['rand_mt']) ) );
			do_action( 'postviews_increment_views_ajax', ( $post_views + mt_rand(1, $views_options['rand_mt']) ) );
		} else {
			update_post_meta( $post_id, 'views', ( $post_views + 1 ) );
			do_action( 'postviews_increment_views_ajax', ( $post_views + 1 ) );
		}
		echo ( $post_views + 1 );
		exit();
	}
}

add_action('manage_posts_custom_column', 'of_add_postviews_column_content');
add_filter('manage_posts_columns', 'of_add_postviews_column');
add_action('manage_pages_custom_column', 'of_add_postviews_column_content');
add_filter('manage_pages_columns', 'of_add_postviews_column');
function of_add_postviews_column($defaults) {
	$defaults['views'] = __( '浏览', 'begin' );
	return $defaults;
}

function of_add_postviews_column_content($column_name) {
	if($column_name == 'views') {
		if(function_exists('be_the_views')) {
			be_the_views(true, '', '', true);
		}
	}
}

add_filter( 'manage_edit-post_sortable_columns', 'of_sort_postviews_column');
add_filter( 'manage_edit-page_sortable_columns', 'of_sort_postviews_column' );
function of_sort_postviews_column( $defaults ) {
	$defaults['views'] = 'views';
	return $defaults;
}

add_action('pre_get_posts', 'of_sort_postviews');
function of_sort_postviews($query) {
	if ( ! is_admin() ) {
		return;
	}

	$orderby = $query->get('orderby');
	if ( 'views' === $orderby ) {
		$query->set( 'meta_key', 'views' );
		$query->set( 'orderby', 'meta_value_num' );
	}
}

function of_postviews_round_number( $number, $min_value = 1000, $decimal = 1 ) {
	if( $number < $min_value ) {
		return number_format_i18n( $number );
	}
	$alphabets = array( 1000000000 => 'B', 1000000 => 'M', 1000 => 'K' );
	foreach( $alphabets as $key => $value )
		if( $number >= $key ) {
			return round( $number / $key, $decimal ) . '' . $value;
		}
}

add_action( 'init', 'be_views_activation' );
function be_views_activation( $network_wide ) {
	$option_name = 'views_options';
	$option = array(
		'count' => 0,
		'exclude_bots' => 0,
		'use_ajax' => 1,
		'random_count' => 0,
		'rand_mt' => '15',
		'template' => '%VIEW_COUNT%'
	);

	if ( is_multisite() && $network_wide ) {
		$ms_sites = function_exists( 'get_sites' ) ? get_sites() : wp_get_sites();
		if( 0 < count( $ms_sites ) ) {
			foreach ( $ms_sites as $ms_site ) {
				$blog_id = class_exists( 'WP_Site' ) ? $ms_site->blog_id : $ms_site['blog_id'];
				switch_to_blog( $blog_id );
				add_option( $option_name, $option );
				restore_current_blog();
			}
		}
	} else {
		add_option( $option_name, $option );
	}
}

function of_views_options_parse($key) {
	return !empty($_POST[$key]) ? $_POST[$key] : null;
}

function postviews_options() { ?>
<?php
$id = (isset($_GET['id'] ) ? intval($_GET['id'] ) : 0);
$mode = (isset($_GET['mode'] ) ? trim($_GET['mode'] ) : '' );
$text = '';

if(!empty($_POST['Submit'] )) {
	check_admin_referer( 'wp-postviews_options' );
	$views_options = array(
		'count'                   => intval( of_views_options_parse('views_count') ), 
		'exclude_bots'            => intval( of_views_options_parse('views_exclude_bots') ), 
		'random_count'            => intval( of_views_options_parse('views_random_count') ), 
		'rand_mt'                => trim( of_views_options_parse('views_rand_mt') ),
		'use_ajax'                => intval( of_views_options_parse('views_use_ajax') ), 
		'template'                => trim( of_views_options_parse('views_template_template') )
	);
	$update_views_queries = array();
	$update_views_text = array();
	$update_views_queries[] = update_option( 'views_options', $views_options );
	$update_views_text[] = __( '设置', 'begin' );
	$i = 0;

	foreach( $update_views_queries as $update_views_query ) {
		if( $update_views_query ) {
			$text .= '<p style="color: green;">' . $update_views_text[$i] . ' ' . __( '已更新', 'begin' ) . '</p>';
		}
		$i++;
	}
	if( empty( $text ) ) {
		$text = '<p style="color: red;">' . __( '无选项更新', 'begin' ) . '</p>';
	}
}

$views_options = get_option( 'views_options' );

if( !isset ( $views_options['use_ajax'] ) ) {
	$views_options['use_ajax'] = 1;
}
?>
<script type="text/javascript">
	/* <![CDATA[*/
	function views_default_templates(template) {
		var default_template;
		switch(template) {
			case 'template':
				default_template = "<?php _e( '%VIEW_COUNT%', 'begin' ); ?>";
				break;
		}
		jQuery("#views_template_" + template).val(default_template);
	}
	/* ]]> */
</script>
<?php if( !empty( $text ) ) { echo '<div id="message" class="updated fade"><p>' . $text . '</p></div>'; } ?>
<form method="post" action="options-general.php?page=views_options">
<?php wp_nonce_field( 'wp-postviews_options' ); ?>
<div class="wrap">
	<h2><?php _e( '浏览计数设置', 'begin' ); ?></h2>
	<table class="form-table">
		 <tr>
			<td valign="top" width="30%"><strong><?php _e( '计数来自：', 'begin' ); ?></strong></td>
			<td valign="top">
				<select name="views_count" size="1">
					<option value="0"<?php selected( '0', $views_options['count'] ); ?>><?php _e( '所有人', 'begin' ); ?></option>
					<option value="1"<?php selected( '1', $views_options['count'] ); ?>><?php _e( '只有访客', 'begin' ); ?></option>
					<option value="2"<?php selected( '2', $views_options['count'] ); ?>><?php _e( '只有注册用户', 'begin' ); ?></option>
				</select>
			</td>
		</tr>
		<tr>
			<td valign="top" width="30%"><strong><?php _e( '排除机器：', 'begin' ); ?></strong></td>
			<td valign="top">
				<select name="views_exclude_bots" size="1">
					<option value="0"<?php selected( '0', $views_options['exclude_bots'] ); ?>><?php _e( '否', 'begin' ); ?></option>
					<option value="1"<?php selected( '1', $views_options['exclude_bots'] ); ?>><?php _e( '是', 'begin' ); ?></option>
				</select>
			</td>
		</tr>
		<tr>
			<td valign="top" width="30%"><strong><?php _e( '随机计数：', 'begin' ); ?></strong></td>
			<td valign="top">
				<select name="views_random_count" size="1">
					<option value="0"<?php selected( '0', empty($views_options['rand_mt']) ? '' : $views_options['random_count'] ); ?>><?php _e( '否', 'begin' ); ?></option>
					<option value="1"<?php selected( '1', empty($views_options['rand_mt']) ? '' : $views_options['random_count'] ); ?>><?php _e( '是', 'begin' ); ?></option>
				</select>
			</td>
		</tr>
		<tr>
			<td valign="top" width="30%">
				<strong><?php _e( '随机范围：', 'begin' ); ?></strong>
			</td>
			<td valign="top">
				<input type="text" id="views_rand_mt" name="views_rand_mt" size="2" value="<?php echo empty($views_options['rand_mt']) ? '15' : $views_options['rand_mt']; ?>" />
				<p><?php _e( '输入一个数值，计数将在1和数值间随机增加', 'begin' ); ?></p>
			</td>
		</tr>
		<?php if( defined( 'WP_CACHE' ) && WP_CACHE ): ?>
			<tr>
				<td valign="top" width="30%"><strong><?php _e( '使用Ajax更新浏览次数：', 'begin' ); ?></strong></td>
				<td valign="top">
					<select name="views_use_ajax" size="1">
						<option value="0"<?php selected( '0', $views_options['use_ajax'] ); ?>><?php _e( '否', 'begin' ); ?></option>
						<option value="1"<?php selected( '1', $views_options['use_ajax'] ); ?>><?php _e( '是', 'begin' ); ?></option>
					</select>
					<p>
						<?php _e( '如果启用了静态缓存，将使用AJAX在后台更新浏览计数，清理缓存后前端才会显示', 'begin' ); ?>
					</p>
				</td>
			</tr>
		<?php else: ?>
			<input type="hidden" name="views_use_ajax" value="0" />
		<?php endif; ?>
		<tr>
			<td valign="top">
				<strong><?php _e( '显示模板：', 'begin' ); ?></strong><br /><br />
				<?php _e( '可使用的变量：', 'begin' ); ?><br /><br />
				正常显示计数：%VIEW_COUNT%<br />
				以千单位显示：%VIEW_COUNT_ROUNDED%<br /><br />
				<input type="button" name="RestoreDefault" value="<?php _e( '恢复默认模板', 'begin' ); ?>" onclick="views_default_templates( 'template' );" class="button" />
			</td>
			<td valign="top">
				<input type="text" id="views_template_template" name="views_template_template" size="70" value="<?php echo htmlspecialchars(stripslashes($views_options['template'] )); ?>" />
			</td>
		</tr>
	</table>
	<p class="submit">
		<input type="submit" name="Submit" class="button-primary" value="<?php _e( '保存设置', 'begin' ); ?>" />
	</p>
</div>
</form>
<?php }?>