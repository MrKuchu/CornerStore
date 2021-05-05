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

  // Light & Dark Colors
  $wp_customize->add_setting( 'light_color', array(
    'default'   => '#008591',
    'transport' => 'refresh'
  ) );
  $wp_customize->add_setting( 'dark_color', array(
    'default'   => '#0F676F',
    'transport' => 'refresh'
  ) );
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
    'label'      => __( 'Light Color', 'cornerstore' ),
    'section'    => 'title_tagline',
    'settings'   => 'light_color',
  ) ) );
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_color', array(
    'label'      => __( 'Dark Color', 'cornerstore' ),
    'section'    => 'title_tagline',
    'settings'   => 'dark_color',
  ) ) );

}

add_action( 'customize_register', 'customize' );









/* 
* Call the control, if it does not exist 
* it set the default
*/

// Background Image
function get_theme_background_image() {
  $url = get_theme_mod( 'background_image' );
  if( $url ) {
    return $url;
  } else {
    return 'https://i.imgur.com/OY4hBoi.jpg';
  }
}

// Light & Dark Colors
function get_theme_light_color() {
  $light_color = get_theme_mod( 'light_color' );
  if( $light_color ) {
    return $light_color;
  } else {
    return '#008591';
  }
}
function get_theme_dark_color() {
  $dark_color = get_theme_mod( 'dark_color' );
  if( $dark_color ) {
    return $dark_color;
  } else {
    return '#0F676F';
  }
}