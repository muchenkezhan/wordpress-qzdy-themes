<?php 
 
class My_Widget_column1 extends WP_Widget {
 
	function __construct()
	{
		$widget_ops = array('description' => 'Qzdy-栏目分类');
		$control_ops = array('width' => 400, 'height' => 300);
		parent::__construct(false,$name='Qzdy-栏目分类',$widget_ops);  
 
                //parent::直接使用父类中的方法
                //$name 这个小工具的名称,
                //$widget_ops 可以给小工具进行描述等等。
                //$control_ops 可以对小工具进行简单的样式定义等等。
	}
 
	function form($instance) { // 给小工具(widget) 添加表单内容
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
        $title = apply_filters('widget_title', empty($instance['title']) ? __('栏目分类') : $instance['title']);
        ?>
              <?php echo $before_widget; ?>
                       <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
    <ul class="layui-row layui-col-space5">
 
                <!--<li class="layui-col-md12 layui-col-xs6"><a href="/lists/20.html" alt="前端技术" title="前端技术"><i class="layui-icon"></i> 前端技术<span class="layui-badge layui-bg-gray">4</span></a></li>-->
    <?php
        $args=array(
            'orderby' => 'name',
            'order' => 'ASC'
        );
        $categories=get_categories($args);
        foreach($categories as $category) {
            echo '<li class="layui-col-md12 layui-col-xs6" ><i class="layui-icon layui-icon-form"></i> <a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'<span class="layui-badge layui-bg-gray">'. $category->count . '</span>'.'</a> </li> ' ; }
    ?>
    </ul>
              <?php echo $after_widget; ?>

        <?php
	}
}
register_widget('My_Widget_column1');
?>