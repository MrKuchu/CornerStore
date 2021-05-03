<?php

/*
* Setup.
* 
* Setup features that initialize the theme.
* 
*/

function setup() {

  add_theme_support( 'title-tag' );

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
  wp_enqueue_script( 'script', get_template_directory_uri() . '/js/scripts.js', array('jquery'), false, true );

}

add_action( 'wp_enqueue_scripts', 'imports' );









/*
* Includes.
* 
* Request extra features to the theme.
* 
*/

require get_template_directory() . '/inc/customizer.php';