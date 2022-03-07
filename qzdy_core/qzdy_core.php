<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.
// Q-Q交-流群：9173673-58
// 作者博客：https://www.aj0.cn/
/**
 *
 * @package   Codestar Framework - WordPress Options Framework
 * @author    Codestar <info@codestarthemes.com>
 * @link      http://codestarframework.com
 * @copyright 2015-2021 Codestar
 *
 *
 * Plugin Name: Qzdy V3.0.0
 * Plugin URI: http://codestarframework.com/
 * Author: Codestar
 * Author URI: http://codestarthemes.com/
 * Version: 2.2.4
 * Description: A Simple and Lightweight WordPress Option Framework for Themes and Plugins
 * Text Domain: csf
 * Domain Path: /languages
 *
 */
// if (!function_exists('_cao')) {
//     function _cao($option = '', $default = null)
//     {
//         $options = get_option('my_framework'); // Attention: Set your unique id of the framework
//         return (isset($options[$option])) ? $options[$option] : $default;
//     }
// }
require_once plugin_dir_path( __FILE__ ) .'classes/setup.class.php';
require_once plugin_dir_path(__FILE__) .'options/options.bittheme.php';//自定义后台文件
//require_once plugin_dir_path(__FILE__) .'samples/metabox-options.php';//文章或页面设置文件
require_once plugin_dir_path(__FILE__) .'options/options.bjq.php';//自定义编辑器文件
require_once plugin_dir_path(__FILE__) .'options/qzdy_classification.php';//分类设置文件
require_once plugin_dir_path(__FILE__) .'options/qzdy_ispage.php';//独立设置文件
//require_once plugin_dir_path(__FILE__) .'samples/admin-options.php';//官方演示
 