<?php

/*
* Activate.
* 
* Here are functions that run only once when the 
* theme is activated.
* 
*/

function activate() {

  // About page
  $about_page = get_posts( array( 
    'name'           => 'about', 
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

  // Contact page
  $contact_page = get_posts( array( 
    'name'           => 'contact', 
    'post_type'      => 'page',
    'post_status'    => 'publish',
  ) );
  if ( $contact_page === array() ) {
    wp_insert_post( array(
      'post_title'    => __( 'Contact', 'cornerstore' ),
      'post_status'   => 'publish',
      'post_content'  => 'content',
      'post_type'     => 'page',
      'post_name'     => 'contact'
    ) );
  }

}

add_action( 'after_switch_theme', 'activate' );