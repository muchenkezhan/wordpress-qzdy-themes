    <div id="search-main" class="search-main">
    	<div class="off-search-a"></div>
    	<div class="search-wrap bgt fadeInDown animated">
    		<div class="searchbar da">
    			<form method="get" id="searchform-so" action="<?php bloginfo('url'); ?>/">
    				<span class="search-input">
    					<input type="text" value="" name="s" id="so" class="bk dah" placeholder="" required="">
    					<button type="submit" id="searchsubmit-so" class="bk da"><i class="layui-icon layui-icon-search" style="font-size: 20px; color: #999;"></i> </button>
    				</span>
    				<div class="clear"></div>
    			</form>
    		</div>
			<div class="clear"></div>
			<div class="search-nav hz">
			<h4 class="hz" style="color: #fff;">搜索热点</h4>
			<div class="clear"></div><br/>
<ul id="search" class="search"><?php echo _qzdy('zero-qt-index-sosuo-redian'); ?>
</ul>
                </div>
    			<div class="clear"></div>
    	    </div>
    	<div class="off-search-b">
    		<div class="clear"></div>
    	</div>
    	<div class="off-search dah fadeInDown animated"><i class="layui-icon layui-icon-reduce-circle" style="font-size: 20px; color: #000;line-height: 35px;"></i></div>
    </div>