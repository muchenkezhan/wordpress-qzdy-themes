<?php
/*
Template Name: 分类模板--九宫格
*/
?>
<?php get_header();?>
<div class="layui-content">
<div class="layui-container">
        <div class="map pagemap">
<?php if ( function_exists('ah_breadcrumb') ) ah_breadcrumb(); ?>
    </div>
  <?php
  $cat_ID='';
  $flkgg='';
  $cat_ID  = get_query_var('cat');
  $flkgg=get_term_meta($cat_ID,'_prefix_taxonomy_options',true);
  if (empty($flkgg['is_filter']) && empty(_qzdy('is_filter_bar')) ) {?>
<div id="map-sub-classification" class="map-sub-classification">
<div class="container">
<?php get_template_part( '/include/expand/category-filter-bar' );?>
</div>
</div>
<?php } ?>
<div class="layui-row flex layui-col-space15 main <?php qzdy_sidebar_fangxiang();?>">
    <div class="layui-col-md<?php example_theme_liebiao_kuandu();?> layui-col-lg<?php example_theme_liebiao_kuandu();?>">
        <div class="qzdy_col_body collapse">
            <div class="paging-aa" id="paging-aa">
<?php $posts = query_posts($query_string . '&orderby=date&showposts='._qzdy('qzdy-category-piece').''); ?>
<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>
  <div class="excerpt-sticky title-articles list-cards item-boxs">
            <div class="item-inner">
                <div class="index-post-img-small-erban"><a  target="_blank" href="<?php the_permalink() ?>">
<?php if(_qzdy('rp-page-tesetu-sw')=='tesetu1'){?>
 <div title="<?php the_title(); ?>" class="item-thumb-smallerban lazy commodity-img" data-original="<?php echo post_thumbnail_srcs(); ?>" style="background-image: url(data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7)"></div>
<?php }else{?>
 <div title="<?php the_title(); ?>" class="item-thumb-smallerban lazy commodity-img" data-original="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo post_thumbnail_srcs(); ?>&w=300&h=240&zc=1&q=100" style="background-image: url(data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7)"></div>
<?php }?>
            </a></div>
            <a class="item-category" href="<?php $category = get_the_category();if($category[0]){echo ''.get_category_link($category[0]->term_id ).'';}?>" target="_blank"><?php foreach((get_the_category()) as $category){echo $category->cat_name;} ?></a>
            <h3 class="item-title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank"><?php the_title(); ?></a></h3>
            <p class="l-h-2s text-muted"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 96,'…'); ?></p>
            <div class="item-meta"><span class="item-meta-left"><i class="layui-icon layui-icon-log"></i><?php the_time('Y/n/j '); ?></span>
            <div class="item-meta-right"><span><i class="layui-icon layui-icon-fire"></i><?php post_views(' ', ''); ?></span>
            </div></div></div>
        </div>
          <?php endwhile; else: ?>
          <div class="qzdy_ssnrts"> <p>宝贝暂时没有相关的文章哦</p></div>
                <?php endif; ?></div>
           </div>
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
<?php get_sidebar(); ?>
</div>
</div>
</div>
</div>
<!--底部版权-->
<?php get_footer();?>