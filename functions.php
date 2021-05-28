<?php

/*
* Setup.
* 
* Setup features that initialize the theme.
* 
*/

function setup() {

  // Theme supports
  add_theme_support( 'title-tag' );

  // Register menus
  register_nav_menus( array(
    'primary-menu'      => __( 'Primary Menu', 'cornerstore' ),
    'social-media-menu' => __( 'Social Media Menu', 'cornerstore' ),
    'footer-menu'       => __( 'Footer', 'cornerstore' )
  ) );

  // Image sizes
  add_image_size('product-1x1', 320, 200, true);
  add_image_size('product-1x2', 320, 422, true);
  add_image_size('product-2x1', 660, 200, true); 
  add_image_size('product-2x2', 660, 422, true); 

} 

add_action( 'after_setup_theme', 'setup' );









/*
* Imports.
* 
* Styles and Scripts imports.
* 
*/

function imports() {

  // Styles imports
  wp_enqueue_style( 'style', get_stylesheet_uri() );

  // Scripts imports
  wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), false, true );

}

add_action( 'wp_enqueue_scripts', 'imports' );









/*
* Includes.
* 
* Request extra features to the theme.
* 
*/

require get_template_directory() . '/inc/activate.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/cornerstore.php';
require get_template_directory() . '/inc/product.php';