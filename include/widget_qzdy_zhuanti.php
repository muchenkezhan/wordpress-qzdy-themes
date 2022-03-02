<?php 
 
class qzdy_xgj_zhuanti extends WP_Widget {
 
	function __construct()
	{
		$widget_ops = array('description' => '在内容侧边栏使用，调用文章同标签的文章');
		$control_ops = array('width' => 400, 'height' => 300);
		parent::__construct(false,$name='Qzdy-专题文章',$widget_ops);  
 
                //parent::直接使用父类中的方法
                //$name 这个小工具的名称,
                //$widget_ops 可以给小工具进行描述等等。
                //$control_ops 可以对小工具进行简单的样式定义等等。
	}
 
	function form($instance) { // 给小工具(widget) 添加表单内容
		$title = esc_attr($instance['title']);
		$title_quantity = esc_attr($instance['title_quantity']);
	?><p>不设置默认标题：标签云，默认调用标签热门前30条</p>
	<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_attr_e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
	<p>	
<label for="<?php echo $this->get_field_id('title_quantity'); ?>"><?php esc_attr_e('标签数量:'); ?>
<input class="widefat" id="<?php echo $this->get_field_id('title_quantity'); ?>" name="<?php echo $this->get_field_name('title_quantity'); ?>" type="text" value="<?php echo $title_quantity; ?>" /></label></p>
	<?php
    }
	function update($new_instance, $old_instance) { // 更新保存
		return $new_instance;
	}
	function widget($args, $instance) { // 输出显示在页面上
	extract( $args );
        $title = apply_filters('widget_title', empty($instance['title']) ? __('专题文章') : $instance['title']);
        $title_quantity=apply_filters('widget_title', empty($instance['title_quantity']) ? __('6') : $instance['title_quantity']);
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>

<?php $post_num = $title_quantity; 
global $post;
$tmp_post = $post; 
$tags = ''; 
$i = '1'; 
if ( get_the_tags( $post->ID ) ) { 
foreach ( get_the_tags( $post->ID ) as $tag ) $tags .= $tag->name . ',';
$tags = strtr(rtrim($tags, ','), ' ', '-'); 
$myposts =get_posts('numberposts='.$post_num.'&tag='.$tags.'&exclude='.$post->ID); 
foreach($myposts as $post) { setup_postdata($post); ?>
	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	<?php } } $post = $tmp_post; setup_postdata($post); ?>


              <?php echo $after_widget; ?>

        <?php
	}
}
register_widget('qzdy_xgj_zhuanti');
?>