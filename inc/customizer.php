<?php

/*
* Theme Customizer.
* 
* Manage the customization view adding extra features to the theme.
* 
*/

function customize( $wp_customize ) {

  // Background Image
  $wp_customize->add_setting( 'background_image', array(
    'default'           => 'https://i.imgur.com/OY4hBoi.jpg',
    'sanitize_callback' => 'esc_url_raw'
  ) );
  $wp_customize->add_section( 'background_image_panel', array(
    'title' => __( 'Background Image', 'cornerstore' ),
  ) );
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'background_image', array(
    'label'    => __( 'Background Image', 'cornerstore' ),
    'section'  => 'background_image_panel',
    'settings' => 'background_image',
    'buttons'  => array(
      'select' => __( 'Select Image', 'cornerstore' ),
      'remove' => __( 'Remove Image', 'cornerstore' ),
      'change' => __( 'Change Image', 'cornerstore' )
    )
  ) ) );

}

add_action( 'customize_register', 'customize' );









/* 
* Call the control, if it does not exist 
* it calls the default
*/

function get_theme_background_image() {
  $url = get_theme_mod( 'background_image' );
  if( $url ) {
    return $url;
  } else {
    return 'https://i.imgur.com/OY4hBoi.jpg';
  }
}