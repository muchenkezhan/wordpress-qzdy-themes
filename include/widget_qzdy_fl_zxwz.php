<?php 
 
class My_Widget_fl_zxwz extends WP_Widget {
 
	function __construct()
	{
		$widget_ops = array('description' => 'Qzdy-最新发布');
		$control_ops = array('width' => 400, 'height' => 300);
		parent::__construct(false,$name='Qzdy-最新发布',$widget_ops);  
 
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
        $title = apply_filters('widget_title', empty($instance['title']) ? __('最新发布') : $instance['title']);
        ?>
              <?php echo $before_widget; ?>
                       <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>

<?php query_posts('posts_per_page=8&caller_get_posts=1'); ?>
<?php while (have_posts()) : the_post(); ?>
<li>
<a target="_blank" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"
class="title"><?php echo cut_str($post->post_title,34); ?></a>
</li>
<?php endwhile; ?>
    
              <?php echo $after_widget; ?>

        <?php
	}
}
register_widget('My_Widget_fl_zxwz');
?>