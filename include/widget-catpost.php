<?php 
 
class My_Widget_current_latest extends WP_Widget {
 
	function __construct()
	{
		$widget_ops = array('description' => '当前栏目最新文章');
		$control_ops = array('width' => 400, 'height' => 300);
		parent::__construct(false,$name='Qzdy-当前栏目最新文章',$widget_ops);  
 
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
        $title = apply_filters('widget_title', empty($instance['title']) ? __('最新文章') : $instance['title']);
        ?>
              <?php echo $before_widget; ?>
                       <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
   <?php
   $category = get_the_category();//默认获取当前所属分类
    $category =$category[0]->cat_ID;
  if ( is_home()) {
    $category=0;
}else{
      $category = get_the_category();
    $category =$category[0]->cat_ID;
}
query_posts('showposts=6&cat="'.$category.'"');
$i='1';
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
register_widget('My_Widget_current_latest');
?>