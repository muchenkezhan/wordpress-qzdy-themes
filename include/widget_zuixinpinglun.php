<?php 
class My_Widget_zuixinpinglun extends WP_Widget {
	function __construct()
	{
		$widget_ops = array('description' => 'Qzdy-热门文章评论最多的热门');
		$control_ops = array('width' => 400, 'height' => 300);
		parent::__construct(false,$name='Qzdy-热门文章-评论最多的热门',$widget_ops);  
 
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
        $title = apply_filters('widget_title', empty($instance['title']) ? __('热门文章') : $instance['title']);
        ?>
              <?php echo $before_widget; ?>
                       <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
<ul class="My_Widget_zuixinpinglun">
  <?php 
  global $post;
  $i="1";$b="1";
   $args=array(
         'meta_key' => 'views',
         'orderby' => 'meta_value_num',
         'posts_per_page'=>9,
         'order' => 'DESC'
    );
    query_posts($args);  while (have_posts()) : the_post(); $d=$i++; $c=$b++; if($d>3) $d=4; ?> 
<li ><span class="layui-badge bg-red-<?php echo $d; ?>"><?php echo $c; ?></span><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php  the_title(); ?></a></li> 
 <?php endwhile;wp_reset_query();?>
    </ul>
              <?php echo $after_widget; ?>

        <?php
	}
}
register_widget('My_Widget_zuixinpinglun');
?>