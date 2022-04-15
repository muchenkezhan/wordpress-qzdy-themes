<div class="rollbar" id="BackTop" style="display: none;">
<?php foreach(_qzdy('opt-checkbox-2') as $ii ) {
    if($ii=='c-comment' && is_single() || is_page()){
	        echo $cc ='<a href="#comments"><div class="rollbar-item tap-dark" etap="tap-dark" title="评论"><i class="fa fa-comments"></i></div></a>';
	    }
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
<div class="copyright_link">
    <div class="youqing_link">
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
<div class="copyright">
        <span><?php echo _qzdy('opt-code-dibuzdyhtml'); ?></span><br>
    Copyright © <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a>
<span><script  type="text/javascript"><?php echo _qzdy('opt-code-dibutjs'); ?></script></span><br>
    Powered by <a href="https://cn.wordpress.org/" title="采用WordPress" target="_blank">WordPress</a>
    Theme by <a href="https://aj0.cn" target="_blank">Qzdy v4.9.1</a>
    <a href="http://beian.miit.gov.cn" target="_blank"><?php echo _qzdy('zero-footer-gxbba'); ?></a>
     <a href="http://www.beian.gov.cn" target="_blank"><?php echo _qzdy('zero-footer-gaba'); ?></a><br/>
<span><?php echo _qzdy('zero-footer-dibubq'); ?></span> 
    </div>
    </div>
<div class="site-mobile-shade"></div>
<div id="LAY_democodejs"></div>
<?php lxbjtexiao(); qianduanpiaoloutexiao();?>
<script src="<?php bloginfo('template_url'); ?>/qzdy_style/dist/layui.js"  charset="utf-8"></script>
<script src="<?php bloginfo('template_url'); ?>/qzdy_style/jq1.11.3.js"></script>
<script src="<?php bloginfo('template_url'); ?>/qzdy_style/zoomify.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/qzdy_style/global.js"></script>
<script src="<?php bloginfo('template_url'); ?>/qzdy_style/jquery.lazyload.js?v=1.9.1"></script>
<script src="<?php bloginfo('template_url'); ?>/qzdy_style/main.js"></script>
<script src="<?php bloginfo('template_url'); ?>/jquery/jquery.autoMenu.js"></script>
<script src="<?php bloginfo('template_url'); ?>/qzdy_style/layer/layer.js"></script>
<script src="<?php bloginfo('template_url'); ?>/qzdy_style/module/message/message.js"></script>
<?php wp_footer(); ?>
</body>
</html>