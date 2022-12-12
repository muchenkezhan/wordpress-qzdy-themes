<?php 
/* template name: 页面模板--友情链接自助申请
*/
?>
<?php
if( isset($_POST['blink_form']) && $_POST['blink_form'] == 'send'){
global $wpdb;

// 表单变量初始化
$link_name = isset( $_POST['blink_name'] ) ? trim(htmlspecialchars($_POST['blink_name'], ENT_QUOTES)) : '';
$link_url = isset( $_POST['blink_url'] ) ? trim(htmlspecialchars($_POST['blink_url'], ENT_QUOTES)) : '';
/*$link_description = isset( $_POST['blink_lianxi'] ) ? trim(htmlspecialchars($_POST['blink_lianxi'], ENT_QUOTES)) : ''; // 联系方式*/
$link_image = $_POST['blink_image']; 
$link_description=$_POST['blink_jianjie'];
$link_target = "_blank"; // 表示链接默认不可见
$link_visible = "N"; // 表示链接默认不可见
// 表单项数据验证
if ( empty($link_name) || mb_strlen($link_name) > 20 ){
wp_die('连接名称必须填写，且长度不得超过30字');
}
if ( empty($link_url) || strlen($link_url) > 60 || !preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $link_url))
//验证url
{
wp_die('链接地址必须填写');
}

$sql_link = $wpdb->insert(
$wpdb->links,
array(
'link_name' => '【待审核】--- '.$link_name,
'link_url' => $link_url,
'link_target' => $link_target,
'link_image' => $link_image,
'link_description'=>$link_description,
'link_visible' => $link_visible
)
);

$result = $wpdb->get_results($sql_link);
Links_email_reminder();
// wp_die('亲，友情链接提交成功，【等待站长审核中】！<a href='.$_SERVER["HTTP_REFERER"].'>点此返回</a>', '提交成功');
?>
<script> alert("友情链接提交成功，【等待站长审核中】！");</script>
   <?php
}
get_header();
?>
 <!--上面是头部-->
<div class="layui-content">
<div class="layui-container">
<div class="layui-row flex <?php qzdy_sidebar_fangxiang(); ?> layui-col-space15 main <?php qzdy_sidebar_fangxiang();?>">
    <div class="layui-col-md9 layui-col-lg9">
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
<div class="content content-link-application">
<div class="form-header">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php if(function_exists('cmp_breadcrumbs')) cmp_breadcrumbs();?>
<?php the_content(); ?>

<!--表单开始-->
<form method="post" class="layui-form" action="<?php echo $_SERVER["REQUEST_URI"]; ?>" style="margin-bottom:20px; ">
<label class="layui-form-label" for="blink_name"><font color="red">*</font>链接名称：</label>
  <div class="layui-input-block">
<input type="text" size="40" value="" required="required" id="blink_name" placeholder="请输入链接名称" name="blink_name"  class="layui-input" />
</div>
 
<div class="form-group">
<label class="layui-form-label" for="blink_url"><font color="red">*</font>链接地址:</label>
 <div class="layui-input-block">
<input type="text" size="40" value="" required="required" class="layui-input" id="blink_url" placeholder="请输入链接，带http://或https://哦！" name="blink_url" />
</div></div>
 
<div class="form-group">
<label class="layui-form-label" for="blink_jianjie">站点简介:</label>
 <div class="layui-input-block">
<input type="text" size="40" value="" class="layui-input" id="blink_jianjie" placeholder="请输入简介" name="blink_jianjie" />
</div></div>
 
<div class="form-group">
<label class="layui-form-label"  required="required" for="blink_image"><font color="red">*</font>站点图标:</label>
 <div class="layui-input-block">
<input type="text" size="40" value="" class="layui-input" id="blink_image" placeholder="请输入图片地址" name="blink_image" />
</div></div>
 
<div class="yqsq-cz-tj">
<input type="hidden" value="send" name="blink_form" />
<button type="submit" class="layui-btn layui-btn-normal">提交申请</button>&nbsp;&nbsp;&nbsp;&nbsp;
<button type="reset" class="layui-btn layui-btn-primary">重填</button>
（提示：带有<font color="red">*</font>，表示必填项~）
</div>
</form>
<!--表单结束-->
<?php endwhile; else: ?>
<?php endif; ?>
</div>
</div>
            </div>
            <!--底部完毕-->
           <div class="the-end">- THE END -</div>
            <!--修改日期-->
            <div class="time-text">
            <i class="layui-icon iconfont iconshijian"></i> 最后修改：<?php the_modified_time('Y年n月j日');  ?></div>
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