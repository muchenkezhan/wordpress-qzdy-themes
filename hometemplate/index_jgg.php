<?php get_header();?>
<div class="layui-content<?php echo qzdy_prevent_theme(); ?>">
<div class="layui-container">
<div class="layui-row layui-col-space15 main<?php echo qzdy_prevent_theme(); ?>">
           <?php 
	if(_qzdy('opt-index-sidebar-position') == 'opt-sidebar-left'){
?>
        <?php get_sidebar();?>
        <?php } ?>
<div class="layui-col-md9 layui-col-lg9<?php echo qzdy_prevent_theme(); ?>">
<div class="qzdy_col_body<?php echo qzdy_prevent_theme(); ?>">
<?php require get_template_directory() . '/home-yao.php'; ?>
<?php
$page_num = $paged;
if ($pagenum="") $pagenum =1;
query_posts('showposts=15&paged='.$page_num); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
  <div class="title-articles list-cards item-boxs<?php echo qzdy_prevent_theme(); ?>">
            <div class="item-inner">
                <div class="index-post-img-small-erban<?php echo qzdy_prevent_theme(); ?>"><a  target="_blank" href="<?php the_permalink() ?>">
            <div title="<?php the_title(); ?>" class="item-thumb-smallerban lazy commodity-img" data-original="<?php $gettesheimg = wp_get_attachment_image_src( get_post_thumbnail_id());if(!empty($gettesheimg)){echo $gettesheimg[0];}else{echo catch_first_image(); }?>" style="background-image: url(data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7)"></div></a></div>
            <a class="item-category" href="<?php $category = get_the_category();if($category[0]){echo ''.get_category_link($category[0]->term_id ).'';}?>" target="_blank"><?php foreach((get_the_category()) as $category){echo $category->cat_name;} ?></a>
            <h3 class="item-title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank"><?php if (is_sticky()) {echo  '<span class="layui-badge">推荐</span>';} ?><?php the_title(); ?></a></h3>
            <p class="l-h-2s text-muted"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 96,'…'); ?></p>
            <div class="item-meta"><span class="item-meta-left"><i class="layui-icon layui-icon-log"></i><?php the_time('Y/n/j '); ?></span>
            <div class="item-meta-right"><span><i class="layui-icon layui-icon-fire"></i><?php post_views(' ', ''); ?></span>
            </div></div></div>
        </div>
          <?php endwhile; else: ?>
          <div class="qzdy_ssnrts"><p>宝贝暂时没有相关的文章哦</p></div>
                <?php endif; ?>
</div><!--分页-->
             <div class="pagination" id="pagenavi">
              <p>  <?php lingfeng_pagenavi();?></p>
                            </div>
        </div>
       <?php
	if(_qzdy('opt-index-sidebar-position') == 'opt-sidebar-right'){
?>
        <?php get_sidebar();?>
        <?php } ?>
</div>
</div>
</div>
</div>
<!--底部版权-->
<?php get_footer();?>