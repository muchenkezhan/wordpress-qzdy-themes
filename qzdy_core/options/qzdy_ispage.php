<?php // Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Set a unique slug-like ID
  $prefix = 'my_post_optionss0';

  //
  // Create a metabox
  CSF::createMetabox( $prefix, array(
    'title'     => '拓展功能',
    'post_type' => 'page',
    'data_type'  => 'unserialize',
  ) );

  //
  // Create a section
  CSF::createSection( $prefix, array(
    'title'  => 'SEO设置',
    'fields' => array(

      //
      // A text field
            array(
        'id'    => 'qzdy_zdy_ym_key',
        'type'  => 'text',
        'title' => '自定义关键词',
      ),
            array(
        'id'    => 'qzdy_zdy_ym_des',
        'type'  => 'text',
        'title' => '自定义描述',
      ),

    )
  ) );

  //
  // Create a section
//   CSF::createSection( $prefix, array(
//     'title'  => 'Tab Title 2',
//     'fields' => array(

//       // A textarea field
//       array(
//         'id'    => 'opt-textarea',
//         'type'  => 'textarea',
//         'title' => 'Simple Textarea',
//       ),

//     )
//   ) );

}
