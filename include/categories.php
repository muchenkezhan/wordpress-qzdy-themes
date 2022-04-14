<?php 

class My_Widget_link extends WP_Widget {

	function __construct()
	{
		$widget_ops = array('description' => 'Qzdy-友情链接');

		parent::__construct(false,$name='Qzdy-友情链接',$widget_ops);  

                //parent::直接使用父类中的方法
                //$name 这个小工具的名称,
                //$widget_ops 可以给小工具进行描述等等。
                //$control_ops 可以对小工具进行简单的样式定义等等。
	}
	function form($instance) { // 给小工具(widget) 添加表单内容
		$title = esc_attr($instance['title']);
		$title_link = esc_attr($instance['title_link']);
	?>
	<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_attr_e('Title:'); ?>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	</label></p>
<p>	
<label for="<?php echo $this->get_field_id('title_link'); ?>"><?php esc_attr_e('友情链接申请地址:'); ?>
<input class="widefat" id="<?php echo $this->get_field_id('title_link'); ?>" name="<?php echo $this->get_field_name('title_link'); ?>" type="text" value="<?php echo $title_link; ?>" /></label></p>
	<?php
    }
	function update($new_instance, $old_instance) { // 更新保存
		return $new_instance;
	}
	function widget($args, $instance) { // 输出显示在页面上
	extract( $args );
        $title = apply_filters('widget_title', empty($instance['title']) ? __('友情链接') : $instance['title']);
        $title_link = apply_filters('widget_title', empty($instance['title_link']) ? __('title_link') : $instance['title_link']);
        ?>
<?php echo $before_widget; ?>
<div class="link">
<h3 class="title-sidebar"><i class="layui-icon iconfont iconlianjie"></i> <?php echo $title; ?><a style="float: right;color: #666;" href="<?php echo $title_link; ?>">申请</a></h3>
<div>
<?php
$bookmarks = get_bookmarks(array('orderby'=>'rand'));
if(!empty($bookmarks)){
foreach($bookmarks as $bookmark){
$friendimg = $bookmark->link_image;
// if(empty($friendimg)) $friendimg = get_template_directory_uri()."/grab_ico/get.php?url=".$bookmark->link_url;
echo '<a href="'.$bookmark->link_url.'" target="_blank">'.link_ico($friendimg).'<span>'.$bookmark->link_name.'</span></a>';
}
} ?>
    </div>
</div>
<?php echo $after_widget; ?>
<?php } }
register_widget('My_Widget_link');
?>