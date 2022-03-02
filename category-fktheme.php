<?php
/*
Template Name: 分类模板--九宫格
*/
?>
<?php get_header();?>
<div class="layui-content">
<div class="layui-container">
<div class="layui-row layui-col-space15 main">
    <div class="map map-class">
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
<?php qzdy_sidebar_switch_left()?>
    <div class="layui-col-md<?php example_theme_liebiao_kuandu();?> layui-col-lg<?php example_theme_liebiao_kuandu();?>">
        <div class="qzdy_col_body">
        <?php $posts = query_posts($query_string . '&orderby=date&showposts=18'); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>      
  <div class="title-articles list-cards item-boxs">
            <div class="item-inner">
                <div class="index-post-img-small-erban"><a  target="_blank" href="<?php the_permalink() ?>">
            <div title="<?php the_title(); ?>" class="item-thumb-smallerban lazy commodity-img" data-original="<?php $gettesheimg = wp_get_attachment_image_src( get_post_thumbnail_id());if(!empty($gettesheimg)){echo $gettesheimg[0];}else{echo catch_first_image(); }?>" style="background-image: url(data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7)"></div></a></div>
            <a class="item-category" href="<?php $category = get_the_category();if($category[0]){echo ''.get_category_link($category[0]->term_id ).'';}?>" target="_blank"><?php foreach((get_the_category()) as $category){echo $category->cat_name;} ?></a>
            <h3 class="item-title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank"><?php the_title(); ?></a></h3>
            <p class="l-h-2s text-muted"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 96,'…'); ?></p>
            <div class="item-meta"><span class="item-meta-left"><i class="layui-icon layui-icon-log"></i><?php the_time('Y/n/j '); ?></span>
            <div class="item-meta-right"><span><i class="layui-icon layui-icon-fire"></i><?php post_views(' ', ''); ?></span>
            </div></div></div>
        </div>
          <?php endwhile; else: ?>
          <div class="qzdy_ssnrts"> <p>宝贝暂时没有相关的文章哦</p></div>
                <?php endif; ?>
           </div>
             <div class="pagination" id="pagenavi">
              <p>  <?php lingfeng_pagenavi();?></p>
                            </div>
        </div>
<?php qzdy_sidebar_switch_right(); ?>
</div>
</div>
</div>
</div>
<!--底部版权-->
<?php get_footer();?>