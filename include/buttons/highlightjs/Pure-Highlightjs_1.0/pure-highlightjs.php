<?php
/*
Plugin Name: Pure Highlightjs
Plugin URI: https://github.com/icodechef/Pure-Highlightjs
Description: Pure Syntax highlighting for the Web.
Author: iCodeChef
Version: 1.0
Author URI: http://icodechef.com
License: MIT
*/

if ( !function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

define( 'PURE_HIGHLIGHTJS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'PURE_HIGHLIGHTJS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'PURE_HIGHLIGHTJS_DEFAULT_THEME', 'default' );

register_activation_hook( __FILE__, 'pure_highlightjs_activation' );
register_deactivation_hook( __FILE__, 'pure_highlightjs_deactivation' );

function pure_highlightjs_activation() {
}

function pure_highlightjs_deactivation() {
    delete_option('pure-highlightjs-theme');
}

add_action( 'admin_init', 'pure_highlightjs_admin_init' );

function pure_highlightjs_admin_init() {
    static $inited = false;

    if ( $inited ) {
        return;
    }

    register_setting( 'pure-highlightjs-group', 'pure-highlightjs-theme' );

    load_plugin_textdomain( 'pure-highlightjs', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );

    pure_highlightjs_update_option();

    $inited = true;
}

add_filter( 'plugin_action_links', 'pure_highlightjs_action_links', 10, 2 );

function pure_highlightjs_action_links( $links, $file ) {
    if ( $file == plugin_basename( __FILE__ ) ) {
        $links[] = '<a href="' . esc_url( pure_highlightjs_get_page_url() ) . '">' . esc_html__( 'Settings' , 'pure-highlightjs') . '</a>';
    }

    return $links;
}

add_action( 'wp_enqueue_scripts', 'pure_highlightjs_assets' );

function pure_highlightjs_assets() {
    wp_enqueue_style( 'pure-highlightjs-style', PURE_HIGHLIGHTJS_PLUGIN_URL . 'highlight/styles/' . pure_highlightjs_option('pure-highlightjs-theme', PURE_HIGHLIGHTJS_DEFAULT_THEME) . '.css', array(), '0.9.2' );
    wp_enqueue_style( 'pure-highlightjs-css', PURE_HIGHLIGHTJS_PLUGIN_URL . 'assets/pure-highlight.css', array(), '0.1.0' );
    wp_enqueue_script( 'pure-highlightjs-pack', PURE_HIGHLIGHTJS_PLUGIN_URL . 'highlight/highlight.pack.js', array(), '0.9.2', true );
}

add_action( 'admin_enqueue_scripts', 'pure_highlightjs_admin_assets' );

function pure_highlightjs_admin_assets() {
    global $hook_suffix;

    if ( in_array( $hook_suffix, array(
            'index.php', # dashboard
            'post.php',
            'post-new.php',
            'settings_page_pure-highlightjs-config',
        ) ) ) {
        wp_enqueue_script( 'pure-highlightjs', PURE_HIGHLIGHTJS_PLUGIN_URL . 'assets/pure-highlight.js', array(), '0.1.0', true );

        wp_enqueue_script( 'pure-highlightjs-pack', PURE_HIGHLIGHTJS_PLUGIN_URL . 'highlight/highlight.pack.js', array(), '0.9.2', true );

        wp_localize_script( 'pure-highlightjs', 'PureHighlightjsTrans', array(
            'title' => __( "Code Insert", 'pure-highlightjs' ),
            'language' => __( "Language", 'pure-highlightjs' ),
            'code' => __( "Source Code", 'pure-highlightjs' ),
        ));
    }
}

// load tinyMCE pure-highlightjs plugin
add_filter('mce_external_plugins', 'pure_highlightjs_mce_plugin');

function pure_highlightjs_mce_plugin( $mce_plugins ) {
    $mce_plugins['purehighlightjs'] = PURE_HIGHLIGHTJS_PLUGIN_URL . 'tinymce/tinymce.js';
    return $mce_plugins;
}

add_filter( 'mce_css', 'pure_highlightjs_mce_css');

function pure_highlightjs_mce_css( $mce_css ) {
    if (! is_array($mce_css) ) {
        $mce_css = explode(',', $mce_css);
    }

    $mce_css[] = PURE_HIGHLIGHTJS_PLUGIN_URL . 'tinymce/tinymce.css';

    return implode( ',', $mce_css );
}

add_filter('mce_buttons', 'pure_highlightjs_mce_buttons', 101);

function pure_highlightjs_mce_buttons( $buttons ) {
    if (! in_array('PureHighlightjsInsert', $buttons) ){
        $buttons[] = 'PureHighlightjsInsert';
    }
    return $buttons;
}

add_action('admin_menu', 'pure_highlightjs_plugin_menu');

function pure_highlightjs_plugin_menu() {
    $hook = add_options_page( __('Pure highlightjs', 'pure-highlightjs'), __('Pure highlightjs', 'pure-highlightjs'), 'manage_options', 'pure-highlightjs-config', 'pure_highlightjs_settings_page' );
}

function pure_highlightjs_settings_page() {
    // include admin page
    include PURE_HIGHLIGHTJS_PLUGIN_DIR.'/views/settings.php';
}

function pure_highlightjs_get_style_list($theme = '') {
    $path = PURE_HIGHLIGHTJS_PLUGIN_DIR . 'highlight/styles';

    $themes = array();
    foreach (new DirectoryIterator($path) as $fileInfo) {
        if ($fileInfo->isDot() || ! $fileInfo->isFile()) {
            continue;
        }

        $filename = $fileInfo->getFilename();

        if ('.css' != substr($filename, -4)) {
            continue;
        }

        $themes[] = substr($filename, 0, - 4);;
    }

    sort($themes);

    return $themes;
}

function pure_highlightjs_get_page_url() {
    $args = array( 'page' => 'pure-highlightjs-config' );
    return add_query_arg( $args, admin_url( 'options-general.php') ); 
}

function pure_highlightjs_update_option() {
    if ( isset( $_POST['formaction'] ) && $_POST['formaction'] == 'update-pure-highlightjs' ) {
        // do nothing
    }
}

function pure_highlightjs_option($key, $default = null) {
    $option = get_option($key);

    return !empty($option) ? $option : $default;
}