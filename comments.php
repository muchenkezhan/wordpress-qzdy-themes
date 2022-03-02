<?php
// @回复人
function comment_add_at( $comment_text, $comment = '') { if( $comment->comment_parent > 0) { $comment_text = '<a rel="nofollow" class="comment_at" href="#comment-' . $comment->comment_parent . '">@'.get_comment_author( $comment->comment_parent ) . '：</a> ' .
$comment_text; } return $comment_text; } add_filter( 'comment_text' , 'comment_add_at', 10, 2);
// @回复人
// Edit By aj0.cn
if ( post_password_required() )
return;
?>
<div id="comments" class="responsesWrapper">
<meta content="UserComments:<?php echo number_format_i18n( get_comments_number() );?>" itemprop="interactionCount">
<h3 class="comments-title">共有 <span class="commentCount"><?php echo number_format_i18n( get_comments_number() );?></span> 条评论</h3>
<ol class="commentlist">
<?php
wp_list_comments( array(
'style' => 'ol',
'short_ping' => true,
'avatar_size' => 48,
'type' =>'comment',
'callback' =>'simple_comment',
) );
?>
</ol>
<?php
$post_info = get_post(get_the_ID(), ARRAY_A);
if(!$post_info['comment_count']){
?>
<nav class="navigation comment-navigation u-textAlignCenter" data-fuck="<?php the_ID();?>">
<?php 
if($post_info['comment_count']){
    paginate_comments_links(array('prev_next'=>true)); 
} else if(!$post_info['comment_count']){
    echo '暂无评论，来一句吧！';
}
?>
</nav>
<?php } ?>
<?php if(comments_open()) : ?>
<div id="respond" class="respond" role="form">
<h2 id="reply-title" class="comments-title"><?php comment_form_title( '', '回复给 %s' ); ?> <small>
<?php cancel_comment_reply_link(); ?>
</small></h2>

<?php if ( get_option('comment_registration') && !is_user_logged_in()) : ?>
<p>您必须 <a class="must_login_btn" href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">登陆</a>或<a class="must_login_btn" href="<?php echo get_option('home'); ?>/wp-login.php?action=register">注册</a> 后可评论</p>
<?php else : ?>
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" class="commentform" id="commentform">
<?php if ( get_current_user_id() ) : ?>
<p class="warning-text" style="margin-bottom:10px">以<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>身份登录 | <a class="link-logout" href="<?php echo wp_logout_url(get_permalink()); ?>">注销</a></p>
<?php include(TEMPLATEPATH . '/smiley.php'); ?>
<textarea class="form-control" rows="3" id="comment" onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('submit').click();return false};" placeholder="评论内容..." tabindex="1" name="comment" required></textarea>
<?php else : ?>
<?php include(TEMPLATEPATH . '/smiley.php'); ?>
<textarea class="form-control" rows="3" id="comment" onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('submit').click();return false};" placeholder="评论内容..." tabindex="1" name="comment" required></textarea>
<div class="commentform-info">
<label id="author_name" for="author">
<input class="form-control" id="author" type="text" tabindex="2" value="<?php echo $comment_author; ?>" name="author" placeholder="昵称[必填]" required>
</label>
<label id="author_email" for="email">
<input class="form-control" id="email" type="text" tabindex="3" value="<?php echo $comment_author_email; ?>" name="email" placeholder="邮箱[必填]" required>
</label>
<label id="author_website" for="url">
<input class="form-control" id="url" type="text" tabindex="4" value="<?php echo $comment_author_url; ?>" name="url" placeholder="网址(可不填)">
</label>

</div>
<?php endif; ?>
<span style="    float:right;" class="btn-group commentBtn" role="group">
<input name="submit" type="submit" id="submit" class="btn btn-sm btn-danger btn-block" tabindex="5" value="发表评论" /></span>
<?php comment_id_fields(); ?>
</form>
<?php endif; ?>
</div>
<?php endif; ?>
</div>