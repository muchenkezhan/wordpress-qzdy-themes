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
					<img alt="<?php the_title(); ?>" title="" src="<?php $gettesheimg = wp_get_attachment_image_src( get_post_thumbnail_id());if(!empty($gettesheimg)){echo $gettesheimg[0];}else{echo catch_first_image(); }?>"
						class="darcyq-random-img" width="100%" height="130">
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