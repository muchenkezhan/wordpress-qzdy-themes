<?php
/*
Template Name: 分类模板--图文列表
*/
?>
<?php get_header();?>
<div class="layui-content">
<div class="layui-container">

<div class="layui-row flex layui-col-space15 main">
    <div class="layui-col-md12 layui-col-lg12">
        <div class="qzdy_col_body collapse">
            <div class="qzdy-tw">
<?php if(have_posts()):?><?php while(have_posts()):the_post();?>
						<div class="list-cards layui-anim layui-anim-downbit excerpt-sticky">
							<div class="item-inner">
								<article>
									<p class="item-picture-date"><?php the_time('Y / n / j'); ?></p>
									<!--<p class="issue-no">VOL.<php the_ID(); ?></p>-->
									<a href="<?php the_permalink();?>" >
 <?php if(_qzdy('rp-page-tesetu-sw')=='tesetu1'){?>
										<div class="list-img lazy" title="<?php the_title(); ?>" data-original="<?php echo post_thumbnail_srcs(); ?>" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/dna.svg')">
										</div><?php }else{?>
										<img src="<?php echo get_template_directory_uri(); ?>/images/dna.svg" data-original="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo post_thumbnail_srcs(); ?>&w=590&h=500&zc=1" title="<?php the_title(); ?>" class="list-imgphp lazy">
										<?php }?>
									</a>
							<div class="kp-picture">
							<p class="picture-author"><?php _rp_tw_imgzz();?></p>
							<p class="picture-content"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 96,'…'); ?></p>
							 <p class="picture-author"><?php echo _rp_tw_wzzz(); ?></p></div>
								</article>
							</div>
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

</div>
</div>
</div>
</div>
<!--底部版权-->
<?php get_footer();?>