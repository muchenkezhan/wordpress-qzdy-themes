<?php 
 
class My_Widget_login extends WP_Widget {
 
	function __construct()
	{
		$widget_ops = array('description' => 'Qzdy-带背景图片和头像登录注册');
		$control_ops = array('width' => 400, 'height' => 300);
		parent::__construct(false,$name='一Qzdy-带头像登录注册',$widget_ops);  
 
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
        <div class="my-info" style="text-align: center;">
    <div class="background">
        <img src="<?php echo _qzdy('zero-footer-txbjt'); ?>" alt="">
    </div>
    <div class="user-info">
        <div class="avatar">
<?php if (!(get_current_user_id() != 0)){ ?>  
<img src="<?php echo get_template_directory_uri(); ?>/images/avatar-default.png" alt="">
  	<?php } else { ?>
<?php global $current_user;
//一个函数
wp_get_current_user();
//输出头像，两个参数，第一个是用户ID（必须），第二个是头像大小（可选）
echo get_avatar( $current_user->ID); ?>
<?php }?>
        </div>
        <div class="title">
                    <?php if (!(get_current_user_id() != 0)){ ?>  
<p>Hi!请登录</p>
  	<?php } else { ?>
<p>你好,<?php global $current_user;
 get_currentuserinfo();
 echo  $current_user->user_login;
?></p>
<?php }?>
            
        </div>

    </div>
<div class="layui-btn-container">
        <?php if (!(current_user_can('level_0'))){ ?>  
   <a type="button" class="layui-btn qzdydl" href="<?php echo get_option('home'); ?>/wp-login.php"><i class="layui-icon layui-icon-friends" style="font-size: 20px; color: #fff;"></i>登录</a> 
  <a type="button" class="layui-btn qzdyzc" href="<?php echo get_option('home'); ?>/wp-login.php?action=register"><i class="layui-icon layui-icon-add-circle-fine" style="font-size: 20px; color: #fff;"></i>注册</a> 
  	<?php } else { ?>


  <a type="button" class="layui-btn qzdydl" href="<?php echo home_url().'/wp-admin/'?>"><i class="layui-icon layui-icon-friends" style="font-size: 20px; color: #fff;"></i>资料</a> 
  <a type="button" class="layui-btn qzdyzc" href="<?php echo wp_logout_url( get_bloginfo('url') ); ?>"><i class="layui-icon layui-icon-next" style="font-size: 20px; color: #fff;"></i>登出</a> 
<?php }?>
</div>





    
</div>
              <?php echo $after_widget; ?>

        <?php
	}
}
register_widget('My_Widget_login');
?>