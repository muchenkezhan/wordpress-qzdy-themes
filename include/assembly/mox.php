<?php
function ah_breadcrumb() {
  if ( is_front_page() ) {
    return;
  }
  global $post;
  $custom_taxonomy  = ''; 

  $defaults = array(
    'seperator'   =>  '/',
    'id'          =>  'ah-breadcrumb',
    'classes'     =>  'ah-breadcrumb',
    'home_title'  =>  esc_html__( '首页', '' )
  );

  $sep  = '<span class="seperator">'. esc_html( $defaults['seperator'] ) .'</span>';
  echo '<ul id="'. esc_attr( $defaults['id'] ) .'" class="'. esc_attr( $defaults['classes'] ) .'">';

  // Creating home link
  echo '<span class="item"><a rel="external nofollow" href="'. get_home_url() .'">'. esc_html( $defaults['home_title'] ) .'</a></span>' . $sep;

  if ( is_single() ) {

    // Get posts type
    $post_type = get_post_type();

    // If post type is not post
    if( $post_type != 'post' ) {

      $post_type_object   = get_post_type_object( $post_type );
      $post_type_link     = get_post_type_archive_link( $post_type );

      echo '<span class="item item-cat"><a href="'. $post_type_link .'">'. $post_type_object->labels->name .'</a></span>'. $sep;

    }

    // Get categories
    $category = get_the_category( $post->ID );

    // If category not empty
    if( !empty( $category ) ) {

      // Arrange category parent to child
      $category_values      = array_values( $category );
      $get_last_category    = end( $category_values );
      // $get_last_category    = $category[count($category) - 1];
      $get_parent_category  = rtrim( get_category_parents( $get_last_category->term_id, true, ',' ), ',' );
      $cat_parent           = explode( ',', $get_parent_category );

      // Store category in $display_category
      $display_category = '';
      foreach( $cat_parent as $p ) {
        $display_category .=  '<span class="item item-cat">'. $p .'</span>' . $sep;
      }

    }

    // If it's a custom post type within a custom taxonomy
    $taxonomy_exists = taxonomy_exists( $custom_taxonomy );

    if( empty( $get_last_category ) && !empty( $custom_taxonomy ) && $taxonomy_exists ) {

      $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
      $cat_id         = $taxonomy_terms[0]->term_id;
      $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
      $cat_name       = $taxonomy_terms[0]->name;

    }

    // Check if the post is in a category
    if( !empty( $get_last_category ) ) {

      echo $display_category;
      echo '<span class="item item-current">'.'正文'.'</span>';

    } else if( !empty( $cat_id ) ) {

      echo '<span class="item item-cat"><a href="'. $cat_link .'">'. $cat_name .'</a></span>' . $sep;
      echo '<span class="item-current item">'. get_the_title() .'</span>';

    } else {

      echo '<span class="item-current item">'. get_the_title() .'</span>';

    }

  } else if( is_archive() ) {

    if( is_tax() ) {
      // Get posts type
      $post_type = get_post_type();

      // If post type is not post
      if( $post_type != 'post' ) {

        $post_type_object   = get_post_type_object( $post_type );
        $post_type_link     = get_post_type_archive_link( $post_type );

        echo '<span class="item item-cat item-custom-post-type-' . $post_type . '"><a href="' . $post_type_link . '">' . $post_type_object->labels->name . '</a></span>' . $sep;

      }

      $custom_tax_name = get_queried_object()->name;
      echo '<span class="item item-current">'. $custom_tax_name .'</span>';

    } else if ( is_category() ) {

      $parent = get_queried_object()->category_parent;

      if ( $parent !== 0 ) {

        $parent_category = get_category( $parent );
        $category_link   = get_category_link( $parent );

        echo '<span class="item"><a href="'. esc_url( $category_link ) .'">'. $parent_category->name .'</a></span>' . $sep;

      }

      echo '<span class="item item-current">'. single_cat_title( '', false ) .'</span>';

    } else if ( is_tag() ) {

      // Get tag information
      $term_id        = get_query_var('tag_id');
      $taxonomy       = 'post_tag';
      $args           = 'include=' . $term_id;
      $terms          = get_terms( $taxonomy, $args );
      $get_term_name  = $terms[0]->name;

      // Display the tag name
      echo '<span class="item-current item">'. $get_term_name .'</span>';

    } else if( is_day() ) {

      // Day archive

      // Year link
      echo '<span class="item-year item"><a href="'. get_year_link( get_the_time('Y') ) .'">'. get_the_time('Y') . ' Archives</a></span>' . $sep;

      // Month link
      echo '<span class="item-month item"><a href="'. get_month_link( get_the_time('Y'), get_the_time('m') ) .'">'. get_the_time('M') .' Archives</a></span>' . $sep;

      // Day display
      echo '<span class="item-current item">'. get_the_time('jS') .' '. get_the_time('M'). ' Archives</span>';

    } else if( is_month() ) {

      // Month archive

      // Year link
      echo '<span class="item-year item"><a href="'. get_year_link( get_the_time('Y') ) .'">'. get_the_time('Y') . ' Archives</a></span>' . $sep;

      // Month Display
      echo '<span class="item-month item-current item">'. get_the_time('M') .' Archives</span>';

    } else if ( is_year() ) {

      // Year Display
      echo '<span class="item-year item-current item">'. get_the_time('Y') .' Archives</span>';

    } else if ( is_author() ) {

      // Auhor archive

      // Get the author information
      global $author;
      $userdata = get_userdata( $author );

      // Display author name
      echo '<span class="item-current item">'. 'Author: '. $userdata->display_name . '</span>';

    } else {

      echo '<span class="item item-current">'. post_type_archive_title() .'</span>';

    }

  } else if ( is_page() ) {

    // Standard page
    if( $post->post_parent ) {

      // If child page, get parents
      $anc = get_post_ancestors( $post->ID );

      // Get parents in the right order
      $anc = array_reverse( $anc );

      // Parent page loop
      if ( !isset( $parents ) ) $parents = null;
      foreach ( $anc as $ancestor ) {

        $parents .= '<span class="item-parent item"><a href="'. get_permalink( $ancestor ) .'">'. get_the_title( $ancestor ) .'</a></span>' . $sep;

      }

      // Display parent pages
      echo $parents;

      // Current page
      echo '<span class="item-current item">'. get_the_title() .'</span>';

    } else {

      // Just display current page if not parents
      echo '<span class="item-current item">'. get_the_title() .'</span>';

    }

  } else if ( is_search() ) {

    // Search results page
    echo '<span class="item-current item">搜索结果: '. get_search_query() .'</span>';

  } else if ( is_404() ) {

    // 404 page
    echo '<span class="item-current item">' . 'Error 404' . '</span>';

  }

  // End breadcrumb
  echo '</ul>';

}
