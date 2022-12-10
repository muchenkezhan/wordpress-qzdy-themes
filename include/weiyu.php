<?php
//添加说说页面功能
add_action('init', 'my_custom_init'); 
function my_custom_init() {

        $labels = array(
                'name' => '微语',
                'singular_name' => '微语',
                'all_items' => '所有微语',
                'add_new' => '发表微语',
                'add_new_item' => '撰写新微语',
                'edit_item' => '编辑微语',
                'new_item' => '新微语',
                'view_item' => '查看微语',
                'search_items' => '搜索微语',
                'not_found' => '暂无微语',
                'not_found_in_trash' => '没有已遗弃的微语',
                'parent_item_colon' => '',
                'menu_name' => '微语'
        );

        $args = array(
                'labels' => $labels,
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'query_var' => true,
                'rewrite' => true,
                'capability_type' => 'post',
                'has_archive' => true,
                'hierarchical' => false,
                'menu_position' => null,
                'supports' => array('title','comments')
        ); 
register_post_type('weiyu',$args); 
    add_rewrite_rule('^weiyu/([0-9]+)/?', 'index.php?post_type=weiyu&p=$matches[1]', 'top');
}
// 屏蔽微语文章查看按钮
function boke8_remove_row_actions($actions, $post) {
	if($post->post_type == 'shuoshuo' && isset($actions['view'])){
		unset($actions['view']);
	}
    return $actions;
}
add_filter('post_row_actions', 'boke8_remove_row_actions', 10, 2);
    function timeago( $ptime ) {
        $ptime = strtotime($ptime);
        $etime = time() - $ptime;
        if ($etime < 1) return '刚刚';
        $interval = array (
       12 * 30 * 24 * 60 * 60 => '年前 ('.date('Y-m-d', $ptime).')',
        30 * 24 * 60 * 60 => '个月前 ('.date('m-d', $ptime).')',
        7 * 24 * 60 * 60 => '周前 ('.date('m-d', $ptime).')',
        24 * 60 * 60 => '天前',
        60 * 60 => '小时前',
        60 => '分钟前',
        1 => '秒前'
       );
        foreach ($interval as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
        $r = round($d);
        return $r . $str;
        }
       };
       }