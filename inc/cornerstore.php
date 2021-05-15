<?php 

/* 
* CornerStore function
*
* Various useful functions that are used 
* throughout the theme
*
*/









/* 
* Components
*/

// Logo
function the_theme_logo() {
  if ( has_custom_logo() ) {
    the_custom_logo();
  } else {
    ?>
    <a href="<?php echo home_url() ?>" class="custom-logo-link" rel="home" aria-current="page">
      <img 
        src="<?php echo get_template_directory_uri() . '/assets/svg/logo.svg' ?>" 
        class="custom-logo"
      />
    </a>
    <?php
  }
}

// Primary Menu
function the_theme_primary_menu() {
  if ( has_nav_menu( 'primary-menu' ) ) {
    wp_nav_menu( array(
        'theme_location' => 'primary-menu',
        'container_class' => 'primary-menu',
        'menu_class'      => 'unstyled-ul navbar-menu-ul'
    ) );
  } else { 
    ?>
    <div class="primary-menu">
      <ul class="unstyled-ul navbar-menu-ul">
        <li><a href="<?php echo home_url() . '#store' ?>" ><?php _e( 'Store', 'cornerstore' ) ?></a></li>
        <li><a href="<?php echo get_permalink( get_page_by_path( 'contact' ) ) ?>"><?php _e( 'Contact', 'cornerstore' ) ?></a></li>
        <li><a href="<?php echo get_permalink( get_page_by_path( 'about' ) ) ?>"><?php _e( 'About', 'cornerstore' ) ?></a></li>
      </ul>
    </div>
    <?php 
  }
}

// Social Media Menu
function the_theme_social_media_menu() {
  if ( has_nav_menu( 'social-media-menu' ) ) {
    wp_nav_menu( array(
        'theme_location' => 'social-media-menu',
        'container_class' => 'social-media-menu',
        'menu_class'      => 'unstyled-ul'
      ) );
  } else { 
    ?>
    <div class="social-media-menu">
      <ul class="unstyled-ul">
        <li><a href="https://www.facebook.com/" target="_blank"></a></li>
        <li><a href="https://www.instagram.com/" target="_blank"></a></li>
        <li><a href="https://api.whatsapp.com/" target="_blank"></a></li>
        <li><a href="https://goo.gl/maps/uXQogmZRupywRk1A6" target="_blank"></a></li>
      </ul>
    </div>
    <?php 
  }
}

// Hero: Calls to action 
function the_hero_calls_to_action() {
  if( get_hero_store_button() === 1 ) { 
    ?>
    <a class="hero-btn" href="#store">
      <img 
        src="<?php echo get_template_directory_uri() . '/assets/svg/store.svg' ?>" 
        alt="<?php _e( 'Store', 'cornerstore' ) ?>" 
      />
      <?php _e( 'Store', 'cornerstore' ) ?>
    </a>
    <?php
  }
  if( get_hero_chat_button() === 1 ) { 
    ?>
    <a class="hero-btn" href="https://api.whatsapp.com/send?phone=<?php echo get_store_phone_number() ?>&text=<?php _e( 'Hello', 'cornerstore' ) ?>" target="_blank">
      <img 
        src="<?php echo get_template_directory_uri() . '/assets/svg/whatsapp.svg' ?>" 
        alt="WhatsApp"
      />
      <?php _e( 'Chat us', 'cornerstore' ) ?>
    </a>
    <?php
  }
  if( get_hero_location_button() === 1 ) { 
    ?>
    <a class="hero-btn" href="<?php echo get_store_location() ?>" target="_blank">
      <img 
        src="<?php echo get_template_directory_uri() . '/assets/svg/location.svg' ?>" 
        alt="Location"
      />
      <?php _e( 'Visit us', 'cornerstore' ) ?>
    </a>
    <?php
  }
}







/* 
* Customization controls
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









/* 
* Miscellaneous
*/

// Add extra items to the menus
function menus_extra_items( $items, $args ) {
  if ( $args->theme_location === 'primary-menu' ) {
    $items = '<li><a href="'. home_url() .'/#store">' . __( 'Store', 'cornerstore' ) . '</a></li>' . $items;
    return $items;
  }
}
add_filter( 'wp_nav_menu_items', 'menus_extra_items', 10, 2 );