<?php if ( ! defined( 'ABSPATH' )  ) { die; } // Cannot access directly.

//
// Set a unique slug-like ID
//
$prefix = '_prefix_taxonomy_options';

//
// Create taxonomy options
//
CSF::createTaxonomyOptions( $prefix, array(
  'taxonomy' => 'category',
  'data-type' => 'unserialie',
) );
//
// Create a section
//
CSF::createSection( $prefix, array(
  'fields' => array(
    //
    // A text field
    // 
      array(
      'id'    => '_zero-classification-cbl-kg',
      'type'  => 'switcher',
      'title' => '开启侧边栏',
      'label' => '开启关闭侧边栏',
        'subtitle' => '绿色是开启',
       'default' => true,
    ),
    
    			array(
				'id'    => 'zero-header-classification-banner-imgurl',
				'type'  => 'upload',
				'title' => '头部banner图',

			),
			    array(
        'id'    => 'is_filter',
        'type'  => 'switcher',
        'title' => '禁用本内页高级筛选功能',
        'subtitle' => '绿色是禁用',
        'default' => false,
    ),
    
  )
) );