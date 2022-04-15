<?php 
 
class My_Widget_column1s extends WP_Widget {
 
	function __construct()
	{
		$widget_ops = array('description' => 'Qzdy-标签云');
		$control_ops = array('width' => 400, 'height' => 300);
		parent::__construct(false,$name='Qzdy-彩色标签云',$widget_ops);  
	}
 
	function form($instance) { 
		$title = esc_attr($instance['title']);
		$title_quantity = esc_attr($instance['title_quantity']);
	?><p>不设置默认标题：标签云，默认调用标签热门前30条</p>
	<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_attr_e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
	<p>	
<label for="<?php echo $this->get_field_id('title_quantity'); ?>"><?php esc_attr_e('标签数量:'); ?>
<input class="widefat" id="<?php echo $this->get_field_id('title_quantity'); ?>" name="<?php echo $this->get_field_name('title_quantity'); ?>" type="text" value="<?php echo $title_quantity; ?>" /></label></p>
	<?php
    }
	function update($new_instance, $old_instance) { 
		return $new_instance;
	}
	function widget($args, $instance) { 
	extract( $args );
        $title = apply_filters('widget_title', empty($instance['title']) ? __('标签云') : $instance['title']);
        $title_quantity=apply_filters('widget_title', empty($instance['title_quantity']) ? __('50') : $instance['title_quantity']);
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
                        <?php
$tags = get_tags( array( 'orderby' => 'count', 'order' => 'DESC', 'number' => ''.$title_quantity.'') );
echo '<div class="tags article-categories">';
foreach ( $tags as $tag ) {
$tag_link = get_tag_link( $tag->term_id );
echo '<a class="layui-btn layui-btn-xs tag-style-2" href="'.$tag_link.'">#'.$tag->name.'</a>';
}
echo '</div>';
?>
              <?php echo $after_widget; ?>

        <?php
	}
}
register_widget('My_Widget_column1s');
?>