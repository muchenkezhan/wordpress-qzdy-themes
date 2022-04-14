<div class="qzdy-relevant darcyq-card-opacity darcyq-margin-top-bottom-x2 radius-card">
	<div class="layui-card-header">
		<h3><i class="fab fa-readme"></i> 相关推荐</h3>
	</div>
	<div class="layui-card-body">
		<div class="layui-row darcyq-random-item layui-col-space30">

<?php
$cat = get_the_category();
foreach($cat as $key=>$category){
$catid = $category->term_id;
}
$args = array('orderby' => 'rand','showposts' => 4,'cat' => $catid );
$query_posts = new WP_Query();
$query_posts->query($args);
while ($query_posts->have_posts()) : $query_posts->the_post();
?>
    			<div class="layui-col-md3 layui-col-xs6 layui-col-sm4">
				<a href="<?php the_permalink(); ?>" class="darcyq-random-link">
							 <?php if(_qzdy('rp-page-tesetu-sw')=='tesetu1'){?>
			<img class="image lazyloaded" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" src="<?php echo post_thumbnail_srcs(); ?>" alt="<?php the_title(); ?>" width="100%" height="120">
					<?php }else{?>
						<img class="image lazyloaded"
					src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo post_thumbnail_srcs(); ?>&w=300&h=240&zc=1&q=100"
					data-src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
					alt="<?php the_title(); ?>" width="100%" height="120">
					<?php }?>
					<div class="darcyq-random-title">
						<h3 style="font-size: 1.28em" >
							<?php the_title(); ?>
						</h3>
						<span class="darcyq-float-right"><?php the_time('Y-n-j '); ?></span>
						<span><i class="fa fa-eye" aria-hidden="true"></i> <?php post_views(' ', ''); ?>℃</span>
					</div>
				</a>
			</div>
    
<?php endwhile;?>
<?php wp_reset_query(); ?>
		</div>
	</div>
</div>