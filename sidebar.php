<!--侧边栏-->
<div class="sidebar layui-col-md3 layui-col-lg3" <?php  qzdy_sidebar_guanbi(); ?>>
<?php
	if (is_single()||is_page()){
	    dynamic_sidebar('sidebar-02');
		  }else {
		      dynamic_sidebar('sidebar-01');
		  }?>
</div>
