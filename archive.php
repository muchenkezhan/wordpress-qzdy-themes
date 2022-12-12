<?php
    /*
    Namess: 秋之德雨默认归档theme
    */
?>
<?php get_header();?>
<div class="layui-content">
	<div class="layui-container">
	    			<div class="map pagemap">
<?php if ( function_exists('ah_breadcrumb') ) ah_breadcrumb(); ?>
			</div>
		<div class="layui-row flex layui-col-space15 main <?php qzdy_sidebar_fangxiang();?>">
			<div class="layui-col-md9 layui-col-lg9">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<div class="title-article list-card item-box<?php echo qzdy_prevent_theme(); ?>">
					<div class="index-post-img-small<?php echo qzdy_prevent_theme(); ?>"><a
							href="<?php the_permalink() ?>">

								            <?php if(_qzdy('rp-page-tesetu-sw')=='tesetu1'){?>
<div title="<?php the_title(); ?>" class="item-thumb-small lazy commodity-img" data-original="<?php echo post_thumbnail_srcs(); ?>" style="background-image: url(data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7)"><span class="layui-badge layui-bg-cyan x"><?php the_time('Y/n/j'); ?></span>
            </div>
<?php }else{?>
<div title="<?php the_title(); ?>" class="item-thumb-small lazy commodity-img" data-original="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo post_thumbnail_srcs(); ?>&w=300&h=240&zc=1&q=100" style="background-image: url(data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7)"><span class="layui-badge layui-bg-cyan x"><?php the_time('Y/n/j'); ?></span>
            </div>
<?php }?>
								</a></div>
					<div class="index-post-text-small">
						<h2 title="<?php the_title(); ?>" class="m-t-none text-ellipsis index-post-title text-title"><a
								href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
						<p class="summary l-h-2x text-muted">
							<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 96,'…'); ?>
						</p>
						<div class="line line-lg b-b b-light"></div>
						<div
							class="text-muted post-item-foot-icon text-ellipsis list-inline<?php echo qzdy_prevent_theme(); ?>">
							<li class="viewfloat">
								<i class="layui-icon layui-icon-slider"></i><a
									href="<?php $category = get_the_category();if($category[0]){echo ''.get_category_link($category[0]->term_id ).'';}?>"><?php foreach((get_the_category()) as $category){echo $category->cat_name;} ?>
								</a></li><li><i class="layui-icon layui-icon-log"></i><?php the_time('Y/n/j '); ?>
							</li>
							<li><i class="layui-icon layui-icon-user"></i><a href=""><?php the_author(); ?></a></li>
							<li><span class="view"><i
										class="layui-icon layui-icon-fire"></i><?php post_views(' ', ''); ?></span>
							</li>
						</div>
					</div>
				</div>
				<?php endwhile; else: ?>
				<div class="qzdy_ssnrts">
					<p>宝贝暂时没有相关的文章哦</p>
				</div>
				<?php endif; ?>
				<div class="pagination" id="pagenavi">
					<p> <?php lingfeng_pagenavi();?></p>
				</div>
			</div>
<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer();?>
