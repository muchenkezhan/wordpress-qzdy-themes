<?php get_header();?>
 <!--上面是头部-->
<div class="layui-content<?php echo qzdy_prevent_theme(); ?>">
<div class="layui-container<?php echo qzdy_prevent_theme(); ?>">
<div class="layui-row flex layui-col-space15 <?php qzdy_sidebar_fangxiang();?> main<?php echo qzdy_prevent_theme(); ?>">
<?php _zero_wz_autoMenu_ml_kg(); ?>
<div class="layui-col-md9 layui-col-lg9<?php echo qzdy_prevent_theme(); ?>">
<!--内容页面上的分类提示-->
<div class="map"><?php if ( function_exists('ah_breadcrumb') ) ah_breadcrumb(); ?></div>
    <!--提示结束-->
        <!--内容开始-->
        <div class="title-article">
            <div class="qzdy-title"><h1><?php the_title(); ?></h1></div>
            <div class="title-msg dy-text-small">
                <?php if(!empty($article_author = _qzdy('zero-footer-article-author'))){?>
                <span><i class="layui-icon layui-icon-username"></i><?php echo get_the_author_meta( 'nickname', $post->post_author ) ?></span><?php } ?>
                <span><i class="layui-icon layui-icon-time"></i><?php the_time('Y-n-j'); ?></span>
                <span><i class="fa fa-eye" aria-hidden="true"></i><?php post_views('',''); ?></span>
                <span><?php edit_post_link('[编辑]'); ?></span>
                <span class="time_eye_catching"><?php the_time('n/j'); ?></span>
            </div>
        </div>
        <?php if(_qzdy('ggw-2-switcher')){?>
<div class="">
<?php if(_qzdy('ggw-2')){
echo _qzdy('ggw-2');
}?>
</div><?php }?>
        <div class="text" itemprop="articleBody"  id="qzdywzml">
            <div id="md_content_2" class="md_content markdown-body editormd-html-preview" style="min-height: 50px;">
<?php the_content(); ?>
            </div>
            <!--底部完毕-->
            <div class="the-end">- THE END -</div>
            <!--标签-->
            <div class="tags-text"><i class="layui-icon layui-icon-note<?php echo qzdy_prevent_theme(); ?>"></i><?php the_tags('Tag：', '' , ''); ?> </div>
            <!--标签-->
 <?php if(_qzdy('ggw-3-switcher')){?>
<div class="">
<?php if(_qzdy('ggw-3')){
echo _qzdy('ggw-3');
}?>
</div>
<?php }?>
            <!--点赞-->
<?php 
	if(!empty($zero_footer_dianzan = _qzdy('zero-footer-dianzan'))){?>
    <div class="post-likes">
        <div class="post-likebox">
             <a title="点赞!"  href="javascript:;" data-action="ding" data-id="<?php the_ID(); ?>" class="favorite<?php if(isset($_COOKIE['bigfa_ding_'.$post->ID])) echo ' done';?>"><i class="layui-icon layui-icon-praise" style="font-size: 30px; "></i><span class="count">
                <?php if( get_post_meta($post->ID,'bigfa_ding',true) ){
                        echo get_post_meta($post->ID,'bigfa_ding',true);
                     } else {
                        echo '0';
                     }?></span></a>
     </div> </div>
<?php } ?>
            <!--申明-->
            <div class="copy-text">
            <div>
                <p><?php echo _wenzhangbanquan();?></p>
                <p class="hidden-xs">如若转载，请注明出处：<a href="<?php echo get_permalink(); ?>"><?php echo get_permalink(); ?></a> </p>
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
<!--?php get_sidebar();?>-->
</div>
</div>
</div>
</div>
<!--底部版权-->
<?php get_footer();?>