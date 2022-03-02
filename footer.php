<?php
if(!empty(_qzdy('zero-footer-youqinglink'))){?>
<div class="copyright_link">
    <div class="youqing_link">
        <span>友情链接：</span><br/>
       <?php echo _qzdy('opt-cbl-cblyqlj'); ?>
    </div>
</div>
<?php }?>
<div class="copyright">
        <span><?php echo _qzdy('opt-code-dibuzdyhtml'); ?></span><br>
    Copyright © <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a>
<span><script  type="text/javascript"><?php echo _qzdy('opt-code-dibutjs'); ?></script></span><br>
    Powered by <a href="https://cn.wordpress.org/" title="采用WordPress" target="_blank">WordPress</a>
    Theme by <a href="https://aj0.cn" target="_blank">Qzdy v4.7</a>
    <a href="http://beian.miit.gov.cn" target="_blank"><?php echo _qzdy('zero-footer-gxbba'); ?></a>
     <a href="http://beian.miit.gov.cn" target="_blank"><?php echo _qzdy('zero-footer-gaba'); ?></a><br/>
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
<script>
layui.use('carousel', function(){
  var carousel = layui.carousel;
  carousel.render({
    elem: '#test1'
    ,width: '100%'
    ,arrow: 'always'
   ,arrow:'hover'
    ,indicator:'inside'
  });
});
</script>
<script src="<?php bloginfo('template_url'); ?>/qzdy_style/jquery.lazyload.js?v=1.9.1"></script>
<script src="<?php bloginfo('template_url'); ?>/qzdy_style/main.js"></script>
<script src="<?php bloginfo('template_url'); ?>/jquery/jquery.autoMenu.js"></script>
<?php wp_footer(); ?>
</body>
</html>