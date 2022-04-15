<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?php if (function_exists('is_tag') && is_tag()) {
   single_tag_title('Tag Archive for "'); echo '"_';
} elseif (is_archive()) {
   wp_title(''); echo '_'; bloginfo('description');echo '_';
} elseif (is_search()) {
   echo 'Search for "'.wp_specialchars($s).'"_';
} elseif (!(is_404()) && (is_single()) || (is_page())) {
   wp_title(''); echo '_';
} elseif (is_404()) {
   echo 'Not Found_';
}
if (is_home()) {
   bloginfo('name'); echo '_'; bloginfo('description');
} else {
   bloginfo('name');
}
   if ($paged > 1) {
echo '_page '. $paged;
}?></title>
<?php meta_pd_seo_key_and_des();?>
<meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="apple-mobile-web-app-status-bar-style" content="black"> 
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="format-detection" content="telephone=no">
  <meta name="Referrer" content="origin"/>
  <meta http-equiv="Cache-Control" content="no-transform" />
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <meta name='robots' content='max-image-preview:large' />
  <?php og(); ?>
  <link rel="shortcut icon" href="<?php echo _qzdy('zero-header-favicon'); ?>"/> 
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/qzdy_style/dist/css/layui.css"   media="all">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/qzdy_style/res/static/css/global.css"  media="all">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/qzdy_style/qzdy_main.css"  media="all">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css"  media="all">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/qzdy_style/zoomify.min.css"  media="all">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/jquery/jquery.autoMenu.css"  media="all">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/include/assemblycssjs/snowflake.css"  media="all">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/qzdy_style/woff/font-awesome-4.7.0/css/font-awesome.min.css">
  <script src="https://s3.pstatp.com/cdn/expire-1-M/jquery/3.3.1/jquery.min.js"></script>
<?php example_theme_yinghua(); ?>
<?php qzdy_home_banner_body_height() ?>
<?php wp_head();?>
</head>
<body style="<?php echo qt_body_background(); ?>">
     <div  class="g-glossy-firefox" id="firefoxjs"></div>
<div class="layui-layout layui-layout-admin" id="mbl-element" style="<?php if(_qzdy('opt-index-header-color-box') =='opt-index-header-color-box3'){qt_body_background();}?>">
<div id="topbar" class="layui-header header header-demo g-element-copy" style="<?php echo qt_header_kgzys(); ?>">
<div class="bg bg-blur"></div>
  <div class="layui-main">
    <a class="logo" href="<?php echo get_bloginfo('url');?>">
      <?php echo example_theme_qtlogo(); ?>
    </a>
    <div class="site-tree-mobile layui-hide">
  <i class="layui-icon layui-icon-spread-left"></i>
    <a class="logo1" href="<?php echo get_bloginfo('url');?>">
     <?php echo example_theme_qtlogo(); ?>
    </a>
</div>
    <div class="layui-hide-xs site-notice" id="ssanniu"><span><i class="layui-icon layui-icon-search" style="font-size: 20px; color: #999;"></i> </span>   </div>
<?php 
 if ( function_exists( 'wp_nav_menu' ) && has_nav_menu('nav') ) {
wp_nav_menu( 
array( 
 'theme_location' => 'nav',
 'container'=>'<li>',
 'menu_id'=>'LAY_NAV_TOP',
 'menu_class'=>'layui-nav',
 'fallback_cb'     => 'wp_page_menu',
 'link_before' => '<span>',
 'link_after' => '</span>',
 'walker' => new Header_Menu_Walker()
 )); } else {echo '<div class="navtswz" style="line-height: 60px;"><ul id="menu-1" class="layui-nav rp-nav-pc"><li class=""><a href="/wp-admin/nav-menus.php" aria-current="page">请到[后台->外观->菜单]中设置菜单</a></li></ul></div>';} ?>
  </div>
</div>
  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      <div id="app-aside" class="website-info">
          <div class="wap-bjt" style="background-image: url(<?php echo _qzdy('zero-footer-txbjt'); ?>);"></div>
          <div class="website-avatar pos-rlt">
                <div class="avatar-border">
              <?php $str=_qzdy('zero-index-cbl-login');
    if (!empty($str)) {?>
                    <?php if (!(current_user_can('level_0'))){ ?>  
<img src="<?php echo get_template_directory_uri(); ?>/images/avatar-default.png" alt="">
  	<?php } else { ?>
<?php global $current_user;
get_currentuserinfo();
echo get_avatar( $current_user->ID); ?>
<?php } }else{?>
 <img src="<?php echo _qzdy('zero-footer-txurl'); ?>" alt="">
<?php } ?>
</div>
                <?php if(!empty(_qzdy('zero-personal-huangguan'))){ ?>
<img class="qzdy_fulogo" src="<?php echo _qzdy('zero-personal-huangguan'); ?>" /><?php } ?>
            </div>
<?php $str=_qzdy('zero-index-cbl-login');
    if (!empty($str)) {?>
<?php if (!(current_user_can('level_0'))){ ?> 
<p>Hi!请登陆</p>
  	<?php } else { ?>
<p>你好,<?php global $current_user;
 get_currentuserinfo();
 echo  $current_user->user_login;
?></p>
<?php }}?>
              <?php $str=_qzdy('zero-index-cbl-login');
    if (!empty($str)) {?>
  <?php if (!(current_user_can('level_0'))){ ?>  
<div class="login-cbl"><a href="<?php echo get_option('home'); ?>/wp-login.php" rel="external nofollow"><span>登录/注册</span></a></div>
  	<?php } else { ?>
 <div class="login-cbl"><a href="<?php echo wp_logout_url( get_bloginfo('url') ); ?>" rel="external nofollow"><span>退出登陆</span></a></div>
<?php } }else{?>
            <div class="website-title">
            <p><?php echo _qzdy('zero-footer-txxnc'); ?></p>
        </div>
<?php }?>
 </div>
        <?php
        $locations = get_nav_menu_locations();
        if (isset($locations['navs'])) {
wp_nav_menu( 
array( 
 'theme_location' => 'navs',
 'container'=>'<li>',
 'menu_id'=>'',
 'menu_class'=>'layui-nav layui-nav-tree layui-inline',
 'fallback_cb'     => 'wp_page_menu',
 'link_before' => '<span>',
 'link_after' => '</span>',
  'walker'          => '',
           )
            );
        } else {
            echo '<div style="padding:10px;" class="menu-header-plane">请进入后台配置侧边栏菜单 <a  style="color: red;" href="/wp-admin/nav-menus.php" target="_blank">配置</a> </div>';
        }
        ?>
     </div>
  </div>
   <?php require get_template_directory() . '/include/ssuo/searchform.php'; ?>
 <div class="layui-tab layui-tab-brief" lay-filter="demoTitle">
   <?php require get_template_directory() . '/include/expand/index-header-banner.php'; ?>