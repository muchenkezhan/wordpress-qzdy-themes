<div class="rollbar" id="BackTop" style="display: none;">
<?php foreach(_qzdy('opt-checkbox-2') as $ii ) {
    if($ii=='c-comment'){
        if(is_single()||is_page()){
	        echo $cc ='<a href="#comments"><div class="rollbar-item tap-dark" etap="tap-dark" title="评论"><i class="fa fa-comments"></i></div></a>';
	    }}
    if($ii=='c-sousuo'){
	        echo $cc ='<div class="rollbar-item" id="ssannius" title="搜索"><i class="fa fa-search"></i></div>';
	    }
	    if($ii=='c-qq'){
	        echo $cc ='<div class="rollbar-item tap-qq" etap="tap-qq"><a target="_blank" title="QQ咨询" href="http://wpa.qq.com/msgrd?v=3&amp;uin='._qzdy('txt-c-qq').'&amp;site=qq&amp;menu=yes"><i class="fa fa-qq"></i></a></div>';
	    }if ($ii=='c-mail') {
	     echo $cc = '<div class="rollbar-item tap-qq" etap="tap-qq"><a target="_blank" title="QQ邮箱" href="mailto: '._qzdy('txt-c-email').'"><i class="fa fa-envelope-o"></i></a></div>';
	    }if ($ii=='c-contribution'){
	        echo $cc = '<a target="_blank" href="'._qzdy('txt-c-tougao').'"><div class="rollbar-item" id="to_contribution" title="投稿文章"><i class="fa fa-pencil"></i></div></a>';
	    }if ($ii=='c-full-screen'){
	        echo $cc = '<div class="rollbar-item" id="to_full" title="全屏页面"><i class="fa fa-arrows-alt"></i></div>';
	    }if ($ii=='c-tips'){
	        echo $cc = '<div class="rollbar-item" id="to_top" title="返回顶部"><i class="fa fa-angle-up"></i></div>';
	    }
	}?>
</div>
<?php
if(!empty(_qzdy('zero-footer-youqinglink'))){?>
<div class="copyright_link <?php dy_footer_color();?>">
    <div class="youqing_link">
        <!--<img src="'.$friendimg.'">-->
        <span>友情链接：</span><br/>
<?php $bookmarks = get_bookmarks(array('orderby'=>'rand'));
if(!empty($bookmarks)){
foreach($bookmarks as $bookmark){
 $friendimg = $bookmark->link_image;
echo '<a href="'.$bookmark->link_url.'" target="_blank">'.link_ico($friendimg).'<span>'.$bookmark->link_name.'</span></a>';
}}?>
    </div>
</div>
<?php }?>
<div class="copyright <?php dy_footer_color();?>">
<div class="dbwp layui-clear">
    <div class="layui-col-md9">
<?php if(_qzdy('opt-code-dibuzdyhtml')){ ?><p><?php echo _qzdy('opt-code-dibuzdyhtml'); ?></p><?php }?>
   <?php if(_qzdy('zero-footer-gxbba')){ ?> <a href="http://beian.miit.gov.cn" target="_blank"><?php echo _qzdy('zero-footer-gxbba'); ?></a><?php }?>
     <?php if(_qzdy('zero-footer-gaba')){ ?><a href="http://www.beian.gov.cn" target="_blank"><?php echo _qzdy('zero-footer-gaba'); ?></a><br><?php }?>
     <p><?php echo _qzdy('zero-footer-dibubq'); ?></p> 
<p>
    <?php echo _qzdy('opt-code-dibutjs'); ?>
    Copyright © <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a>
    Powered <a href="https://cn.wordpress.org/" title="采用WordPress" target="_blank">WordPress</a>
    Theme <a href="https://gitee.com/MUCEO/qzdy" target="_blank">Qzdy</a></p>
</div>
<div class="layui-col-md3">
    <?php if(_qzdy('zero-footer-ewm1')){ ?><img src="<?php echo _qzdy('zero-footer-ewm1');?>" width="80"><?php }?>
            <?php if(_qzdy('zero-footer-ewm1')){ ?><img src="<?php echo _qzdy('zero-footer-ewm2');?>" width="80"><?php }?>
            </div>



</div>
</div>
</div>
<!--版权结束-->
<div class="site-mobile-shade"></div>
<div id="LAY_democodejs"></div>

<?php lxbjtexiao(); qianduanpiaoloutexiao();?>
<script src="<?php bloginfo('template_url'); ?>/qzdy_style/dist/layui.js"  charset="utf-8"></script>
<script src="<?php bloginfo('template_url'); ?>/qzdy_style/zoomify.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/qzdy_style/global.js"></script>
<script src="<?php bloginfo('template_url'); ?>/qzdy_style/jquery.lazyload.js?v=1.9.1"></script>
<script src="<?php bloginfo('template_url'); ?>/qzdy_style/main.js"></script>
<script src="<?php bloginfo('template_url'); ?>/jquery/jquery.autoMenu.js"></script>
<script src="<?php bloginfo('template_url'); ?>/qzdy_style/layer/layer.js"></script>
<script src="<?php bloginfo('template_url'); ?>/qzdy_style/module/message/message.js"></script>
<script src="<?php bloginfo('template_url'); ?>/include/buttons/highlightjs/highlightjs-line-numbers.min.js"></script>
<?php wp_footer(); ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/qzdy_style/hybrid.css">
<script>$('.md_content  img').attr('data-fancybox','gallery');hljs.initHighlightingOnLoad();hljsln.initLineNumbersOnLoad();</script>
<?php if(_qzdy('code_2_footer')){echo _qzdy('code_2_footer');} ?>
</body>
</html>