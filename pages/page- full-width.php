<?php 
/* template name: 页面模板--友人帐
description: template for Git theme 

//网站头部 
<!--内容-->*/
?>
<?php get_header();?>
<!--上面是头部-->
<div class="layui-content">
	<div class="layui-container">
		<div class="layui-row layui-col-space15 main">
			<!--内容页面上的分类提示-->

			<!--提示结束-->
			<div class="layui-col-md12 layui-col-lg12">

				<!--内容开始-->
				<div class="title-article">
					<h1><?php the_title(); ?></h1>
					<hr />
				</div>
				<div class="text" itemprop="articleBody">
					<div id="md_content_2" class="md_content markdown-body editormd-html-preview"
						style="min-height: 50px;">
						<div style="overflow: hidden;">
							<?php the_content(); ?>





							<?php 
        	if(!empty(_qzdy('opt-yrz-title'))){
        foreach (_qzdy('opt-yrz-title') as $key10){?>
							<div class="l-title">
								<h1><?php echo  $key10['opt-yrz-box'];?></h1>
							</div>
							<div class="yrzbodybox yrz-top">


								<?php 
                if(!empty($key10['opt-yrz-box-box'])){
                foreach ($key10['opt-yrz-box-box'] as $key11){?>
								<a target="_blank" href="<?php echo  $key11['opt-yrz-box-box-url'];?>">
									<div class="yrzbox">
										<div class="yrzboximg yzrboxpb">
											<div class="li-logo"
												style="  background-image:url('<?php echo  $key11['opt-yrz-box-box-img'];?>');">
											</div>
										</div>
										<p class="title-nc"><?php echo  $key11['opt-yrz-box-box-title'];?></p>
										<p><?php echo  $key11['opt-yrz-box-box-jianjie'];?></p>
									</div>
								</a>
								<?php }?>
								<?php }?>

							</div>
							<?php }?>
							<?php }?>


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
