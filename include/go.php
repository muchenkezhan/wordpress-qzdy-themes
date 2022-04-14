<meta property="og:type" content="article" />
<meta property="og:locale" content="zh-CN" />
<meta property="og:site_name" content="<?php bloginfo('name'); ?>">
<meta property="og:title" content="<?php the_title(); ?>" />
<meta property="og:author" content="<?php echo _qzdy('zero-footer-txxnc');?>" />
<meta property="og:image" content="<?php post_thumbnail_srcs();?>" />
<meta property="og:url" content="<?php echo get_permalink(); ?>">
<meta property="og:category" content="<?php foreach((get_the_category()) as $category){echo $category->cat_name;} ?>">
<meta property="og:tag" content="<?php og_tag();?>">
<meta property="og:description" content="<?php og_description();?>" />
<meta property="og:release_date" content="<?php the_time('Y年n月j日'); ?>" />