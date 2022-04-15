<?php 

class My_Widget extends WP_Widget {

	function __construct()
	{
		$widget_ops = array('description' => 'Qzdy-搜索栏');

		parent::__construct(false,$name='Qzdy-搜索栏',$widget_ops);  
	}

	function form($instance) {
		$title = esc_attr($instance['title']);
	?>
	<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_attr_e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>

	<?php
    }
	function update($new_instance, $old_instance) { // 更新保存
		return $new_instance;
	}
	function widget($args, $instance) { // 输出显示在页面上
	extract( $args );
        $title = apply_filters('widget_title', empty($instance['title']) ? __('全站搜索') : $instance['title']);
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
                        
<form class="layui-form" id="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
        <div class="layui-inline input">
            <input type="text" id="s" name="s" class="layui-input" required="" lay-verify="required" placeholder="输入关键字搜索">
            <input type="hidden" name="modelid" value="1">
        </div>
        <div class="layui-inline">
            <button class="layui-btn layui-btn-sm layui-btn-primary"><i class="layui-icon layui-icon-search"></i></button>
        </div>
    </form>
              <?php echo $after_widget; ?>

        <?php
	}
}
register_widget('My_Widget');
?>