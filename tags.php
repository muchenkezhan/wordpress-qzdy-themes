<?php 
/* Template Name: 页面模板--Tags
*/
?>
<?php get_header();?>
 <!--上面是头部-->
<div class="layui-content">
<div class="layui-container">
<div class="layui-row layui-col-space15 main">
    <div class="layui-col-md12 layui-col-lg12">
        <!--内容开始-->
        <div class="title-article">
            <h1><?php the_title(); ?></h1>
        </div>
        <div class="text" itemprop="articleBody">
            <div id="md_content_2"   style="overflow: hidden;"  style="" class="md_content markdown-body editormd-html-preview" style="min-height: 50px;">
                        <p>
<?php
$tags_count = 600;
$tagslist = get_tags('orderby=count&order=DESC&number='.$tags_count);
$html = '<ul class="post_tags">';
foreach ($tagslist as $tag){
        $color = dechex(rand(0,16777215));
        $tag_link = get_tag_link($tag->term_id);
                        
        $html .= "<li><a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}' style='color:#{$color}'>";
        $html .= "{$tag->name} ({$tag->count})</a></li>";
}
$html .= '</ul>';
echo $html;
?>
</p>
            </div>
            <!--底部完毕-->
           <div class="the-end">- THE END -</div>
            <!--修改日期-->
            <div class="time-text">
            <i class="layui-icon iconfont iconshijian"></i> 最后修改：<?php the_modified_time('Y年n月d日 H:i:s'); ?></div>
            <!--申明-->
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
</div>
</div>
</div>
</div>
<!--底部版权-->
<?php get_footer();?>