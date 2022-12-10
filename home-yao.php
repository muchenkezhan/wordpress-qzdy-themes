
<?php if(is_home()&&!is_paged()) { ?> 
<?php
	if(_qzdy('zero-index-bannerkg') == true){?>
<?php
	if(!empty(_qzdy('opt-group-topping-zhiding'))){?>
<div class="layui-carousel" id="test1">
  <div class="qzdylbtnbox" carousel-item>
      <?php 
 $qt_header_tp = _qzdy('opt-group-topping-zhiding');
 foreach ($qt_header_tp as $key){     
?>
    <div><a <?php if($key['opt-text-topping-blank']){echo 'target="_blank"';}?> href="<?php if($key['opt-text-topping-url']){echo $key['opt-text-topping-url'];}else{echo 'javascript:;';}?>"><img  src="<?php echo esc_url($key['zero-banner-topping-img']); ?>"></a>
    <?php
	if(!empty(_qzdy('zero-index-bannerkg-wzgn'))){?>
    <div class="qzdy-lunbo-content-box">
        
<h3 class="qzdy-top-carousel-title qzdy-hdp-banner-size"><?php echo  $key['opt-group-topping-title'];?></h3>
<?php if($key['opt-text-topping-url']){?>
<div class="read-more"><a <?php if($key['opt-text-topping-blank']){echo 'target="_blank"';}?> href="<?php echo  $key['opt-text-topping-url'];?>"><i class="layui-icon layui-icon-return qzdy_ico_hdp_size" aria-hidden="true"></i>阅读全文</a></div><?php }?></div>
<?php }?>

    </div>
<?php }?>
  </div>
</div>
<?php }?>
<?php }?>

<!--lg-->
<?php 
	if(!empty(_qzdy('zero-index-zhidibng'))){
?>
<div class="qzdy_index__hot">
 <ul class="qzdy_index__hot-list">
<?php 
$qt_header_topping = _qzdy('zero-index-topping-box');
	if(!empty($qt_header_topping)){
        foreach ($qt_header_topping as $key1){
?>
	<li class="item">
		<a class="link" href="<?php the_permalink($key1);?>" title="<?php echo get_post($key1)->post_title; ?>">
			<figure class="inner">
				<span class="views"><?php $views = (int)get_post_meta($key1, 'views', true); global $echo;  if ($echo) echo $before, number_format($views), $after;  else echo $views;   ?> ℃</span>
				  <?php if(_qzdy('rp-page-tesetu-sw')=='tesetu1'){?>
				<img class="image lazyloaded"
					src="<?php $gettesheimg1 = wp_get_attachment_image_src( get_post_thumbnail_id($key1));if(!empty($gettesheimg1)){echo $gettesheimg1[0];}else{echo catch_first_images($key1);}?>"
					data-src="<?php $gettesheimg = wp_get_attachment_image_src( get_post_thumbnail_id($key1));if(!empty($gettesheimg)){echo $gettesheimg[0];}else{echo catch_first_image(); }?>"
					alt="<?php echo get_post($key1)->post_title; ?>" width="100%" height="120">
					
					<?php }else{?>
						<img class="image lazyloaded"
					src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php $gettesheimg1 = wp_get_attachment_image_src( get_post_thumbnail_id($key1));if(!empty($gettesheimg1)){echo $gettesheimg1[0];}else{echo catch_first_images($key1);}?>&w=300&h=240&zc=1&q=100"
					data-src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
					alt="<?php echo get_post($key1)->post_title; ?>" width="100%" height="120">
					<?php }?>
				<figcaption class="title"><?php echo get_post($key1)->post_title; ?></figcaption>
			</figure>
		</a>
	</li>
<?php }?>
<?php }?>
</ul>
</div>
<?php }?>
<?php } ?> 