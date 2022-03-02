<?php get_header();?>
<div class="layui-content">
<div class="layui-container">
<div class="layui-row layui-col-space15 main">
       <div class="layui-col-md9 layui-col-lg9">
    <!---->
        <!--内容页面上的分类提示-->
<div class="map">
<?php if ( function_exists('ah_breadcrumb') ) ah_breadcrumb(); ?>
    </div>
    <!--提示结束-->

 
                   <div class="qzdy_ssnrts"> <p>宝贝暂时没有相关的文章哦 试试侧边栏的站内搜索吧</p></div>
 

         
         <!--搜索结束-->
    <!--分页-->
             <div class="pagination" id="pagenavi">
              <p>  <?php lingfeng_pagenavi();?></p>
                            </div>
            <!--分页 ／-->
        <!--<div class="page-navigator">-->
        <!--    <ul id="pages"><li class="disabled"><span>«</span></li> <li class="active"><span>1</span></li><li><a href="/?page=2">2</a></li><li><a href="/?page=3">3</a></li><li><a href="/?page=4">4</a></li> <li><a href="/?page=2">»</a></li></ul>        </div>-->
        </div>

        <?php get_sidebar();?>
</div>
</div>
</div>
</div>
<!--底部版权-->
<?php get_footer();?>