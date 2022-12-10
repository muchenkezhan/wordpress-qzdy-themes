<?php
//  add_filter( 'get_avatar' , 'local_random_avatar' , 1 , 5 );
// function local_random_avatar( $avatar, $id_or_email, $size, $default, $alt) {
//     if ( ! empty( $id_or_email->user_id ) ) {
//         $avatar = ''.get_template_directory_uri().'/images/touxiang/admin.jpg';
//     }
//     // 	php8.0手段@
//      $parent_id='';
//      @$qqmail = trim(get_comment($parent_id)->comment_author_email);
//   if(strpos($qqmail,'@qq.com')){
//   @$avatar = trim(get_comment($parent_id)->comment_author_email);
// $geturl = 'http://ptlogin2.qq.com/getface?&imgtype=1&uin='.$avatar;
// $qquser = file_get_contents($geturl);
// $str1 = explode('sdk&k=', $qquser);
// $str2 = explode('&s=', $str1[1]);
// $k = $str2[0];
// $avatar = 'https://q1.qlogo.cn/g?b=qq&k='.$k.'&s=100';
//     }else{
//          $random = mt_rand(1, 3);
//          $avatar = ''.get_template_directory_uri().'/images/touxiang/'. $random .'.jpeg';
//      }
//     $avatar = "<img alt='{$alt}' src='{$avatar}' class='avatar avatar-{$size} photo' height='{$size}' width='{$size}' />";
//     return $avatar;
// }
// 评论随机头像
// qqtx
// function  qqgravatar($qq){
// $geturl = 'http://ptlogin2.qq.com/getface?&imgtype=1&uin='.$qq;
// $qquser = file_get_contents($geturl);
// $str1 = explode('sdk&k=', $qquser);
// $str2 = explode('&s=', $str1[1]);
// $k = $str2[0];
// $qqimg = 'https://q1.qlogo.cn/g?b=qq&k='.$k.'&s=100';
// return $qqimg;
// }
// qqtx
// 更换gravatar头像源
    if ( ! function_exists( 'get_cravatar_url' ) ) {
        /**
         * 替换 Gravatar 头像为 Cravatar 头像
         *
         * Cravatar 是 Gravatar 在中国的完美替代方案，你可以在 https://cravatar.cn 更新你的头像
         */
        function get_cravatar_url( $url ) {
            $sources = array(
                'www.gravatar.com',
                '0.gravatar.com',
                '1.gravatar.com',
                '2.gravatar.com',
                'secure.gravatar.com',
                'cn.gravatar.com',
                'gravatar.com',
            );
            return str_replace( $sources, 'cravatar.cn', $url );
        }
        add_filter( 'um_user_avatar_url_filter', 'get_cravatar_url', 1 );
        add_filter( 'bp_gravatar_url', 'get_cravatar_url', 1 );
        add_filter( 'get_avatar_url', 'get_cravatar_url', 1 );
    }
    if ( ! function_exists( 'set_defaults_for_cravatar' ) ) {
        /**
         * 替换 WordPress 讨论设置中的默认头像
         */
        function set_defaults_for_cravatar( $avatar_defaults ) {
            $avatar_defaults['gravatar_default'] = 'Cravatar 标志';
            return $avatar_defaults;
        }
        add_filter( 'avatar_defaults', 'set_defaults_for_cravatar', 1 );
    }
    if ( ! function_exists( 'set_user_profile_picture_for_cravatar' ) ) {
        /**
         * 替换个人资料卡中的头像上传地址
         */
        function set_user_profile_picture_for_cravatar() {
            return '<a href="https://cravatar.cn" target="_blank">您可以在 Cravatar 修改您的资料图片</a>';
        }
        add_filter( 'user_profile_picture_description', 'set_user_profile_picture_for_cravatar', 1 );
    }

// 更换gravatar头像源