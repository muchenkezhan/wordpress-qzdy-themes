<?php 
get_header(); ?>
 <!--上面是头部-->
<div class="layui-content<?php echo qzdy_prevent_theme(); ?>">
<div class="layui-container<?php echo qzdy_prevent_theme(); ?>">
<div class="layui-row flex layui-col-space15 <?php qzdy_sidebar_fangxiang();?> main<?php echo qzdy_prevent_theme(); ?>">
<?php _zero_wz_autoMenu_ml_kg(); ?>
<div class="layui-col-md9 layui-col-lg9<?php echo qzdy_prevent_theme(); ?>" <?php qzdy_sidebar_fangxiang(); ?>>
        <div class="text" itemprop="articleBody"  id="qzdywzml">
         	<div class="weiyu-list " style="margin-top: 10px;">
                <div class="list-box flex-row align-center" data-v-730707dd="">
                <div class="author-box flex-row align-center" data-v-730707dd="">
             <img src="<?php echo _qzdy('zero-footer-txurl');?>" alt="<?php echo _qzdy('zero-footer-txxnc');?>" class="author-img zoomify" data-v-730707dd="" style=""> 
             <div class="author-name" data-v-730707dd=""><p data-v-730707dd=""><?php echo _qzdy('zero-footer-txxnc');?></p> <small data-v-730707dd="">    <?php echo '发表于 '.timeago( get_gmt_from_date(get_the_time('Y-m-d G:i:s')) ); ?></small></div></div>

                </div>
                <div class="" style="padding: 5px 15px 20px 15px;">
                    <?php the_title(); ?></div>
                    <div class="wy-tool ">
                        <div class="">浏览<?php post_views('', ''); ?>次</div>
                    </div>
            </div>
        </div>
<?php 
$zero_footer_plk = _qzdy('zero-footer-plk');
	if(!empty($zero_footer_plk)){?>
	<?php if (comments_open() ) { ?>
<div class="clearfix page-comt<?php echo qzdy_prevent_theme(); ?>">
    <?php $file=""; $separate_comments="";?>
    <?php comments_template( $file, $separate_comments ); ?>
</div>
<?php } } ?>
</div>
</div>
</div>
</div>

