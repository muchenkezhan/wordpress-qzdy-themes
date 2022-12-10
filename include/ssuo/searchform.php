    <div id="search-main" class="search-main">
        <div class="search-box">
    	<div class="off-search-a"></div>
    	<div class="search-wrap bgt fadeInDown animated">
    		<div class="searchbar da">
    			<form method="get" id="searchform-so" action="<?php bloginfo('url'); ?>/">
    				<span class="search-input">
    					<input type="text" value="" name="s" id="so" class="bk dah" placeholder="" required="">
    					<button type="submit" id="searchsubmit-so" class="bk da"><i class="layui-icon layui-icon-search" style="font-size: 20px; color: #fff;"></i> </button>
    				</span>
    				<div class="clear"></div>
    			</form>
    		</div>
			<div class="clear"></div>
			<?php if(_qzdy('ssxg-a')){ ?>
			<div class="search-nav hz">
			<!--    ?php if(_qzdy('zero-qt-index-sosuo-redian')){ ?>-->
			<!--<h4 class="hz" style="color: #fff;">搜索热点</h4>-->
			<!--<php } ?>-->
			<div class="clear"></div>
<ul id="search" class="search">
    <?php if(_qzdy('ssxg-a')){ foreach(_qzdy('ssxg-a') as $key10 ) { ?>
	<li><a href="<?php echo $key10['ssxg-a-1-2'];?>" style="font-size: 12px;"><?php echo $key10['ssxg-a-1-1'];?></a></li>
<?php }}?>
</ul>
                </div>
<?php } ?>
    			<div class="clear"></div>
    	    </div>
    	<div class="off-search-b">
    		<div class="clear"></div>
    	</div>
    	</div>
    </div>