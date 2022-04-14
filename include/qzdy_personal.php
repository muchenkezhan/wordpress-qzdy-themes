<?php 
 
class My_Widget_persona extends WP_Widget {
 
	function __construct()
	{
		$widget_ops = array('description' => 'Qzdy-个人信息栏');
		$control_ops = array('width' => 400, 'height' => 300);
		parent::__construct(false,$name='一Qzdy-个人信息栏',$widget_ops);  
 
                //parent::直接使用父类中的方法
                //$name 这个小工具的名称,
                //$widget_ops 可以给小工具进行描述等等。
                //$control_ops 可以对小工具进行简单的样式定义等等。
	}
 
	function form($instance) { // 给小工具(widget) 添加表单内容
		$title = esc_attr($instance['title']);
	?>
	<?php
    }
	function update($new_instance, $old_instance) { // 更新保存
		return $new_instance;
	}
	function widget($args, $instance) { // 输出显示在页面上
	extract( $args );

        ?>
              <?php echo $before_widget; ?>
        <div class="my-info">
    <div class="background">
        <img src="<?php echo _qzdy('zero-footer-txbjt'); ?>" alt="">
    </div>
    <div class="user-info">
        <div class="avatar">
            <img src="<?php echo _qzdy('zero-footer-txurl'); ?>" alt="">
        </div>
        <div class="title">
            <p><?php echo _qzdy('zero-footer-txxnc'); ?></p>
        </div>
                <div class="autograph">
            <p><?php echo _qzdy('zero-footer-txqm'); ?></p>
        </div>
    </div>
    <ul class="web-info">
        <li>
            <p>文章数量</p>
            <span><?php $count_posts = wp_count_posts(); echo $published_posts = $count_posts->publish; ?></span>
        </li>
        <li>
            <p>标签数量</p>
            <span><?php echo $count_tags = wp_count_terms('post_tag'); ?></span>
        </li>
        <li>
            <p>运行天数</p>
            <span><span id="runtime_span"></span>
<a id="days">0</a>
<script>
var s1 = '<?php echo _qzdy('zero-header-wzyxrq'); ?>';//设置为你的建站时间
s1 = new Date(s1.replace(/-/g, "/"));
s2 = new Date();
var days = s2.getTime() - s1.getTime();
var number_of_days = parseInt(days / (1000 * 60 * 60 * 24));
document.getElementById('days').innerHTML = number_of_days;
</script></span>
        </li>
    </ul>
<?php if(_qzdy('widget-icon-box-kg')){?>
     <div class="widget-icon text-center">
        <?php if(_qzdy('widget-icon-dashang')){?>
        <a href="javascript:;" id="shang"><i class="fa layui-bg-blue" aria-hidden="true">赏</i></a>
         <?php }?>
          <?php 
 $icotb = _qzdy('qzdy-widget-icon');
 foreach ($icotb as $key){     
?>
 <a title="<?php echo $key['widget-icon-title'];?>" href="<?php echo $key['widget-icon-href'];?>" target="_blank"><i style="background-color:<?php echo $key['widget-icon-background'];?>;color:<?php echo $key['widget-icon-color'];?>;" class="<?php echo $key['widget-icon-ico'];?>"></i></a>
<?php }?>
         </div><?php }?>
     <?php if(current_user_can('manage_options')){ ?>
       <div class="widget-admin text-center">
                <p>
                    <a href="<?php echo admin_url('/post-new.php'); ?>"><i class="layui-icon layui-icon-edit" style="font-size: 15px; color: #4C4C4C;"></i><?php _e('撰写文章','moedog'); ?> </a>
                    <a class="widget-admin-center" href="<?php echo admin_url('/post-new.php?post_type=page'); ?>"><i class="layui-icon layui-icon-add-1" style="font-size: 15px; color: #4C4C4C;"></i><?php _e('新建页面','moedog'); ?> </a>
                    <a href="<?php echo admin_url('/edit-comments.php'); ?>"><i class="layui-icon layui-icon-read" style="font-size: 15px; color: #4C4C4C;"></i><?php _e('查看评论','moedog'); ?></a>
                </p>
                <p>
                    <a href="<?php echo admin_url('/options-general.php'); ?>"><i class="layui-icon layui-icon-console" style="font-size: 15px; color: #4C4C4C;"></i><?php _e('站点设置','moedog'); ?> </a>
                    <a class="widget-admin-center" href="<?php echo admin_url('/admin.php?page=my-framework#tab=首页设置'); ?>"><i class="layui-icon layui-icon-theme" style="font-size: 15px; color: #4C4C4C;"></i><?php _e('主题设置','moedog'); ?> </a>
                    <a href="<?php echo wp_logout_url($redirect); ?>"><i class="layui-icon layui-icon-reduce-circle" style="font-size: 15px; color: #4C4C4C;"></i><?php _e('退出登录','moedog'); ?></a>
                </p>
            </div>
            <?php } ?>
</div>
              <?php echo $after_widget; ?>

        <?php
	}
}
register_widget('My_Widget_persona');
?>