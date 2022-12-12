<?php get_header();?>
<div class="layui-content<?php echo qzdy_prevent_theme(); ?>">
<div class="layui-container<?php echo qzdy_prevent_theme(); ?>">
<div class="layui-row flex layui-col-space15 <?php qzdy_sidebar_fangxiang();?> main<?php qzdy_prevent_theme(); ?>">
<div class="layui-col-md9 layui-col-lg9">
<?php if(!empty(_qzdy('ggw-1')) && _qzdy('ggw-1-switcher')){?>
<div class="qzdy_index__hot">
<?php
foreach (_qzdy('ggw-1') as $key10){?>
<?php if(!$key10['ggw-1-0']){
 echo $key10['ggw-1-1'];
 }?>


<?php if($key10['ggw-1-0']){?>
<div class="layui-row">
    <div class="layui-col-md6">
      <?php echo $key10['ggw-1-1'];?>
    </div>
    <div class="layui-col-md6">
    <?php echo $key10['ggw-1-2'];?>
    </div>
</div>
<?php }?>


<?php } ?>
</div>
<?php }?>

       <?php require get_template_directory() . '/home-yao.php'; ?>
<!--置顶文章-->
<?php if(is_home()&&!is_paged()&&is_sticky()){ ?>
<?php
$args = array(
'posts_per_page' => -1,
'post__in'  => get_option( 'sticky_posts' ));
$sticky_posts = new WP_Query( $args );
while ( $sticky_posts->have_posts() ) : $sticky_posts->the_post();?>
                 <div class="title-article list-card excerpt-sticky item-box<?php echo qzdy_prevent_theme(); ?>">
                <div class="index-post-img-small"><a href="<?php the_permalink() ?>">
            <?php if(_qzdy('rp-page-tesetu-sw')=='tesetu1'){?>
<div title="<?php the_title(); ?>" class="item-thumb-small lazy commodity-img" data-original="<?php echo post_thumbnail_srcs(); ?>" style="background-image: url(data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7)"><span class="layui-badge layui-bg-cyan x"><?php the_time('Y/n/j'); ?></span>
           <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="20" height="20"><path d="M903.93 107.306H115.787c-51.213 0-93.204 42.505-93.204 93.72V825.29c0 51.724 41.99 93.717 93.717 93.717h788.144c51.72 0 93.717-41.993 93.717-93.717V201.025c-.512-51.214-43.017-93.719-94.23-93.719zm-788.144 64.527h788.657c16.385 0 29.704 13.316 29.704 29.704v390.229L760.54 402.285c-12.805-13.828-30.217-21.508-48.14-19.971-17.924 1.02-34.821 10.754-46.602 26.114l-172.582 239.16-87.06-85.52c-12.29-11.783-27.654-17.924-44.039-17.924-16.39.508-31.755 7.676-43.53 20.48L86.595 821.705V202.05c-1.025-17.416 12.804-30.73 29.191-30.217zm788.145 683.674H141.906l222.255-245.82 87.06 86.037c12.8 12.807 30.212 18.95 47.115 17.417 17.41-1.538 33.797-11.266 45.063-26.118l172.584-238.647 216.111 236.088 2.051-1.54V825.8c.509 16.39-13.315 29.706-30.214 29.706zm0 0"></path><path d="M318.072 509.827c79.89 0 144.417-65.037 144.417-144.416 0-79.378-64.527-144.925-144.417-144.925-79.891 0-144.416 64.527-144.416 144.412 0 79.892 64.525 144.93 144.416 144.93zm0-225.327c44.553 0 80.912 36.362 80.912 80.91 0 44.557-35.847 81.43-80.912 81.43-45.068 0-80.916-36.36-80.916-80.915 0-44.556 36.872-81.425 80.916-81.425zm0 0"></path></svg>
            </div>
<?php }else{?>
<div title="<?php the_title(); ?>" class="item-thumb-small lazy commodity-img" data-original="<?php echo post_thumbnail_srcs_php(); ?>" style="background-image: url(data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7)"><span class="layui-badge layui-bg-cyan x"><?php the_time('Y/n/j'); ?></span>
           <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="20" height="20"><path d="M903.93 107.306H115.787c-51.213 0-93.204 42.505-93.204 93.72V825.29c0 51.724 41.99 93.717 93.717 93.717h788.144c51.72 0 93.717-41.993 93.717-93.717V201.025c-.512-51.214-43.017-93.719-94.23-93.719zm-788.144 64.527h788.657c16.385 0 29.704 13.316 29.704 29.704v390.229L760.54 402.285c-12.805-13.828-30.217-21.508-48.14-19.971-17.924 1.02-34.821 10.754-46.602 26.114l-172.582 239.16-87.06-85.52c-12.29-11.783-27.654-17.924-44.039-17.924-16.39.508-31.755 7.676-43.53 20.48L86.595 821.705V202.05c-1.025-17.416 12.804-30.73 29.191-30.217zm788.145 683.674H141.906l222.255-245.82 87.06 86.037c12.8 12.807 30.212 18.95 47.115 17.417 17.41-1.538 33.797-11.266 45.063-26.118l172.584-238.647 216.111 236.088 2.051-1.54V825.8c.509 16.39-13.315 29.706-30.214 29.706zm0 0"></path><path d="M318.072 509.827c79.89 0 144.417-65.037 144.417-144.416 0-79.378-64.527-144.925-144.417-144.925-79.891 0-144.416 64.527-144.416 144.412 0 79.892 64.525 144.93 144.416 144.93zm0-225.327c44.553 0 80.912 36.362 80.912 80.91 0 44.557-35.847 81.43-80.912 81.43-45.068 0-80.916-36.36-80.916-80.915 0-44.556 36.872-81.425 80.916-81.425zm0 0"></path></svg>
            </div>
<?php }?>
            </a></div>
    <div class="index-post-text-small<?php echo qzdy_prevent_theme(); ?>"><h2 title="<?php the_title(); ?>" class="qzdy-title m-t-none text-ellipsis index-post-title text-title"><?php if (is_sticky()) {echo  '<span class="layui-badge">推荐</span>';} ?><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
    <p class="summary l-h-2x text-muted<?php echo qzdy_prevent_theme(); ?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 200,'…'); ?></p>
    <div class="line line-lg b-b b-light"></div>
    <div class="text-muted post-item-foot-icon text-ellipsis list-inline">
    <li class="viewfloat">
                            <?php
                    $categories = get_the_category(); ?>
                  
                    <?php foreach ( $categories as $key=>$category ) :
                      if ($key == 3) {break;}
                    ?><i class="layui-icon layui-icon-slider"></i>
                      <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a>
                    <?php endforeach; ?>
    </li>
<li><i class="layui-icon layui-icon-log<?php echo qzdy_prevent_theme(); ?>"></i><?php the_time('Y/n/j'); ?></li><li><a href=""><i class="fa fa-user-o" aria-hidden="true"></i><?php the_author_meta('nickname'); ?></a></li><li><span class="view"><i class="fa fa-eye" aria-hidden="true"></i><?php post_views('',''); ?></span></li></div></div></div>
<?php endwhile; wp_reset_query();?>
 <?php }?>
<!--置顶文章-->
       <div class="paging-aa" id="paging-aa">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<?php if(!is_sticky()){ ?>
                 <div class="title-article list-card excerpt-sticky item-box<?php echo qzdy_prevent_theme(); ?>">
                <div class="index-post-img-small"><a href="<?php the_permalink() ?>">
            <?php if(_qzdy('rp-page-tesetu-sw')=='tesetu1'){?>
<div title="<?php the_title(); ?>" class="item-thumb-small lazy commodity-img" data-original="<?php echo post_thumbnail_srcs(); ?>" style="background-image: url(data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7)"><span class="layui-badge layui-bg-cyan x"><?php the_time('Y/n/j'); ?></span>
           <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="20" height="20"><path d="M903.93 107.306H115.787c-51.213 0-93.204 42.505-93.204 93.72V825.29c0 51.724 41.99 93.717 93.717 93.717h788.144c51.72 0 93.717-41.993 93.717-93.717V201.025c-.512-51.214-43.017-93.719-94.23-93.719zm-788.144 64.527h788.657c16.385 0 29.704 13.316 29.704 29.704v390.229L760.54 402.285c-12.805-13.828-30.217-21.508-48.14-19.971-17.924 1.02-34.821 10.754-46.602 26.114l-172.582 239.16-87.06-85.52c-12.29-11.783-27.654-17.924-44.039-17.924-16.39.508-31.755 7.676-43.53 20.48L86.595 821.705V202.05c-1.025-17.416 12.804-30.73 29.191-30.217zm788.145 683.674H141.906l222.255-245.82 87.06 86.037c12.8 12.807 30.212 18.95 47.115 17.417 17.41-1.538 33.797-11.266 45.063-26.118l172.584-238.647 216.111 236.088 2.051-1.54V825.8c.509 16.39-13.315 29.706-30.214 29.706zm0 0"></path><path d="M318.072 509.827c79.89 0 144.417-65.037 144.417-144.416 0-79.378-64.527-144.925-144.417-144.925-79.891 0-144.416 64.527-144.416 144.412 0 79.892 64.525 144.93 144.416 144.93zm0-225.327c44.553 0 80.912 36.362 80.912 80.91 0 44.557-35.847 81.43-80.912 81.43-45.068 0-80.916-36.36-80.916-80.915 0-44.556 36.872-81.425 80.916-81.425zm0 0"></path></svg>
            </div>
<?php }else{?>
<div title="<?php the_title(); ?>" class="item-thumb-small lazy commodity-img" data-original="<?php echo post_thumbnail_srcs_php(); ?>" style="background-image: url(data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7)"><span class="layui-badge layui-bg-cyan x"><?php the_time('Y/n/j'); ?></span>
           <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="20" height="20"><path d="M903.93 107.306H115.787c-51.213 0-93.204 42.505-93.204 93.72V825.29c0 51.724 41.99 93.717 93.717 93.717h788.144c51.72 0 93.717-41.993 93.717-93.717V201.025c-.512-51.214-43.017-93.719-94.23-93.719zm-788.144 64.527h788.657c16.385 0 29.704 13.316 29.704 29.704v390.229L760.54 402.285c-12.805-13.828-30.217-21.508-48.14-19.971-17.924 1.02-34.821 10.754-46.602 26.114l-172.582 239.16-87.06-85.52c-12.29-11.783-27.654-17.924-44.039-17.924-16.39.508-31.755 7.676-43.53 20.48L86.595 821.705V202.05c-1.025-17.416 12.804-30.73 29.191-30.217zm788.145 683.674H141.906l222.255-245.82 87.06 86.037c12.8 12.807 30.212 18.95 47.115 17.417 17.41-1.538 33.797-11.266 45.063-26.118l172.584-238.647 216.111 236.088 2.051-1.54V825.8c.509 16.39-13.315 29.706-30.214 29.706zm0 0"></path><path d="M318.072 509.827c79.89 0 144.417-65.037 144.417-144.416 0-79.378-64.527-144.925-144.417-144.925-79.891 0-144.416 64.527-144.416 144.412 0 79.892 64.525 144.93 144.416 144.93zm0-225.327c44.553 0 80.912 36.362 80.912 80.91 0 44.557-35.847 81.43-80.912 81.43-45.068 0-80.916-36.36-80.916-80.915 0-44.556 36.872-81.425 80.916-81.425zm0 0"></path></svg>
            </div>
<?php }?>
            </a></div>
    <div class="index-post-text-small<?php echo qzdy_prevent_theme(); ?>"><h2  title="<?php the_title(); ?>" class="qzdy-title m-t-none text-ellipsis index-post-title text-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
    <p class="summary l-h-2x text-muted<?php echo qzdy_prevent_theme(); ?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 200,'…'); ?></p>
    <div class="line line-lg b-b b-light"></div>
    <div class="text-muted post-item-foot-icon text-ellipsis list-inline">
    <li class="viewfloat">
                            <?php
                    $categories = get_the_category(); ?>
                  
                    <?php foreach ( $categories as $key=>$category ) :
                      if ($key == 3) {break;}
                    ?><i class="layui-icon layui-icon-slider"></i>
                      <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a>
                    <?php endforeach; ?>
    </li>
<li><i class="layui-icon layui-icon-log<?php echo qzdy_prevent_theme(); ?>"></i><?php the_time('Y/n/j'); ?></li><li><a href=""><i class="fa fa-user-o" aria-hidden="true"></i><?php the_author_meta('nickname'); ?></a></li><li><span class="view"><i class="fa fa-eye" aria-hidden="true"></i><?php post_views('',''); ?></span></li></div></div></div>
<?php }?>
<?php endwhile;?>
<?php endif; ?></div>
    <!--分页-->
			<?php if(_qzdy('rp-fanye-mode')==1){?>
			<div class="pagination" id="pagenavi">
              <p><?php lingfeng_pagenavi();?></p>
</div>
<?php }else{?>
<div class="next-page">
<?php
$next_page = get_next_posts_link('加载更多');
if($next_page) echo $next_page;
?>
</div>
<?php }?>
            <!--分页-->
        </div>
<?php get_sidebar();?>
</div>
</div>
</div>
</div>
<!--底部版权-->
<?php get_footer();?>