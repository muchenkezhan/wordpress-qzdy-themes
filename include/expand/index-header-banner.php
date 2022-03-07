 <?php if(!empty(_qzdy('zero-header-gbqzbjan'))){?>
     <?php if(_qzdy('opt-index-banner-moxin') =='opt-index-xbanner') {?>
     <div id="header_bg" style="height:<?php echo qt_header_kggd(); ?>; background-image: url(<?php qt_header_kgtp(); ?>);"></div>
     <?php }?>
     
    <?php if(_qzdy('opt-index-banner-moxin') =='opt-index-dbanner') {?>
     <section id="big-image-title-part">
<div class="big-image lazy loaded layui-hide-xs" id="header" data-ll-status="loaded" style="background-image: url(<?php qzdy_classification_banner() ?>);">
<div class="bgtdiv">
<p><?php if (function_exists('is_tag') && is_tag()) {
   single_tag_title('Tag Archive for "');
} elseif (is_archive()) {
   wp_title(''); 
} elseif (is_search()) {
   echo 'Search for "'.wp_specialchars($s).'"_';
} elseif (!(is_404()) && (is_single()) || (is_page())) {
   short_title();
} elseif (is_404()) {
   echo 'Not Found_';
}
if (is_home()) {
  echo _qzdy('opt-group-topping-datu-title');
// echo '<img style="width:300px;" src="https://aj0.cn/wp-content/uploads/2022/02/000001_1.png">';
} 
   if ($paged > 1) {
echo '_page '. $paged;
}?>
</p><h1><?php if (function_exists('is_tag') && is_tag()) {
   single_tag_title('Tag Archive for "');
} elseif (is_archive()) {
   echo category_description();
} elseif (is_search()) {
   echo 'Search for "'.wp_specialchars($s).'"_';
} elseif (!(is_404()) && (is_single()) || (is_page())) {
    // 内容页面描述
    $qzdy_zdy_ym_des=get_post_meta( get_the_ID(), 'qzdy_zdy_ym_des', true );
 if(!empty($qzdy_zdy_ym_des)){
    $qzdy_zdy_ym_des = mb_strimwidth($qzdy_zdy_ym_des,0,80,"..." );
    echo $qzdy_zdy_ym_des;
}else{
    $my_excerpt = get_the_excerpt();
    $my_content = str_replace(array("/r/n","/rn", "/r", "/n", " ", "&nbsp", "/t", "&#160;", "/x0B", "&nbsp;","[&hellip;]"),"",$my_excerpt);
     $qzdy_zdy_ym_des = mb_strimwidth($my_content,0,80,"..." );
    echo $qzdy_zdy_ym_des;
}
} elseif (is_404()) {
   echo 'Not Found_';
}
if (is_home()) {
  echo _qzdy('opt-group-topping-datu-futitle');
} 
   if ($paged > 1) {
echo '_page '. $paged;
}?>
</h1></div></div>
</section>
<section id="weves-box-part">
<div class="waves-box ">
<svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
<defs>
<path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
</defs>
<g class="parallax">
<use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(241,241,241,0.7"></use>
<use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(241,241,241,0.5)"></use>
<use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(241,241,241,0.3)"></use>
<use xlink:href="#gentle-wave" x="48" y="7" fill="#f8f9fa"></use>
</g>
</svg>
</div>
</section>
    <?php }?>
   <?php  }elseif(empty(_qzdy('zero-header-gbqzbjan'))){?>
     <div id="header_bg"  <?php qt_header_kgbanner_height();?> ></div>
     <?php }?>
