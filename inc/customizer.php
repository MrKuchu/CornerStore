<?php

/*
* Theme Customizer.
* 
* Manage the customization view adding extra features to the theme.
* 
*/

function customize( $wp_customize ) {

  // Store Info
  $wp_customize->add_section( 'store_info_panel', array(
    'title'      => __( 'Store Info', 'cornerstore' ),
    'capability' => 'edit_theme_options',
    'priority'   => 10
  ) );

    // Phone number
    $wp_customize->add_setting( 'store_phone_number', array(
      'default'           => '+593 98 765 4321' ,
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    ) );
    $wp_customize->add_control( 'store_phone_number', array(
      'label'    => __( 'Phone Number', 'cornerstore' ),
      'section'  => 'store_info_panel',
      'priority' => 1
    ) );
    // Email
    $wp_customize->add_setting( 'store_email', array(
      'default'           => 'your@email.com',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    ) );
    $wp_customize->add_control( 'store_email', array(
      'label'    => __( 'Email', 'cornerstore' ),
      'section'  => 'store_info_panel',
      'priority' => 2
    ) );
    // Address
    $wp_customize->add_setting( 'store_address', array(
      'default'           => '123 Example St, City, Country',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    ) );
    $wp_customize->add_control( 'store_address', array(
      'label'    => __( 'Address', 'cornerstore' ),
      'section'  => 'store_info_panel',
      'priority' => 3
    ) );
    // Location
    $wp_customize->add_setting( 'store_location', array(
      'default'           => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    ) );
    $wp_customize->add_control( 'store_location', array(
      'label'    => __( 'Google Map URL', 'cornerstore' ),
      'section'  => 'store_info_panel',
      'priority' => 4
    ) );

  // Site Identity
    // Light Color
    $wp_customize->add_setting( 'light_color', array(
      'default'   => '#008591',
      'transport' => 'refresh'
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
      'label'    => __( 'Light Color', 'cornerstore' ),
      'section'  => 'title_tagline',
      'settings' => 'light_color',
    ) ) );
    // Dark Color
    $wp_customize->add_setting( 'dark_color', array(
      'default'   => '#0F676F',
      'transport' => 'refresh'
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_color', array(
      'label'    => __( 'Dark Color', 'cornerstore' ),
      'section'  => 'title_tagline',
      'settings' => 'dark_color',
    ) ) );
    
  // Hero Section
  $wp_customize->add_section( 'hero_panel', array(
    'title'    => __( 'Hero Section', 'cornerstore' ),
    'priority' => 50
  ) );
    // Primary text
    $wp_customize->add_setting( 'hero_primary_text', array(
      'default'           => __( 'Your trusted store', 'cornerstore' ),
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    ) );
    $wp_customize->add_control( 'hero_primary_text', array(
      'label'    => __( 'Hero primary text', 'cornerstore' ),
      'section'  => 'hero_panel',
      'priority' => 1
    ) );
    // Secondary text
    $wp_customize->add_setting( 'hero_secondary_text', array(
      'default'           => __( 'Find here what you need for your home, feel free to visit us whenever you like, we’ll be happy to help you. You can also visit us at our shop, we are waiting for you.', 'cornerstore' ),
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    ) );
    $wp_customize->add_control( 'hero_secondary_text', array(
      'label'    => __( 'Hero secondary text', 'cornerstore' ),
      'section'  => 'hero_panel',
      'priority' => 2,
      'type'     => 'textarea'
    ) );
    // Store Button
    $wp_customize->add_setting( 'hero_store_button', array(
      'default'           => 1,
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'checkbox_sanitization'
    ) );
    $wp_customize->add_control( 'hero_store_button', array(
      'label'    => __( 'Store button', 'cornerstore' ),
      'section'  => 'hero_panel',
      'priority' => 3,
      'type'     => 'checkbox',
      'settings' => 'hero_store_button',
    ) );
    // Chat Button
    $wp_customize->add_setting( 'hero_chat_button', array(
      'default'           => 1,
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'checkbox_sanitization'
    ) );
    $wp_customize->add_control( 'hero_chat_button', array(
      'label'    => __( 'Chat button', 'cornerstore' ),
      'section'  => 'hero_panel',
      'priority' => 4,
      'type'     => 'checkbox',
      'settings' => 'hero_chat_button',
    ) );
    // Location Button
    $wp_customize->add_setting( 'hero_location_button', array(
      'default'           => 1,
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'checkbox_sanitization'
    ) );
    $wp_customize->add_control( 'hero_location_button', array(
      'label'    => __( 'Visit us button', 'cornerstore' ),
      'section'  => 'hero_panel',
      'priority' => 5,
      'type'     => 'checkbox',
      'settings' => 'hero_location_button',
    ) );
    // Background Image
    $wp_customize->add_setting( 'background_image', array(
      'default'           => 'https://i.imgur.com/OY4hBoi.jpg',
      'sanitize_callback' => 'esc_url_raw'
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'background_image', array(
      'label'    => __( 'Background Image', 'cornerstore' ),
      'section'  => 'hero_panel',
      'settings' => 'background_image',
      'buttons'  => array(
        'select' => __( 'Select Image', 'cornerstore' ),
        'remove' => __( 'Remove Image', 'cornerstore' ),
        'change' => __( 'Change Image', 'cornerstore' )
      )
    ) ) );
  
  // Remove Homepage Settings
  $wp_customize->remove_section('static_front_page');

}

add_action( 'customize_register', 'customize' );









/* 
* Call the control, if it does not exist 
* it set the default
*/

// Phone number
function get_store_phone_number() {
  $phone = get_theme_mod( 'store_phone_number' );
  if( $phone ) {
    return $phone;
  } else {
    return '+593 98 765 4321';
  }
}

// Email
function get_store_email() {
  $email = get_theme_mod( 'store_email' );
  if( $email ) {
    return $email;
  } else {
    return 'your@email.com';
  }
}

// Address
function get_store_address() {
  $address = get_theme_mod( 'store_address' );
  if( $address ) {
    return $address;
  } else {
    return __( '123 Example St, City, Country' );
  }
}

// Location
function get_store_location() {
  $url = get_theme_mod( 'store_location' );
  if( $url ) {
    return $url;
  } else {
    return 'https://goo.gl/maps/uXQogmZRupywRk1A6';
  }
}

// Light Color
function get_theme_light_color() {
  $light_color = get_theme_mod( 'light_color' );
  if( $light_color ) {
    return $light_color;
  } else {
    return '#008591';
  }
}

// Dark Colors
function get_theme_dark_color() {
  $dark_color = get_theme_mod( 'dark_color' );
  if( $dark_color ) {
    return $dark_color;
  } else {
    return '#0F676F';
  }
}

// Hero: Primary text
function get_hero_primary_text() {
  $hero_primary_text = get_theme_mod( 'hero_primary_text' );
  if( $hero_primary_text ) {
    return $hero_primary_text;
  } else {
    return __( 'Your trusted store', 'cornerstore' );
  }
}

// Hero: Secondary text
function get_hero_secondary_text() {
  $hero_secondary_text = get_theme_mod( 'hero_secondary_text' );
  if( $hero_secondary_text ) {
    return $hero_secondary_text;
  } else {
    return __( 'Find here what you need for your home, feel free to visit us whenever you like, we’ll be happy to help you. You can also visit us at our shop, we are waiting for you.', 'cornerstore' );
  }
}

// Hero: Store button
function get_hero_store_button() {
  $hero_store_button = get_theme_mod( 'hero_store_button' );
  if( $hero_store_button === false ) {
    return 1;
  } else {
    return $hero_store_button;
  }
}

// Hero: Call button
function get_hero_chat_button() {
  $hero_chat_button = get_theme_mod( 'hero_chat_button' );
  if( $hero_chat_button === false ) {
    return 1;
  } else {
    return $hero_chat_button;
  }
}

// Hero: Visit button
function get_hero_location_button() {
  $hero_location_button = get_theme_mod( 'hero_location_button' );
  if( $hero_location_button === false ) {
    return 1;
  } else {
    return $hero_location_button;
  }
}

// Background Image
function get_theme_background_image() {
  $url = get_theme_mod( 'background_image' );
  if( $url ) {
    return $url;
  } else {
    return 'https://i.imgur.com/OY4hBoi.jpg';
  }
}









/* 
* Sanitizations
*/

function checkbox_sanitization( $input ) {
  if ( true === $input ) {
    return 1;
  } else {
    return 0;
  }
}