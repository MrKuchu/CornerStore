<?php

/*
 * Theme Customizer.
 * 
 * Manage the customization view adding extra features to the theme.
 */

function customize( $wp_customize ) {



  // Custom controls
  class Separator_Control extends WP_Customize_Control {
    public function render_content() {
      ?>
      <label>
        <br>
        <hr>
        <br>
      </label>
      <?php
    }
  }



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
    'priority' => 20
  ) );
  
    // Primary text
    $wp_customize->add_setting( 'hero_primary_text', array(
      'default'           => __( 'Your trusted store', 'cornerstore' ),
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    ) );
    $wp_customize->add_control( 'hero_primary_text', array(
      'label'    => __( 'Primary text', 'cornerstore' ),
      'section'  => 'hero_panel',
      'priority' => 1
    ) );

    // Secondary text
    $wp_customize->add_setting( 'hero_secondary_text', array(
      'default'           => __( 'Find here what you need for your home, feel free to visit us whenever you like, we’ll be happy to help you. You can also visit us at our shop, we are waiting for you.', 'cornerstore' ),
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    ) );
    $wp_customize->add_control( 'hero_secondary_text', array(
      'label'    => __( 'Secondary text', 'cornerstore' ),
      'section'  => 'hero_panel',
      'priority' => 2,
      'type'     => 'textarea'
    ) );

    // Separator
    $wp_customize->add_setting( 'separator_hero_buttons', array() );
    $wp_customize->add_control( new Separator_Control( $wp_customize, 'separator_hero_buttons', array(
      'section' => 'hero_panel',
      'priority' => 3,
    ) ) );

    // Store Button
    $wp_customize->add_setting( 'hero_store_button', array(
      'default'           => 1,
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'checkbox_sanitization'
    ) );
    $wp_customize->add_control( 'hero_store_button', array(
      'label'    => __( 'Store button', 'cornerstore' ),
      'section'  => 'hero_panel',
      'priority' => 4,
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
      'priority' => 5,
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
      'priority' => 6,
      'type'     => 'checkbox',
      'settings' => 'hero_location_button',
    ) );

    // Separator
    $wp_customize->add_setting( 'separator_hero_background', array() );
    $wp_customize->add_control( new Separator_Control( $wp_customize, 'separator_hero_background', array(
      'section' => 'hero_panel',
      'priority' => 7,
    ) ) );

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
  


  // Contact Section
  $wp_customize->add_section( 'contact_panel', array(
    'title'      => __( 'Contact Section', 'cornerstore' ),
    'capability' => 'edit_theme_options',
    'priority'   => 30
  ) );

    // Phone number
    $wp_customize->add_setting( 'store_phone_number', array(
      'default'           => '+593 98 765 4321' ,
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    ) );
    $wp_customize->add_control( 'store_phone_number', array(
      'label'    => __( 'Phone Number', 'cornerstore' ),
      'section'  => 'contact_panel',
      'priority' => 1
    ) );

    // Email
    $wp_customize->add_setting( 'store_email', array(
      'default'           => 'your@email.com',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    ) );
    $wp_customize->add_control( 'store_email', array(
      'label'    => __( 'Email', 'cornerstore' ),
      'section'  => 'contact_panel',
      'priority' => 2
    ) );

    // Separator
    $wp_customize->add_setting( 'separator_contact_location', array() );
    $wp_customize->add_control( new Separator_Control( $wp_customize, 'separator_contact_location', array(
      'section' => 'contact_panel',
      'priority' => 3,
    ) ) );

    // Address
    $wp_customize->add_setting( 'store_address', array(
      'default'           => '123 Example St, City, Country',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    ) );
    $wp_customize->add_control( 'store_address', array(
      'label'    => __( 'Address', 'cornerstore' ),
      'section'  => 'contact_panel',
      'priority' => 4
    ) );

    // Location
    $wp_customize->add_setting( 'store_location', array(
      'default'           => '',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    ) );
    $wp_customize->add_control( 'store_location', array(
      'label'    => __( 'Google Map URL', 'cornerstore' ),
      'section'  => 'contact_panel',
      'priority' => 5
    ) );

    // Separator
    $wp_customize->add_setting( 'separator_contact_social_media', array() );
    $wp_customize->add_control( new Separator_Control( $wp_customize, 'separator_contact_social_media', array(
      'section' => 'contact_panel',
      'priority' => 6,
    ) ) );

    // Social Media: Facebook
    $wp_customize->add_setting( 'store_facebook', array(
      'default'           => 'CornerStore',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    ) );
    $wp_customize->add_control( 'store_facebook', array(
      'label'    => 'Facebook',
      'section'  => 'contact_panel',
      'priority' => 7
    ) );

    // Social Media: Instagram
    $wp_customize->add_setting( 'store_instagram', array(
      'default'           => '@CornerStore',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    ) );
    $wp_customize->add_control( 'store_instagram', array(
      'label'    => 'Instagram',
      'section'  => 'contact_panel',
      'priority' => 8
    ) );

    // Separator
    $wp_customize->add_setting( 'separator_contact_social_media', array() );
    $wp_customize->add_control( new Separator_Control( $wp_customize, 'separator_contact_social_media', array(
      'section' => 'contact_panel',
      'priority' => 10,
    ) ) );

    // Gallery Image 1
    $wp_customize->add_setting( 'gallery_image_1', array(
      'default'           => 'https://i.imgur.com/KoJZ9OK.jpg',
      'sanitize_callback' => 'esc_url_raw'
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'gallery_image_1', array(
      'label'    => __( 'Gallery Image 1', 'cornerstore' ),
      'section'  => 'contact_panel',
      'settings' => 'gallery_image_1',
      'buttons'  => array(
        'select' => __( 'Select Image', 'cornerstore' ),
        'remove' => __( 'Remove Image', 'cornerstore' ),
        'change' => __( 'Change Image', 'cornerstore' )
      )
    ) ) );

    // Gallery Image 2
    $wp_customize->add_setting( 'gallery_image_2', array(
      'default'           => 'https://i.imgur.com/QwSs3f5.jpg',
      'sanitize_callback' => 'esc_url_raw'
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'gallery_image_2', array(
      'label'    => __( 'Gallery Image 2', 'cornerstore' ),
      'section'  => 'contact_panel',
      'settings' => 'gallery_image_2',
      'buttons'  => array(
        'select' => __( 'Select Image', 'cornerstore' ),
        'remove' => __( 'Remove Image', 'cornerstore' ),
        'change' => __( 'Change Image', 'cornerstore' )
      )
    ) ) );

    // Gallery Image 3
    $wp_customize->add_setting( 'gallery_image_3', array(
      'default'           => 'https://i.imgur.com/rXUXw7s.jpg',
      'sanitize_callback' => 'esc_url_raw'
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'gallery_image_3', array(
      'label'    => __( 'Gallery Image 3', 'cornerstore' ),
      'section'  => 'contact_panel',
      'settings' => 'gallery_image_3',
      'buttons'  => array(
        'select' => __( 'Select Image', 'cornerstore' ),
        'remove' => __( 'Remove Image', 'cornerstore' ),
        'change' => __( 'Change Image', 'cornerstore' )
      )
    ) ) );

    // Gallery Image 4
    $wp_customize->add_setting( 'gallery_image_4', array(
      'default'           => 'https://i.imgur.com/xRpTC3Y.jpg',
      'sanitize_callback' => 'esc_url_raw'
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'gallery_image_4', array(
      'label'    => __( 'Gallery Image 4', 'cornerstore' ),
      'section'  => 'contact_panel',
      'settings' => 'gallery_image_4',
      'buttons'  => array(
        'select' => __( 'Select Image', 'cornerstore' ),
        'remove' => __( 'Remove Image', 'cornerstore' ),
        'change' => __( 'Change Image', 'cornerstore' )
      )
    ) ) );



  // About Section
  $wp_customize->add_section( 'about_panel', array(
    'title'    => __( 'About Section', 'cornerstore' ),
    'priority' => 40
  ) );

    // Text 1: Title
    $wp_customize->add_setting( 'about_title_1', array(
      'default'           => __( 'You need something?', 'cornerstore' ),
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    ) );
    $wp_customize->add_control( 'about_title_1', array(
      'label'    => __( 'Title 1', 'cornerstore' ),
      'section'  => 'about_panel',
      'priority' => 1
    ) );

    // Text 1: Paragraph
    $wp_customize->add_setting( 'about_paragraph_1', array(
      'default'           => __( 'We take care that your home has everything you always need. We are available 24 hours a day.', 'cornerstore' ),
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    ) );
    $wp_customize->add_control( 'about_paragraph_1', array(
      'label'    => __( 'Paragraph 1', 'cornerstore' ),
      'section'  => 'about_panel',
      'priority' => 2,
      'type'     => 'textarea'
    ) );

    // Text 1: Image 1
    $wp_customize->add_setting( 'about_image_1', array(
      'default'           => 'https://i.imgur.com/jHQqot0.jpg',
      'sanitize_callback' => 'esc_url_raw'
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'about_image_1', array(
      'label'    => __( 'Image 1', 'cornerstore' ),
      'section'  => 'about_panel',
      'settings' => 'about_image_1',
      'priority' => 3,
      'buttons'  => array(
        'select' => __( 'Select Image', 'cornerstore' ),
        'remove' => __( 'Remove Image', 'cornerstore' ),
        'change' => __( 'Change Image', 'cornerstore' )
      )
    ) ) );

    // Separator
    $wp_customize->add_setting( 'separator_about_1', array() );
    $wp_customize->add_control( new Separator_Control( $wp_customize, 'separator_about_1', array(
      'section' => 'about_panel',
      'priority' => 4,
    ) ) );

    // Text 2: Title
    $wp_customize->add_setting( 'about_title_2', array(
      'default'           => __( 'About our store?', 'cornerstore' ),
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    ) );
    $wp_customize->add_control( 'about_title_2', array(
      'label'    => __( 'Title 2', 'cornerstore' ),
      'section'  => 'about_panel',
      'priority' => 5
    ) );

    // Text 2: Paragraph
    $wp_customize->add_setting( 'about_paragraph_2', array(
      'default'           => __( 'We are a small fictitious store that serves as a model for those who use the CornerStore theme for their website made in WordPress.', 'cornerstore' ),
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    ) );
    $wp_customize->add_control( 'about_paragraph_2', array(
      'label'    => __( 'Paragraph 2', 'cornerstore' ),
      'section'  => 'about_panel',
      'priority' => 6,
      'type'     => 'textarea'
    ) );

    // Text 2: Image 2
    $wp_customize->add_setting( 'about_image_2', array(
      'default'           => 'https://i.imgur.com/GoPCMe3.jpg',
      'sanitize_callback' => 'esc_url_raw'
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'about_image_2', array(
      'label'    => __( 'Image 2', 'cornerstore' ),
      'section'  => 'about_panel',
      'settings' => 'about_image_2',
      'priority' => 7,
      'buttons'  => array(
        'select' => __( 'Select Image', 'cornerstore' ),
        'remove' => __( 'Remove Image', 'cornerstore' ),
        'change' => __( 'Change Image', 'cornerstore' )
      )
    ) ) );
    $wp_customize->add_setting( 'separator_about_2', array() );
    $wp_customize->add_control( new Separator_Control( $wp_customize, 'separator_about_2', array(
      'section' => 'about_panel',
      'priority' => 8,
    ) ) );

    // Text 3: Title
    $wp_customize->add_setting( 'about_title_3', array(
      'default'           => __( 'Vegetables?... Yes', 'cornerstore' ),
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    ) );
    $wp_customize->add_control( 'about_title_3', array(
      'label'    => __( 'Title 3', 'cornerstore' ),
      'section'  => 'about_panel',
      'priority' => 9
    ) );

    // Text 3: Paragraph
    $wp_customize->add_setting( 'about_paragraph_3', array(
      'default'           => __( 'We sell all kinds of products, fruits, meats, drinks, candies, but our specialty is vegetables, our fresh and recently harvested vegetables.', 'cornerstore' ),
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    ) );
    $wp_customize->add_control( 'about_paragraph_3', array(
      'label'    => __( 'Paragraph 3', 'cornerstore' ),
      'section'  => 'about_panel',
      'priority' => 10,
      'type'     => 'textarea'
    ) );

    // Text 3: Image 3
    $wp_customize->add_setting( 'about_image_3', array(
      'default'           => 'https://i.imgur.com/obUPM4v.jpg',
      'sanitize_callback' => 'esc_url_raw'
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'about_image_3', array(
      'label'    => __( 'Image 3', 'cornerstore' ),
      'section'  => 'about_panel',
      'settings' => 'about_image_3',
      'priority' => 11,
      'buttons'  => array(
        'select' => __( 'Select Image', 'cornerstore' ),
        'remove' => __( 'Remove Image', 'cornerstore' ),
        'change' => __( 'Change Image', 'cornerstore' )
      )
    ) ) );
    $wp_customize->add_setting( 'separator_about_3', array() );
    $wp_customize->add_control( new Separator_Control( $wp_customize, 'separator_about_3', array(
      'section' => 'about_panel',
      'priority' => 12,
    ) ) );

    // Text 4: Title
    $wp_customize->add_setting( 'about_title_4', array(
      'default'           => '24/7',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    ) );
    $wp_customize->add_control( 'about_title_4', array(
      'label'    => __( 'Title 4', 'cornerstore' ),
      'section'  => 'about_panel',
      'priority' => 13
    ) );

    // Text 4: Paragraph
    $wp_customize->add_setting( 'about_paragraph_4', array(
      'default'           => __( 'We are available 24 hours a day, 7 days a week. We will wait for you.', 'cornerstore' ),
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    ) );
    $wp_customize->add_control( 'about_paragraph_4', array(
      'label'    => __( 'Paragraph 4', 'cornerstore' ),
      'section'  => 'about_panel',
      'priority' => 14,
      'type'     => 'textarea'
    ) );

    // Text 4: Image 4
    $wp_customize->add_setting( 'about_image_4', array(
      'default'           => 'https://i.imgur.com/A4vVFxG.jpg',
      'sanitize_callback' => 'esc_url_raw'
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'about_image_4', array(
      'label'    => __( 'Image 4', 'cornerstore' ),
      'section'  => 'about_panel',
      'settings' => 'about_image_4',
      'priority' => 15,
      'buttons'  => array(
        'select' => __( 'Select Image', 'cornerstore' ),
        'remove' => __( 'Remove Image', 'cornerstore' ),
        'change' => __( 'Change Image', 'cornerstore' )
      )
    ) ) );
  

    
  // Remove Homepage Settings
  $wp_customize->remove_section( 'static_front_page' );

}

add_action( 'customize_register', 'customize' );




function panel_separators() { 
  ?>
  <style>
    #accordion-section-hero_panel, #accordion-panel-nav_menus { 
      margin-top: 15px 
    }
  </style>
  <?php 
}

add_action( 'customize_controls_init', 'panel_separators' );






