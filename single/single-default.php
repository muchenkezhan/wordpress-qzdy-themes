<?php get_header();?>
 <!--上面是头部-->
<div class="layui-content<?php echo qzdy_prevent_theme(); ?>">
<div class="layui-container<?php echo qzdy_prevent_theme(); ?>">
<div class="layui-row flex layui-col-space15 <?php qzdy_sidebar_fangxiang();?> main<?php echo qzdy_prevent_theme(); ?>">
<?php _zero_wz_autoMenu_ml_kg(); ?>
<div class="layui-col-md9 layui-col-lg9<?php echo qzdy_prevent_theme(); ?>" <?php qzdy_sidebar_fangxiang(); ?>>
<!--内容页面上的分类提示-->
<div class="map"><?php if ( function_exists('ah_breadcrumb') ) ah_breadcrumb(); ?></div>
    <!--提示结束-->
        <!--内容开始-->
        <div class="title-article">
            <div class="qzdy-title"><h1><?php the_title(); ?></h1></div>
            <div class="title-msg dy-text-small">
                <?php if(!empty($article_author = _qzdy('zero-footer-article-author'))){?>
                <span><i class="layui-icon layui-icon-username"></i><?php echo get_the_author_meta( 'nickname', $post->post_author ) ?></span><?php } ?>
                <span><i class="layui-icon layui-icon-time"></i><?php the_time('Y-n-j'); ?></span>
                <span><i class="fa fa-eye" aria-hidden="true"></i><?php post_views('',''); ?></span>
                <span><?php edit_post_link('[编辑]'); ?></span>
                <span class="time_eye_catching"><?php the_time('n/j'); ?></span>
            </div>
        </div>
<?php if(_qzdy('ggw-2-switcher')){?>
<div class="">
<?php if(_qzdy('ggw-2')){
echo _qzdy('ggw-2');
}?>
</div><?php }?>
        <div class="text" itemprop="articleBody"  id="qzdywzml">
            <div id="md_content_2" class="md_content markdown-body editormd-html-preview" style="min-height: 50px;">
<?php the_content();



?>
            </div>
            <!--底部完毕-->
            <div class="the-end">- THE END -</div>
            <!--标签-->
            <div class="tags-text"><i class="layui-icon layui-icon-note<?php echo qzdy_prevent_theme(); ?>"></i><?php the_tags('Tag：', '' , ''); ?> </div>
            <!--标签-->
            <!--个人资料-->
            <?php 
	if(!empty($zero_footer_grxx = _qzdy('zero-footer-grxx'))){?>
            <div class="author-row ">
                <div class="author-box flex-row align-center" data-v-730707dd="">
                <div class="author-box flex-row align-center" data-v-730707dd=""><img src="<?php echo _qzdy('zero-footer-txurl');?>" alt="" class="author-img" data-v-730707dd=""> <div class="author-name" data-v-730707dd=""><p data-v-730707dd=""><?php echo get_the_author_meta( 'nickname', $post->post_author ) ?></p> <p data-v-730707dd=""><?php the_modified_time('n月d日H:i'); ?></p></div></div>
                <div class="author-tools">
<?php 
	if(!empty($zero_footer_qq = _qzdy('zero-footer-qq'))){?>
                    <textarea cols="20" rows="10" id="copyqq" style="position: fixed;top: -2000px;"><?php echo $zero_footer_qq; ?></textarea><button title="复制QQ地址" type="button" onclick="copyContent('copyqq')"><svg t="1644396427755" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2038" width="20" height="20"><path d="M532.978 92.111c283.445 0 297.385 270.677 297.385 270.677 42.997 56.935 19.766 108.043 19.766 108.043 138.24 217.252 48.797 280.017 24.4 284.645-24.4 4.628-47.653-26.737-47.653-26.737s-8.109 31.34-27.881 47.648c72.051 33.654 59.251 75.502 59.251 75.502s-15.11 126.342-314.811 46.478l-25.567-4.654c-287.257 103.683-322.955-36.022-322.955-36.022s-11.626-58.056 44.136-80.161c-32.538-19.766-44.136-61.566-44.136-61.566s-29.056 47.622-67.388 30.2c-38.339-17.425-61.565-171.92 82.476-283.444 0 0-20.888-66.222 26.735-105.73 0 0 12.796-264.879 296.242-264.879M280.873 372.1c-62.734 53.425-20.91 106.898-20.91 106.898-138.239 84.815-113.842 221.882-113.842 221.882s22.053-11.053 37.736-42.991c15.685-31.942 40.083 5.227 40.083 5.227s15.11 73.191 61.372 101.861c46.265 28.672-2.039 46.965-2.039 46.965s-50.923 0.74-46.538 35.318c4.381 34.58 168.63 77.874 267.191 1.169l52.273 6.972c171.952 59.798 256.74 4.03 262.403-6.668 5.664-10.699-25.973-31.696-55.054-43.865-29.084-12.175-36.565-25-10.839-42.127 25.73-17.122 35.889-51.107 50.947-86.284 15.052-35.181 37.735-17.997 40.653-8.109 2.912 9.882 24.395 42.962 24.395 42.962s56.01-59.356-60.419-234.654c0 0 25.268-52.524-17.429-95.243 0 0-10.429-246.305-262.559-246.305-252.13-0.001-247.422 236.991-247.422 236.991z" p-id="2039"></path></svg></button><?php } ?>
                    <?php 
	if(!empty($zero_footer_email = _qzdy('zero-footer-email'))){?>
                <textarea cols="20" rows="10" id="copyemail" style="position: fixed;top: -2000px;"><?php echo $zero_footer_email; ?></textarea>
                <button title="复制邮箱地址" type="button" onclick="copyContent('copyemail')"><svg t="1644394147828" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="4181" width="20" height="20"><path d="M896 128 128 128C57.408 128 0 185.408 0 256l0 512c0 70.592 57.408 128 128 128l768 0c70.592 0 128-57.408 128-128L1024 256C1024 185.408 966.592 128 896 128zM896 192c6.272 0 11.904 1.856 17.6 3.584L534.976 570.24C522.56 582.656 501.376 582.656 488.832 570.304L108.032 196.032C114.432 193.92 120.96 192 128 192L896 192zM960 768c0 35.328-28.672 64-64 64L128 832c-35.264 0-64-28.672-64-64L64 256c0-4.032 1.536-7.488 2.304-11.264l377.664 371.2c18.752 18.432 43.328 27.712 67.968 27.712 24.704 0 49.344-9.344 68.096-27.904l377.28-373.312C958.272 246.912 960 251.2 960 256L960 768z" p-id="4182"></path></svg></button><?php } ?>
                
                </div>
                </div>
            </div>
            <?php } ?>
            <!--修改日期-->
                        <?php 
	if(!empty($zero_footer_wzdata = _qzdy('zero-footer-wzdata'))){?>
            <div class="time-text">
            <i class="layui-icon iconfont iconshijian<?php echo qzdy_prevent_theme(); ?>"></i> 最后修改：<?php the_modified_time('Y年n月j日');  ?></div><?php } ?>
            <?php if(_qzdy('ggw-3-switcher')){?>
<div class="">
<?php if(_qzdy('ggw-3')){
echo _qzdy('ggw-3');
}?>
</div>
<?php }?>
            <!--点赞-->
<?php 
	if(!empty($zero_footer_dianzan = _qzdy('zero-footer-dianzan'))){?>
    <div class="post-likes">
        <div class="post-likebox">
             <a title="点赞!"  href="javascript:;" data-action="ding" data-id="<?php the_ID(); ?>" class="favorite<?php if(isset($_COOKIE['bigfa_ding_'.$post->ID])) echo ' done';?>"><i class="layui-icon layui-icon-praise" style="font-size: 30px; "></i><span class="count">
                <?php if( get_post_meta($post->ID,'bigfa_ding',true) ){
                        echo get_post_meta($post->ID,'bigfa_ding',true);
                     } else {
                        echo '0';
                     }?></span></a>
     </div> </div>
<?php } ?>
            <!--申明-->
            <div class="copy-text">
            <div>
                <p><?php echo _wenzhangbanquan();?></p>
                <p class="hidden-xs">如若转载，请注明出处：<a href="<?php echo get_permalink(); ?>"><?php echo get_permalink(); ?></a> </p>
            </div>
        </div>
        </div>
<!--上一页下一页-->
 <div class="page-text">
                        <span  class="text-dark" rel="prev">
            <div class="nav-span previous d-inline-block<?php echo qzdy_prevent_theme(); ?>">
                <span class="post-nav d-block">上一篇:</span>
                <span class="d-none d-md-block layui-hide-xs"><?php if (get_next_post()) { next_post_link(' %link');} else {echo "没有了，已经是最新文章";} ?> </span>
            </div>
            </span>
                        <span  class="text-dark" rel="next">
            <div class="nav-span d-inline-block<?php echo qzdy_prevent_theme(); ?>">
                <span class="post-nav d-block">下一篇:</span>
                <span class="d-none d-md-block layui-hide-xs"><?php if (get_previous_post()) { previous_post_link(' %link');} else {echo "没有了，已经是最后文章";} ?></span>
            </div>
            </span>
        </div>

<?php get_template_part( 'include/expand/single-tuijian-shuiji' ); ?>
 
<?php 
$zero_footer_plk = _qzdy('zero-footer-plk');
	if(!empty($zero_footer_plk)){?>
	<?php if (comments_open() ) { ?>
<div class="clearfix page-comt<?php echo qzdy_prevent_theme(); ?>">
    <?php $file=""; $separate_comments="";?>
    <?php comments_template( $file, $separate_comments ); ?>
</div>
<?php } } ?>
</div>
<?php get_sidebar();?>
</div>
</div>
</div>
</div>
<!--底部版权-->
<?php get_footer();?>