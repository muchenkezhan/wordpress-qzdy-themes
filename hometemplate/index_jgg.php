<?php get_header();?>
<div class="layui-content<?php echo qzdy_prevent_theme(); ?>">
<div class="layui-container">
<div class="layui-row flex layui-col-space15 <?php qzdy_sidebar_fangxiang();?> main<?php echo qzdy_prevent_theme(); ?>">
<div class="layui-col-md9 layui-col-lg9<?php echo qzdy_prevent_theme(); ?>" <?php qzdy_sidebar_fangxiang(); ?>>
<div class="qzdy_col_body<?php echo qzdy_prevent_theme(); ?>">
<?php require get_template_directory() . '/home-yao.php'; ?>
<div class="paging-aa collapse" id="paging-aa">
<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
  <div class="excerpt-sticky title-articles list-cards item-boxs<?php echo qzdy_prevent_theme(); ?>">
            <div class="item-inner">
                <div class="index-post-img-small-erban<?php echo qzdy_prevent_theme(); ?>"><a  target="_blank" href="<?php the_permalink() ?>">
            <?php if(_qzdy('rp-page-tesetu-sw')=='tesetu1'){?>
 <div title="<?php the_title(); ?>" class="item-thumb-smallerban lazy commodity-img" data-original="<?php echo post_thumbnail_srcs(); ?>" style="background-image: url(data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7)"></div>
<?php }else{?>
 <div title="<?php the_title(); ?>" class="item-thumb-smallerban lazy commodity-img" data-original="<?php echo post_thumbnail_srcs_php(); ?>" style="background-image: url(data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7)"></div>
<?php }?></a></div>
            <a class="item-category" href="<?php $category = get_the_category();if($category[0]){echo ''.get_category_link($category[0]->term_id ).'';}?>" target="_blank"><?php foreach((get_the_category()) as $category){echo $category->cat_name;} ?></a>
            <h3 class="item-title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank"><?php if (is_sticky()) {echo  '<span class="layui-badge">推荐</span>';} ?><?php the_title(); ?></a></h3>
            <p class="l-h-2s text-muted"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 96,'…'); ?></p>
            <div class="item-meta"><span class="item-meta-left"><i class="layui-icon layui-icon-log"></i><?php the_time('Y/n/j '); ?></span>
            <div class="item-meta-right"><span><i class="layui-icon layui-icon-fire"></i><?php post_views(' ', ''); ?></span>
            </div></div></div>
        </div>
<?php endwhile; ?>

<?php endif; ?></div>
</div><!--分页-->
			<?php if(_qzdy('rp-fanye-mode')==1){?>
			<div class="pagination" id="pagenavi">
              <p><?php lingfeng_pagenavi();?></p>
</div>
<?php }else{?>
<div class="next-page">
<?php
$next_page = get_next_posts_link('加载更多');
if($next_page) echo $next_page;
?>
</div>
<?php }?>
        </div>
<?php get_sidebar();?>
</div>
</div>
</div>
</div>
<!--底部版权-->
<?php get_footer();?>