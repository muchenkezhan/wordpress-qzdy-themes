<?php
 
/**
 * 继承WP_Widget_Recent_Comments
 * 这样就只需要重写widget方法就可以了
 */
class My_Widget_Recent_Comments extends WP_Widget_Recent_Comments {
 
    /**
     * 构造方法，主要是定义小工具的名称，介绍
     */
    function __construct() {
       $widget_ops = array('classname' => 'my_widget_recent_comments', 'description' => __('显示最新评论内容'));
        $this->WP_Widget('my-recent-comments', __('我的最新评论', 'my'), $widget_ops);
    }
 
    /**
     * 小工具的渲染方法，这里就是输出评论
     */
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
            $number = 5;
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
                $post = '<a href="' . esc_url(get_comment_link($comment->comment_ID)) . '">' . get_the_title($comment->comment_post_ID) . '</a>';
                $post = mb_strimwidth(strip_tags($post), 0, '40', '...', 'UTF-8');
                $output .= '<li class="comment" style="padding-bottom: 5px; ">
            <div>
                <table class="tablayout"><tbody><tr>
                <td class="tdleft" style="width:55px;vertical-align:top;">' . $avatar . '</td>
                <td class="tdleft" style="vertical-align:top;">
                    <p class="comment-author"><strong><span class="fn">'.$author.'</span></strong><span class="says">评论'.$post.'</span></p>
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
 
register_widget('My_Widget_Recent_Comments');