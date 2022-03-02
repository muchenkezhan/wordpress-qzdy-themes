<?php 
 
class My_Widget_pl extends WP_Widget {
 
	function __construct()
	{
		$widget_ops = array('classname' => 'my_widget_recent_comments','description' => 'Qzdy-近期评论');
		$control_ops = array('width' => 400, 'height' => 300);
		parent::__construct(false,$name='Qzdy-近期评论',$widget_ops);  
 
                //parent::直接使用父类中的方法
                //$name 这个小工具的名称,
                //$widget_ops 可以给小工具进行描述等等。
                //$control_ops 可以对小工具进行简单的样式定义等等。
	}
	function form($instance) { // 给小工具(widget) 添加表单内容
		@$title = esc_attr($instance['title']);
		@$title_quantity = esc_attr($instance['title_quantity']);
	?>
	<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_attr_e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
	<p>	
<label for="<?php echo $this->get_field_id('title_quantity'); ?>"><?php esc_attr_e('标签数量:'); ?>
<input class="widefat" id="<?php echo $this->get_field_id('title_quantity'); ?>" name="<?php echo $this->get_field_name('title_quantity'); ?>" type="text" value="<?php echo $title_quantity; ?>" /></label></p>
	<?php
    }
	function update($new_instance, $old_instance) { // 更新保存
		return $new_instance;
	}
   function widget($args, $instance) {
        global $wpdb, $comments, $comment;
 
        $cache = wp_cache_get('my_widget_recent_comments', 'widget');
 
        if (!is_array($cache))
            $cache = array();
 
        if (!isset($args['widget_id']))
            $args['widget_id'] = $this->id;
 
        if (isset($cache[$args['widget_id']])) {
            echo $cache[$args['widget_id']];
            return;
        }
 
        extract($args, EXTR_SKIP);
        $output = '';
        $title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Comments') : $instance['title'], $instance, $this->id_base);
        if (empty($instance['number']) || !$number = absint($instance['number']))
            $number = apply_filters('widget_title', empty($instance['title_quantity']) ? __('1') : $instance['title_quantity']);
        //获取评论，过滤掉管理员自己
        $comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE user_id !=1 and comment_approved = '1' and comment_type not in ('pingback','trackback') ORDER BY comment_date_gmt DESC LIMIT $number");
        $output .= $before_widget;
        if ($title)
            $output .= $before_title . $title . $after_title;
 
        $output .= '<ul id="myrecentcomments">';
        if ($comments) {
            // Prime cache for associated posts. (Prime post term cache if we need it for permalinks.)
            $post_ids = array_unique(wp_list_pluck($comments, 'comment_post_ID'));
            _prime_post_caches($post_ids, strpos(get_option('permalink_structure'), '%category%'), false);
 
            foreach ((array) $comments as $comment) {
                //头像
                $avatar = get_avatar($comment, 40);
                //作者名称
                $author = get_comment_author();
                //评论内容
                $content = apply_filters('get_comment_text', $comment->comment_content);
                $content = mb_strimwidth(strip_tags($content), 0, '65', '...', 'UTF-8');
                $content = convert_smilies($content);
                //评论的文章
                $plwzbt=get_the_title($comment->comment_post_ID);
                 $plwzbts = mb_strimwidth(strip_tags($plwzbt), 0, '40', '...', 'UTF-8');
                $post = '<a href="' . esc_url(get_comment_link($comment->comment_ID)) . '">' . $plwzbts . '</a>';
                $output .= '<li class="comment" style="padding-bottom: 5px; ">
            <div>
                <table class="tablayout"><tbody><tr>
                <td class="tdleft" style="width:55px;vertical-align:top;">' . $avatar . '</td>
                <td class="tdleft" style="vertical-align:top;">
                    <p class="comment-author"><strong><span class="fn">'.$author.'</span></strong><span class="says">: '.$post.'</span></p>
                </tr></tbody></table>
            </div>
            <div class="comment-content"><p class="last">' . $content . '</p>
</div>
        </li>';
            }
        }
        $output .= '</ul>';
        $output .= $after_widget;
 
        echo $output;
        $cache[$args['widget_id']] = $output;
        wp_cache_set('my_widget_recent_comments', $cache, 'widget');
    }
}
register_widget('My_Widget_pl');
?>