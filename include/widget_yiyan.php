<?php 
 
class My_Widget_yiyan extends WP_Widget {
 
	function __construct()
	{
		$widget_ops = array('description' => 'Qzdy-随机一言');
		$control_ops = array('width' => 400, 'height' => 300);
		parent::__construct(false,$name='Qzdy-随机一言',$widget_ops);  
 
                //parent::直接使用父类中的方法
                //$name 这个小工具的名称,
                //$widget_ops 可以给小工具进行描述等等。
                //$control_ops 可以对小工具进行简单的样式定义等等。
	}
	
 
	function form($instance) { // 给小工具(widget) 添加表单内容
		$title = esc_attr($instance['title']);
	?>
	<p>一言的内容文件在主题目录下的include/data.dat</p>
	<?php
    }
	function update($new_instance, $old_instance) { // 更新保存
		return $new_instance;
	}
	function widget($args, $instance) { // 输出显示在页面上
	extract( $args );

        ?>
              <?php echo $before_widget; ?>
                      
   <script src="<?php echo get_bloginfo('template_url')?>/include/api.php"></script>
              <?php echo $after_widget; ?>

        <?php
	}
}
register_widget('My_Widget_yiyan');
?>