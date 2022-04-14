<?php 
/* template name: 页面模板--双栏
*/
?>
<?php get_header();?>
 <!--上面是头部-->
<div class="layui-content">
<div class="layui-container">
<div class="layui-row flex layui-col-space15 main <?php qzdy_sidebar_fangxiang(); ?>">
    <div class="layui-col-md9 layui-col-lg9">
        <!--内容开始-->
        <div class="title-article">
            <h1><?php the_title(); ?></h1>
            <div class="title-msg">
                <?php if(!empty($article_author = _qzdy('zero-footer-article-author'))){?>
                <span><i class="layui-icon layui-icon-username"></i><?php echo _qzdy('zero-footer-txxnc');?></span><?php } ?>
                <span><i class="layui-icon layui-icon-time"></i><?php the_time(' Y/n/j'); ?></span>
                <span><i class="fa fa-eye" aria-hidden="true"></i><?php post_views(' ',''); ?>℃</span>
                <span><?php edit_post_link('[编辑]'); ?></span>
            </div>
        </div>
        <div class="text" itemprop="articleBody">
            <div id="md_content_2" class="md_content markdown-body editormd-html-preview" style="min-height: 50px;">
                        <p>
<?php the_content();?>
</p>
            </div>
            <!--底部完毕-->
           <div class="the-end">- THE END -</div>
         
            <!--修改日期-->
            <div class="time-text">
            <i class="layui-icon iconfont iconshijian"></i> 最后修改：<?php the_modified_time('Y年n月d日 H:i:s'); ?></div>
            <!--申明-->
            <div class="copy-text">
            <div>
                <p><?php echo _wenzhangbanquan();?></p>
                <p class="hidden-xs">如若转载，请注明出处：<a><?php echo get_permalink(); ?></a> </p>
            </div>
        </div>
        </div>
<?php 
$zero_footer_plk = _qzdy('zero-footer-plk');
	if(!empty($zero_footer_plk)){?>
	<?php if (comments_open() ) { ?>
<div class="page-comt<?php echo qzdy_prevent_theme(); ?>">
    <?php $file=""; $separate_comments="";?>
    <?php comments_template( $file, $separate_comments ); ?>
</div>
<?php } } ?>
</div>
<?php get_sidebar();?>
</div>
</div>
</div>
</div>
<!--底部版权-->
<?php get_footer();?>