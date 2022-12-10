<?php if ( ! defined( 'ABSPATH' )  ) { die; } // Cannot access directly.

//
// Metabox of the PAGE
// Set a unique slug-like ID
// Q-Q交-流群：9173673-58
// 作者博客：https://www.aj0.cn/
$prefix_post_opts = '_prefix_post_options';

//
// Create a metabox
//
CSF::createMetabox( $prefix_post_opts, array(
  'title'        => 'Qzdy theme属性',
  'post_type'    => 'post',
  'data_type' => 'unserialize',
  'show_restore' => true,
) );

//
// Create a section
//
CSF::createSection( $prefix_post_opts, array(
  'fields' => array(

    //
    // A text field
    //
        array(
      'id'    => 'rp-imgzz',
      'type'  => 'text',
      'title' => '摄影作者',
       'subtitle' => '分类模板必须是图文分类，不懂请留空',
    ),
        array(
      'id'    => 'rp-wzzz',
      'type'  => 'text',
      'title' => '短文作者',
       'subtitle' => '分类模板必须是图文分类，不懂请留空',
    ),
          array(
      'id'    => '_zero-wz-autoMenu-ml-kg',
      'type'  => 'switcher',
      'title' => '开启标题目录',
      'label' => '就网页左下角的一个悬浮框（不清楚的别开启了）',
        'subtitle' => '您必须选择编辑器的内容标题或者h2标签',
       'default' => false,
    ),
    array(
      'id'    => 'opt-textseoms',
      'type'  => 'text',
      'title' => '自定义描述，留空就截取"内容"前500字符作为描述',
    ),

    array(
      'id'    => 'opt-textseogjc',
      'type'  => 'text',
      'title' => '自定义关键词，留空就用"标签"作为关键词',
    ),
    array(
      'id'    => 'opt-wz-textbanquan',
      'type'  => 'text',
      'title' => '自定义版权',
      'subtitle' => '留空默认：非特殊说明，本博所有文章均为博主原创。',
    ),
  )
) );
