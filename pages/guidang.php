<?php 
/* template name: 页面模板--归档
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
<hr/>
        </div>
        <div class="text" itemprop="articleBody">
            <div id="md_content_2" class="md_content markdown-body editormd-html-preview" style="min-height: 50px;">
                        <div style="overflow: hidden;">
<div class="archives">
<?php
$previous_year = $year = 0;
$previous_month = $month = 0;
$ul_open = false;
$myposts = get_posts('numberposts=-1&orderby=post_date&order=DESC');
foreach($myposts as $post) :
setup_postdata($post);
$year = mysql2date('Y', $post->post_date);
$month = mysql2date('n', $post->post_date);
$day = mysql2date('j', $post->post_date);
if($year != $previous_year || $month != $previous_month) :
if($ul_open == true) :
echo '</ul><hr>';
endif;
echo '<h4 class="m-title">'; echo the_time('Y-m'); echo '</h4>';
echo '<ul class="archives-monthlisting">';
$ul_open = true;
endif;
$previous_year = $year; $previous_month = $month;
?>
<li>
<a href="<?php the_permalink(); ?>"><span class="atitles"><?php the_time('j'); ?>日</span>
<div class="atitle"><?php the_title(); ?><?php comments_number('', '1评论', '%评论'); ?></div></a>
</li>
<?php endforeach; ?>
</ul>
</div>

            </div>
            <!--底部完毕-->
<div class="the-end">- THE END -</div>
            <!--申明-->
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
</div>
</div>
</div>
</div>
<!--底部版权-->
<?php get_footer();?>