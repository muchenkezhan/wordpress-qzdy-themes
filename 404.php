<?php get_header();?>
<div class="layui-content">
<div class="layui-container">
<div class="layui-row flex layui-col-space15 main <?php qzdy_sidebar_fangxiang();?>">
       <div class="layui-col-md9 layui-col-lg9">
<div class="map">
<?php if ( function_exists('ah_breadcrumb') ) ah_breadcrumb(); ?>
    </div>
                   <div class="qzdy_ssnrts"> <p>宝贝暂时没有相关的文章哦 试试侧边栏的站内搜索吧</p></div>
             <div class="pagination" id="pagenavi">
              <p>  <?php lingfeng_pagenavi();?></p>
                            </div>
        </div>
        <?php get_sidebar();?>
</div>
</div>
</div>
</div>
<!--底部版权-->
<?php get_footer();?>