<?php

/**
 * Activate.
 * 
 * Here are functions that run only once when the 
 * theme is activated.
 * 
 */

function activate() {

  // Reset post per page option
  update_option( 'posts_per_page', 200 );

  // Create pages if they don't exist
  $about_page = get_posts( array( 
    'name'           => 'about', 
    'post_type'      => 'page',
    'post_status'    => 'publish',
  ) );
  $contact_page = get_posts( array( 
    'name'           => 'contact', 
    'post_type'      => 'page',
    'post_status'    => 'publish',
  ) );
  if ( $about_page === array() ) {
    wp_insert_post( array(
      'post_title'    => __( 'About', 'cornerstore' ),
      'post_status'   => 'publish',
      'post_content'  => 'content',
      'post_type'     => 'page',
      'post_name'     => 'about'
    ) );
  }
  if ( $contact_page === array() ) {
    wp_insert_post( array(
      'post_title'    => __( 'Contact', 'cornerstore' ),
      'post_status'   => 'publish',
      'post_content'  => 'content',
      'post_type'     => 'page',
      'post_name'     => 'contact'
    ) );
  }

  // Products categories
  $products_categories = get_terms( array( 
    'taxonomy'   => 'products-category',
    'hide_empty' => false
  ) );
  if ( $products_categories === array() ) {
    require_once( str_replace( stripslashes( "\\\\" ), "/", dirname( __FILE__, 5 ) ) . '/wp-admin/includes/taxonomy.php' );
    wp_insert_category( array(
      'taxonomy'          => 'products-category',
      'cat_name'          => __( 'Fruits', 'cornerstore' ),
      'category_nicename' => 'fruits'
    ) );
    wp_insert_category( array(
      'taxonomy'          => 'products-category',
      'cat_name'          => __( 'Vegetables', 'cornerstore'),
      'category_nicename' => 'vegetables'
    ) );
    wp_insert_category( array(
      'taxonomy'          => 'products-category',
      'cat_name'          => __( 'Meats', 'cornerstore' ),
      'category_nicename' => 'meats'
    ) );
  }

  // Products
  $products = get_posts( array(
    'numberposts' => 200,
    'post_type' => 'product'
  ) );
  if ( $products === array() ) {
    $default_products = array(
      [ 1 , __( 'Bananas', 'cornerstore' ),      '0.15', '1x2', 'https://i.imgur.com/uSUyltw.jpg', 'fruits' ],
      [ 2 , __( 'Oranges', 'cornerstore' ),      '0.15', '1x1', 'https://i.imgur.com/44jnOP5.jpg', 'fruits' ],
      [ 3 , __( 'Tomatoes', 'cornerstore' ),     '0.15', '1x1', 'https://i.imgur.com/8S978XB.jpg', 'vegetables' ],
      [ 4 , __( 'Lemons', 'cornerstore' ),       '0.10', '1x1', 'https://i.imgur.com/AUPOxtc.jpg', 'fruits' ],
      [ 5 , __( 'Apples', 'cornerstore' ),       '0.25', '1x1', 'https://i.imgur.com/dz14knm.jpg', 'fruits' ],
      [ 6 , __( 'Avocados', 'cornerstore' ),     '0.30', '2x1', 'https://i.imgur.com/9ms1uLx.jpg', 'fruits' ],
      [ 7 , __( 'Beef', 'cornerstore' ),         '5.45', '2x2', 'https://i.imgur.com/tLdcNTO.jpg', 'meats' ],
      [ 8 , __( 'Fish', 'cornerstore' ),         '3.35', '1x2', 'https://i.imgur.com/KFg3KKM.jpg', 'meats' ],
      [ 9 , __( 'Shrimp', 'cornerstore' ),       '4.30', '1x2', 'https://i.imgur.com/c1hOrIl.jpg', 'meats' ],
      [ 10, __( 'Blackberries', 'cornerstore' ), '0.45', '1x1', 'https://i.imgur.com/mOBfjX1.jpg', 'fruits' ],
      [ 11, __( 'Grapes', 'cornerstore' ),       '1.00', '1x1', 'https://i.imgur.com/mMp4rOX.jpg', 'fruits' ],
      [ 12, __( 'Strawberries', 'cornerstore' ), '2.05', '2x2', 'https://i.imgur.com/Hy9eOc8.jpg', 'fruits' ],
      [ 13, __( 'Watermelons', 'cornerstore' ),  '3.00', '1x1', 'https://i.imgur.com/MRDxAyl.jpg', 'fruits' ],
      [ 14, __( 'Papayas', 'cornerstore' ),      '0.80', '1x1', 'https://i.imgur.com/C09vvdG.jpg', 'fruits' ],
      [ 15, __( 'Potato', 'cornerstore' ),       '0.45', '1x1', 'https://i.imgur.com/HltXHSd.jpg', 'vegetables' ],
      [ 16, __( 'Lettuce', 'cornerstore' ),      '0.35', '1x1', 'https://i.imgur.com/Ow1b7IM.jpg', 'vegetables' ],
      [ 17, __( 'Onion', 'cornerstore' ),        '0.20', '1x1', 'https://i.imgur.com/eapeRYy.jpg', 'vegetables' ],
      [ 18, __( 'Green banana', 'cornerstore' ), '0.15', '1x2', 'https://i.imgur.com/EaiM0Rf.jpg', 'fruits' ],
      [ 19, __( 'Carrots', 'cornerstore' ),      '0.15', '1x1', 'https://i.imgur.com/cVUkUWl.jpg', 'vegetables' ],
      [ 20, __( 'Broccoli', 'cornerstore' ),     '0.45', '1x1', 'https://i.imgur.com/lkywfQj.jpg', 'vegetables' ],
      [ 21, __( 'Cucumber', 'cornerstore' ),     '0.25', '1x1', 'https://i.imgur.com/IHxae4t.jpg', 'vegetables' ],
      [ 22, __( 'Bread', 'cornerstore' ),        '0.20', '1x1', 'https://i.imgur.com/bmWv0Ob.jpg' ],
      [ 23, __( 'Rice', 'cornerstore' ),         '0.45', '1x1', 'https://i.imgur.com/PMAGTis.jpg' ],
      [ 24, __( 'Almonds', 'cornerstore' ),      '0.60', '1x1', 'https://i.imgur.com/DWRsMbA.jpg' ],
      [ 25, __( 'Milk', 'cornerstore' ),         '1.25', '1x1', 'https://i.imgur.com/WiYjZPq.jpg' ],
      [ 26, __( 'Eggs', 'cornerstore' ),         '0.20', '2x1', 'https://i.imgur.com/53UNXq6.jpg' ],
      [ 27, __( 'Drinks', 'cornerstore' ),       '0.50', '1x1', 'https://i.imgur.com/aPbw6ms.jpg' ],
      [ 28, __( 'Candies', 'cornerstore' ),      '0.45', '1x1', 'https://i.imgur.com/U4OoJVu.jpg' ],
    );
    foreach( $default_products as $default_product ) {
      wp_insert_post( array(
        'post_type'    => 'product',
        'post_title'   => $default_product[1],
        'post_content' => __( 'Here is the description of your product', 'cornerstore' ),
        'post_status'  => 'publish',
        'menu_order'   => $default_product[0],
        'meta_input'   => array( 
          '_product_price' => $default_product[2],
          '_product_grid_size' => $default_product[3],
          '_product_default_image_url' => $default_product[4],
        ),
        'tax_input' => array(
          'products-category' => array( get_term_by( 'slug', $default_product[5], 'products-category' )->term_id )
        ),
      ) );
    }
  }
}

add_action( 'after_switch_theme', 'activate' );