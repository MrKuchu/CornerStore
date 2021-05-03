<?php

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
  wp_enqueue_script( 'script', get_template_directory_uri() . '/js/scripts.js', array('jquery'), false, true );

}
add_action( 'wp_enqueue_scripts', 'imports' );