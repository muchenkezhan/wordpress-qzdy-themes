<?php 
function site_smtp( $phpmailer ) {
    $smtp_fwqdz=_qzdy('zero-smtp-fwqdz');
    $smtp_dk=_qzdy('zero-smtp-dk');
    $smtp_ssl=_qzdy('zero-smtp-ssl');
    $smtp_fjyx=_qzdy('zero-smtp-fjyx');
    $smtp_ps=_qzdy('zero-smtp-ps');

    
	$phpmailer->Mailer = 'smtp';
	$phpmailer->Host = ''.$smtp_fwqdz.'';
	$phpmailer->SMTPAuth = true;
	$phpmailer->Port = ''.$smtp_dk.'';
	$phpmailer->SMTPSecure = ''.$smtp_ssl.'';
	$phpmailer->Username = ''.$smtp_fjyx.'';
	$phpmailer->Password = ''.$smtp_ps.'';
	$phpmailer->From = ''.$smtp_fjyx.'';
}
	add_action( 'phpmailer_init', 'site_smtp', 10);
	@$headers = ['Content-Type: text/html; charset=UTF-8'];
	@$mailSent = wp_mail($_POST['email'], '', $message, $headers);
function comment_mail_notify($comment_id) {
    $admin_email = get_bloginfo ('admin_email'); 
    $comment = get_comment($comment_id);
    $comment_author_email = trim($comment->comment_author_email);
    $parent_id = $comment->comment_parent ? $comment->comment_parent : '';
    $to = $parent_id ? trim(get_comment($parent_id)->comment_author_email) : '';
    $spam_confirmed = $comment->comment_approved;
    if (($parent_id != '') && ($spam_confirmed != 'spam') && ($to != $admin_email)) {
    $wp_email = 'no-reply@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME']));
    $subject = '您在 [' . get_option("blogname") . '] 的留言有了新回复';
    $message = '
    <div style="background-color:#fff; border:1px solid #666666; color:#111; -moz-border-radius:8px; -webkit-border-radius:8px; -khtml-border-radius:8px; border-radius:8px; font-size:12px; width:702px; margin:0 auto; margin-top:10px;">
    <div style="background:#666666; width:100%; height:60px; color:white; -moz-border-radius:6px 6px 0 0; -webkit-border-radius:6px 6px 0 0; -khtml-border-radius:6px 6px 0 0; border-radius:6px 6px 0 0; ">
    <span style="height:60px; line-height:60px; margin-left:30px; font-size:12px;"> 您在<a style="text-decoration:none; color:#ff0;font-weight:600;"> [' . get_option("blogname") . '] </a>上的留言有回复啦！</span></div>
    <div style="width:90%; margin:0 auto">
      <p>' . trim(get_comment($parent_id)->comment_author) . ', 您好!</p>
      <p>您在《' . get_the_title($comment->comment_post_ID) . '》的留言:<br />
      <p style="background-color: #EEE;border: 1px solid #DDD;padding: 20px;margin: 15px 0;">'. trim(get_comment($parent_id)->comment_content) . '</p>
      <p>' . trim($comment->comment_author) . ' 给你的回复:<br />
      <p style="background-color: #EEE;border: 1px solid #DDD;padding: 20px;margin: 15px 0;">'. trim($comment->comment_content) . '</p>
      <p>你可以点击<a href="' . htmlspecialchars(get_comment_link($parent_id, array('type' => 'comment'))) . '">查看完整内容</a></p>
      <p>欢迎再度光临<a href="' . get_option('home') . '">' . get_option('blogname') . '</a></p>
      <p>(此邮件由系统自动发出, 请勿回复。)</p>
    </div></div>';
    $from = "From: \"" . get_option('blogname') . "\" <$wp_email>";
    $headers = "$from\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";
    wp_mail( $to, $subject, $message, $headers );
    }
  }
  add_action('comment_post', 'comment_mail_notify');
add_filter('password_change_email','__return_false');
add_filter('wp_new_user_notification_email','__return_false');
add_action('user_register','kratos_pwd_register_mail',101);
function kratos_pwd_register_mail($user_id){
    $user = get_user_by('id',$user_id);
    $blogname = htmlspecialchars_decode(get_option('blogname'),ENT_QUOTES);
    if($admin_email = get_bloginfo ('admin_email')){
        $pwd = __("您设定的密码","moedog");
    }else{
        $pwd = wp_generate_password(10,false);
        $user->user_pass = $pwd;
        $new_user_id = wp_update_user($user);
    }
    $message = '
        <div style="background:#ececec;width:100%;padding:50px 0;text-align:center">
            <div style="background:#fff;width:750px;text-align:left;position:relative;margin:0 auto;font-size:14px;line-height:1.5">
                <div style="zoom:1;padding:25px 40px;background:#518bcb;border-bottom:1px solid #467ec3">
                    <h1 style="color:#fff;font-size:25px;line-height:30px;margin:0"><a href="'.get_option('home').'" style="text-decoration:none;color:#FFF">'.$blogname.'</a></h1>
                </div>
                <div style="padding:35px 40px 30px">
                    <h2 style="font-size:18px;margin:5px 0">Hi '.$user->nickname.':</h2>
                    <p style="color:#313131;line-height:20px;font-size:15px;margin:20px 0">'.__("恭喜您注册成功，请使用下面的信息登录并修改密码。","moedog").'</p>
                    <table cellspacing="0" style="font-size:14px;text-align:center;border:1px solid #ccc;table-layout:fixed;width:500px">
                        <thead>
                            <tr>
                                <th style="padding:5px 0;text-indent:8px;border:1px solid #eee;border-width:0 1px 1px 0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;font-weight:normal;color:#a0a0a0;background:#eee;border-color:#dfdfdf" width="180px">'.__("账号","moedog").'</th>
                                <th style="padding:5px 0;text-indent:8px;border:1px solid #eee;border-width:0 1px 1px 0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;font-weight:normal;color:#a0a0a0;background:#eee;border-color:#dfdfdf" width="180px">'.__("邮箱","moedog").'</th>
                                <th style="padding:5px 0;text-indent:8px;border:1px solid #eee;border-width:0 1px 1px 0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;font-weight:normal;color:#a0a0a0;background:#eee;border-color:#dfdfdf" width="180px">'.__("密码","moedog").'</th>
                                <th style="padding:5px 0;text-indent:8px;border:1px solid #eee;border-width:0 1px 1px 0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;font-weight:normal;color:#a0a0a0;background:#eee;border-color:#dfdfdf" width="120px">'.__("操作","moedog").'</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="padding:5px 0;text-indent:8px;border:1px solid #eee;border-width:0 1px 1px 0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">'.trim($user->user_login).'</td>
                                <td style="padding:5px 0;text-indent:8px;border:1px solid #eee;border-width:0 1px 1px 0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">'.trim($user->user_email).'</td>
                                <td style="padding:5px 0;text-indent:8px;border:1px solid #eee;border-width:0 1px 1px 0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">'.trim($pwd).'</td>
                                <td style="padding:5px 0;text-indent:8px;border:1px solid #eee;border-width:0 1px 1px 0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis"><a href="'.wp_login_url().'" style="color:#1E5494;text-decoration:none;vertical-align:middle" target="_blank">'.__("立即登录","moedog").'</a></td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <div style="font-size:13px;color:#a0a0a0;padding-top:10px">'.__("该邮件由系统自动发出，如果不是您本人操作，请忽略此邮件。","moedog").'</div>
                    <div class="qmSysSign" style="padding-top:20px;font-size:12px;color:#a0a0a0">
                        <p style="color:#a0a0a0;line-height:18px;font-size:12px;margin:5px 0">'.$blogname.'</p>
                        <p style="color:#a0a0a0;line-height:18px;font-size:12px;margin:5px 0"><span style="border-bottom:1px dashed #ccc" t="5" times="">'.date("Y-m-d",time()).'</span></p>
                    </div>
                </div>
            </div>
        </div>';
    $headers = "Content-Type:text/html;charset=UTF-8\n";
    wp_mail($user->user_email,'['.$blogname.'] '.__('欢迎注册','moedog'),$message,$headers);
}
add_action('comment_unapproved_to_approved','kratos_comment_approved');
function kratos_comment_approved($comment){
    if(is_email($comment->comment_author_email)){
        $wp_email = 'no-reply@'.preg_replace('#^www\.#','',strtolower($_SERVER['SERVER_NAME']));
        $to = trim($comment->comment_author_email);
        $post_link = get_permalink($comment->comment_post_ID);
        $subject = __('[通知] 您的留言已经通过审核','moedog');
        $message = '
            <style>img.wp-smiley{width:auto!important;height:auto!important;max-height:8em!important;margin-top:-4px;display:inline}</style>
            <div style="background:#ececec;width:100%;padding:50px 0;text-align:center">
                <div style="background:#fff;width:750px;text-align:left;position:relative;margin:0 auto;font-size:14px;line-height:1.5">
                    <div style="zoom:1;padding:25px 40px;background:#518bcb;border-bottom:1px solid #467ec3">
                        <h1 style="color:#fff;font-size:25px;line-height:30px; margin:0"><a href="'.get_option('home').'" style="text-decoration:none;color:#FFF">'.htmlspecialchars_decode(get_option('blogname'),ENT_QUOTES).'</a></h1>
                    </div>
                    <div style="padding:35px 40px 30px">
                        <h2 style="font-size:18px;margin:5px 0">Hi '.trim($comment->comment_author).':</h2>
                        <p style="color:#313131;line-height:20px;font-size:15px;margin:20px 0">'.__('您有一条留言通过了管理员的审核并显示在文章页面，摘要信息请见下表。','moedog').'</p>
                        <table cellspacing="0" style="font-size:14px;text-align:center;border:1px solid #ccc;table-layout:fixed;width:500px">
                            <thead>
                                <tr>
                                    <th style="padding:5px 0;text-indent:8px;border:1px solid #eee;border-width:0 1px 1px 0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;font-weight:normal;color:#a0a0a0;background:#eee;border-color:#dfdfdf" width="280px">'.__('文章','moedog').'</th>
                                    <th style="padding:5px 0;text-indent:8px;border:1px solid #eee;border-width:0 1px 1px 0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;font-weight:normal;color:#a0a0a0;background:#eee;border-color:#dfdfdf" width="270px">'.__('内容','moedog').'</th>
                                    <th style="padding:5px 0;text-indent:8px;border:1px solid #eee;border-width:0 1px 1px 0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;font-weight:normal;color:#a0a0a0;background:#eee;border-color:#dfdfdf" width="110px">'.__('操作','moedog').'</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="padding:5px 0;text-indent:8px;border:1px solid #eee;border-width:0 1px 1px 0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">《'.get_the_title($comment->comment_post_ID).'》</td>
                                    <td style="padding:5px 0;text-indent:8px;border:1px solid #eee;border-width:0 1px 1px 0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">'.convert_smilies(trim($comment->comment_content)).'</td>
                                    <td style="padding:5px 0;text-indent:8px;border:1px solid #eee;border-width:0 1px 1px 0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis"><a href="'.get_comment_link($comment->comment_ID).'" style="color:#1E5494;text-decoration:none;vertical-align:middle" target="_blank">'.__('查看留言','moedog').'</a></td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <div style="font-size:13px;color:#a0a0a0;padding-top:10px">'.__('该邮件由系统自动发出，如果不是您本人操作，请忽略此邮件。','moedog').'</div>
                        <div class="qmSysSign" style="padding-top:20px;font-size:12px;color:#a0a0a0">
                            <p style="color:#a0a0a0;line-height:18px;font-size:12px;margin:5px 0">'.htmlspecialchars_decode(get_option('blogname'),ENT_QUOTES).'</p>
                            <p style="color:#a0a0a0;line-height:18px;font-size:12px;margin:5px 0"><span style="border-bottom:1px dashed #ccc" t="5" times="">'.date("Y-m-d",time()).'</span></p>
                        </div>
                    </div>
                </div>
            </div>';
        $from = "From: \"".htmlspecialchars_decode(get_option('blogname'),ENT_QUOTES)."\" <$wp_email>";
        $headers = "$from\nContent-Type: text/html; charset=".get_option('blog_charset')."\n";
        wp_mail($to,$subject,$message,$headers);
    }
}