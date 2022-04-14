<?php 
 
class My_Widget_shuibiankankan extends WP_Widget {
 
	function __construct()
	{
		$widget_ops = array('description' => '带图随机文章');
		$control_ops = array('width' => 400, 'height' => 300);
		parent::__construct(false,$name='Qzdy-带图随机文章',$widget_ops);  
 
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
        $title = apply_filters('widget_title', empty($instance['title']) ? __('随便看看') : $instance['title']);
        ?>
              <?php echo $before_widget; ?>
                       <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
<ul class="widget-container">
<?php wp_reset_query(); ?>  
<?php query_posts("showposts=5&ignore_sticky_posts=1&order=DESC&orderby=rand"); ?>  
<?php $i='1';?>
<?php if (have_posts()) : while (have_posts()) : the_post(); $d=$i++; ?>  
<li class="darcyq-random-item">
<a href="<?php the_permalink() ?>" class="darcyq-random-link" target="_blank">
<i class="darcyq-random-sort qzdy_suiji_i<?php echo $d; ?>" ><?php echo $d; ?></i>
	 <?php if(_qzdy('rp-page-tesetu-sw')=='tesetu1'){?>
	 <img alt="<?php the_title() ?>" title="<?php the_title() ?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-original="<?php echo post_thumbnail_srcs(); ?>" class="darcyq-random-img lazy" width="100%" height="130">
	 	<?php }else{?>
	 	<img alt="<?php the_title() ?>" title="<?php the_title() ?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-original="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo post_thumbnail_srcs(); ?>&w=300&h=240&zc=1&q=100" class="darcyq-random-img lazy" width="100%" height="130">
	 	<?php }?>
<div class="darcyq-random-title"><h3>
<?php the_title() ?>
</h3>
<span><?php the_time('Y-n-j '); ?><span class="darcyq-float-right"><?php post_views(' ', ''); ?>阅读</span></span>
</div>
</a>
</li>
<?php endwhile ?>  
<?php endif ?>  
<?php wp_reset_query(); ?>  	
</ul>

    
              <?php echo $after_widget; ?>

        <?php
	}
}
register_widget('My_Widget_shuibiankankan');
?>