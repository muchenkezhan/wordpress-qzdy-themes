<?php
    /*
    Namess: 微语分类
    */
?>
<?php get_header();?>
<div class="layui-content">
	<div class="layui-container">
		<div class="layui-row flex layui-col-space15 main <?php qzdy_sidebar_fangxiang();?>">
			<div class="layui-col-md9 layui-col-lg9">
			    <div class="paging-aa text" id="paging-aa">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
				
				<div class="weiyu-list excerpt-sticky" style="margin-top: 10px;">
                <div class="list-box flex-row align-center" data-v-730707dd="">
                <div class="author-box flex-row align-center" data-v-730707dd="">
             <img src="<?php echo _qzdy('zero-footer-txurl');?>" alt="<?php echo _qzdy('zero-footer-txxnc');?>" class="author-img zoomify" data-v-730707dd="" style=""> 
             <div class="author-name" data-v-730707dd=""><p data-v-730707dd=""><?php echo _qzdy('zero-footer-txxnc');?></p> <small data-v-730707dd="">    <?php echo '发表于 '.timeago( get_gmt_from_date(get_the_time('Y-m-d G:i:s')) ); ?></small></div></div>

                </div>
                <div class="" style="padding: 5px 15px 20px 15px;">
                    <?php the_title(); ?></div>
                    <div class="wy-tool ">
                        <div class="">浏览<?php post_views('', ''); ?>次</div><div class="">
                           <div class="comm-tips"><a href="<?php the_permalink();?>"><i class="fa fa-comments" aria-hidden="true"></i></a></div>
                            </div>
                    </div>
            </div>
				<hr/>
				
				<?php endwhile; else: ?>
				<div class="qzdy_ssnrts">
					<p>no!</p>
				</div>
				<?php endif; ?>
				</div>
	<div class="next-page">
	<?php
	$next_page = get_next_posts_link('加载更多');
	if($next_page) echo $next_page;
	?>
	</div>
				</div>
				<?php get_sidebar();?>
			</div>
		</div>
</div>
<?php get_footer();?>
