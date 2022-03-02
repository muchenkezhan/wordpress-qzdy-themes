<?php 
 
class My_Widget_latest_classification extends WP_Widget {
 
	function __construct()
	{
		$widget_ops = array('description' => '自定义栏目最新文章');
		$control_ops = array('width' => 400, 'height' => 300);
		parent::__construct(false,$name='一Qzdy-自定义栏目最新文章',$widget_ops);  
 
                //parent::直接使用父类中的方法
                //$name 这个小工具的名称,
                //$widget_ops 可以给小工具进行描述等等。
                //$control_ops 可以对小工具进行简单的样式定义等等。
	}
 
	function form($instance) { // 给小工具(widget) 添加表单内容
		$title = esc_attr($instance['title']);
		$title_id = esc_attr($instance['title_id']);
		$title_number = esc_attr($instance['title_number']);

	?>
	<p>
	    <div>全部分类：<br/><?php show_category(); ?></div><br/></p>
	<p>	
<label for="<?php echo $this->get_field_id('title_id'); ?>"><?php esc_attr_e('分类ID:'); ?>
<input class="widefat" id="<?php echo $this->get_field_id('title_id'); ?>" name="<?php echo $this->get_field_name('title_id'); ?>" type="text" value="<?php echo $title_id; ?>" /></label></p>
<p>	
<label for="<?php echo $this->get_field_id('title_number'); ?>"><?php esc_attr_e('需要显示文章数量:'); ?>
<input class="widefat" id="<?php echo $this->get_field_id('title_number'); ?>" name="<?php echo $this->get_field_name('title_number'); ?>" type="text" value="<?php echo $title_number; ?>" /></label></p>
	<?php
    }
	function update($new_instance, $old_instance) { // 更新保存
		return $new_instance;
	}
	function widget($args, $instance) { // 输出显示在页面上
	extract( $args );
        $title = apply_filters('widget_title', empty($instance['title']) ? __('最新文章') : $instance['title']);
                $title_id = apply_filters('widget_title', empty($instance['title_id']) ? __('0') : $instance['title_id']);
        $title_number = apply_filters('widget_title', empty($instance['title_number']) ? __('6') : $instance['title_number']);

        ?>
              <?php echo $before_widget; ?>
                       <?php if ( $title )
                        echo $before_title . '<a style="color: #666;" href="'.get_category_link( $title_id ).'">'.get_cat_name( $title_id ).'</a>'.'<a style="float: right;color: #666;" href="'.get_category_link( $title_id ).'">最新文章</a>' . $after_title; ?>
   <?php
query_posts('showposts='.$title_number.'&cat="'.$title_id.'"');
$i="1";
while(have_posts()) : the_post();
$d=$i++;
?>
<li><h3><span class="li-sort li-sort-<?php echo $d; ?>"><?php echo $d; ?></span><a href="<?php the_permalink() ?>" rel="bookmark"><?php echo mb_strimwidth(htmlspecialchars_decode(get_the_title()), 0, 33, '...'); ?></a></h3>
</li>
<hr>
<?php endwhile; wp_reset_query();?>
              <?php echo $after_widget; ?>

        <?php
	}
}
register_widget('My_Widget_latest_classification');
?>