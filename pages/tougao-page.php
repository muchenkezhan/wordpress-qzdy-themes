<?php
/*
 * Template Name: 页面面板-投稿页面
 */
if( isset($_POST['tougao_form']) && $_POST['tougao_form'] == 'send')
{
    if ( isset($_COOKIE["tougao"]) && ( time() - $_COOKIE["tougao"] ) < 120 )
    {
        wp_die('您投稿也太勤快了吧，先歇会儿！');
    }
    // 表单变量初始化
    $name = isset( $_POST['tougao_authorname'] ) ? trim(htmlspecialchars($_POST['tougao_authorname'], ENT_QUOTES)) : '';
    $email =  isset( $_POST['tougao_authoremail'] ) ? trim(htmlspecialchars($_POST['tougao_authoremail'], ENT_QUOTES)) : '';
    $blog =  isset( $_POST['tougao_authorblog'] ) ? trim(htmlspecialchars($_POST['tougao_authorblog'], ENT_QUOTES)) : '';
    $title =  isset( $_POST['tougao_title'] ) ? trim(htmlspecialchars($_POST['tougao_title'], ENT_QUOTES)) : '';
    $category =  isset( $_POST['cat'] ) ? (int)$_POST['cat'] : 0;
    $content =  isset( $_POST['tougao_content'] ) ? trim(htmlspecialchars($_POST['tougao_content'], ENT_QUOTES)) : '';
    // 表单项数据验证
    if ( empty($name) || strlen($name) > 20 )
    {
        wp_die('昵称必须填写，且长度不得超过20字');
    }
    if ( empty($email) || strlen($email) > 60 || !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email))
    {
        wp_die('Email必须填写，且长度不得超过60字，必须符合Email格式');
    }
    if ( empty($title) || strlen($title) > 100 )
    {
        wp_die('标题必须填写，且长度不得超过100字');
    }
    if ( empty($content) || strlen($content) > 3000 || strlen($content) < 100)
    {
        wp_die('内容必须填写，且长度不得超过3000字，不得少于100字');
    }
    $post_content = '昵称: '.$name.'<br />Email: '.$email.'<br />blog: '.$blog.'<br />内容:'.$content;
    $tougao = array(
        'post_title' => $title,
        'post_content' => $post_content,
        'post_category' => array($category)
    );
    // 将文章插入数据库
    $status = wp_insert_post( $tougao );
    if ($status != 0)
    {
        setcookie("tougao", time(), time()+180);
        wp_die('投稿成功！感谢投稿！');
    }
    else
    {
        wp_die('投稿失败！');
    }
}
?>
<?php get_header();?>
 <!--上面是头部-->
<div class="layui-content">
<div class="layui-container">
<div class="layui-row layui-col-space15 main">
    <!--内容页面上的分类提示-->
<div class="map">
<?php if ( function_exists('ah_breadcrumb') ) ah_breadcrumb(); ?>
    </div>
    <!--提示结束-->
    <div class="layui-col-md9 layui-col-lg9" <?php qzdy_sidebar_fangxiang(); ?>>
        <!--内容开始-->
        <div class="title-article">
            <h1><?php the_title(); ?></h1>
            <div class="title-msg">
                <?php if(!empty($article_author = _qzdy('zero-footer-article-author'))){?>
                <span><i class="layui-icon layui-icon-username"></i><?php echo _qzdy('zero-footer-txxnc');?></span><?php } ?>
                <span><i class="layui-icon layui-icon-time"></i><?php the_time(' Y/n/j'); ?></span>
                <span><i class="fa fa-eye" aria-hidden="true"></i><?php post_views(' ',''); ?>℃</span>
                <span><?php edit_post_link('[编辑]'); ?></span>
            </div>
        </div>
        <div class="text" itemprop="articleBody">
            <div id="md_content_2" class="md_content markdown-body editormd-html-preview" style="min-height: 50px;">
                        <p>
<?php the_content();?>
<form class="layui-form" action="" method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
     <div class="layui-form-item">
        <label class="layui-form-label">昵称:*</label>
    <div class="layui-input-inline">
        <input class="layui-input" type="text" size="40" value="" name="tougao_authorname" />
    </div></div>
    <div class="layui-form-item">
        <label class="layui-form-label">E-Mail:*</label>
   
    <div class="layui-input-inline">
        <input class="layui-input" type="text" size="40" value="" name="tougao_authoremail" />
    </div> </div>
                   
    <!--<div style="text-align: left; padding-top: 10px;">-->
    <!--    <label>您的博客:</label>-->
    <!--</div>-->
    <!--<div>-->
    <!--    <input class="layui-input" type="text" size="40" value="" name="tougao_authorblog" />-->
    <!--</div>-->
                    
    <div style="text-align: left; padding-top: 10px;">
        <label>文章标题:*</label>
    </div>
    <div>
        <input class="layui-input" type="text" size="40" value="" name="tougao_title" />
    </div>
    <div style="text-align: left; padding-top: 10px;">
        <label>分类:*</label>
    </div>
    <div style="text-align: left;">
        <?php wp_dropdown_categories('show_count=1&hierarchical=1'); ?>
    </div>
    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label" style="width: 100px;">文章内容:*</label>
   
    <div class="layui-input-block" style="margin-left: 0px;">
        <textarea class="layui-textarea" rows="15" cols="55" name="tougao_content"></textarea>
    </div> </div>
    <br clear="all">
    <div style="text-align: center; padding-top: 10px;">
        <input type="hidden" value="send" name="tougao_form" />
        <input class="layui-btn layui-btn-primary" type="submit" value="提交" />
        <input class="layui-btn layui-btn-primary" type="reset" value="重填" />
    </div>
</form>
</p>
            </div>
            <!--底部完毕-->
           <div class="the-end">- THE END -</div>
         
            <!--修改日期-->
            <div class="time-text">
            <i class="layui-icon iconfont iconshijian"></i> 最后修改：<?php the_modified_time('Y年n月d日 H:i:s'); ?></div>
            <!--申明-->
            <div class="copy-text">
            <div>
                <p><?php echo _wenzhangbanquan();?></p>
                <p class="hidden-xs">如若转载，请注明出处：<a><?php echo get_permalink(); ?></a> </p>
            </div>
        </div>
        </div>
<?php 
$zero_footer_plk = _qzdy('zero-footer-plk');
	if(!empty($zero_footer_plk)){?>
	<?php if (comments_open() ) { ?>
<div class="page-comt<?php echo qzdy_prevent_theme(); ?>">
    <?php $file=""; $separate_comments="";?>
    <?php comments_template( $file, $separate_comments ); ?>
</div>
<?php } } ?>
</div>
<?php get_sidebar();?>
</div>
</div>
</div>
</div>
<!--底部版权-->
<?php get_footer();?>