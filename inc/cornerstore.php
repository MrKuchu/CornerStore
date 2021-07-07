<?php 
/**
 * CornerStore function
 *
 * Various useful functions that are used 
 * throughout the theme
 * 
 * - Colors
 * - Info
 * - Hero Section
 * - Contact Section
 * - About Section
 * - Footer Section
 * - Sanitization
 */









/* Colors */

function get_theme_color( $extra_brightness = 0, $opacity = 1 ) {
  $theme_color = get_theme_mod( 'theme_color' );
  if( $theme_color === false ) {
    $theme_color = '#007A85';
  }
  list( $r, $g, $b ) = sscanf( $theme_color, '#%02x%02x%02x' );
  $brightness = sqrt( $r*$r + $g*$g + $b*$b );
  $extra_brightness = ( $extra_brightness * 441.672956 ) / 100;
  $brightness = ( $brightness + $extra_brightness ) / $brightness;
  return 'rgba(' . round($r * $brightness) . ','. round($g * $brightness) . ','. round($b * $brightness) . ',' . $opacity . ')';
}









/* Info */

function get_store_phone_number() {
  $phone = get_theme_mod( 'store_phone_number' );
  if( $phone ) {
    return $phone;
  } else {
    return '+593 98 765 4321';
  }
}

function get_store_email() {
  $email = get_theme_mod( 'store_email' );
  if( $email ) {
    return $email;
  } else {
    return 'your@email.com';
  }
}

function get_store_address() {
  $address = get_theme_mod( 'store_address' );
  if( $address ) {
    return $address;
  } else {
    return __( '123 Example St, City, Country' );
  }
}

function get_store_location() {
  $url = get_theme_mod( 'store_location' );
  if( $url ) {
    return $url;
  } else {
    return 'https://goo.gl/maps/uXQogmZRupywRk1A6';
  }
}

function get_store_facebook() {
  $url = get_theme_mod( 'store_facebook' );
  if( $url ) {
    return $url;
  } else {
    return 'CornerStore';
  }
}

function get_store_instagram() {
  $url = get_theme_mod( 'store_instagram' );
  if( $url ) {
    return $url;
  } else {
    return '@CornerStore';
  }
}










/* Hero Section*/

function get_hero_primary_text() {
  $hero_primary_text = get_theme_mod( 'hero_primary_text' );
  if( $hero_primary_text ) {
    return $hero_primary_text;
  } else {
    return __( 'Your trusted store', 'cornerstore' );
  }
}

function get_hero_secondary_text() {
  $hero_secondary_text = get_theme_mod( 'hero_secondary_text' );
  if( $hero_secondary_text ) {
    return $hero_secondary_text;
  } else {
    return __( 'Find here what you need for your home, feel free to visit us whenever you like, we’ll be happy to help you. You can also visit us at our shop, we are waiting for you.', 'cornerstore' );
  }
}

function get_hero_store_button() {
  $hero_store_button = get_theme_mod( 'hero_store_button' );
  if( $hero_store_button === false ) {
    return 1;
  } else {
    return $hero_store_button;
  }
}

function get_hero_chat_button() {
  $hero_chat_button = get_theme_mod( 'hero_chat_button' );
  if( $hero_chat_button === false ) {
    return 1;
  } else {
    return $hero_chat_button;
  }
}

function get_hero_location_button() {
  $hero_location_button = get_theme_mod( 'hero_location_button' );
  if( $hero_location_button === false ) {
    return 1;
  } else {
    return $hero_location_button;
  }
}









/* Contact Section */

function get_gallery_image_1_url() {
  $url = get_theme_mod( 'gallery_image_1' );
  if( $url ) {
    return $url;
  } else {
    return 'https://i.imgur.com/KoJZ9OK.jpg';
  }
}

function get_gallery_image_2_url() {
  $url = get_theme_mod( 'gallery_image_2' );
  if( $url ) {
    return $url;
  } else {
    return 'https://i.imgur.com/QwSs3f5.jpg';
  }
}

function get_gallery_image_3_url() {
  $url = get_theme_mod( 'gallery_image_3' );
  if( $url ) {
    return $url;
  } else {
    return 'https://i.imgur.com/rXUXw7s.jpg';
  }
}

function get_gallery_image_4_url() {
  $url = get_theme_mod( 'gallery_image_4' );
  if( $url ) {
    return $url;
  } else {
    return 'https://i.imgur.com/xRpTC3Y.jpg';
  }
}









/* About Section */

function get_about_title_1() {
  $about_title_1 = get_theme_mod( 'about_title_1' );
  if( $about_title_1 ) {
    return $about_title_1;
  } else {
    return __( 'You need something?', 'cornerstore' );
  }
}

function get_about_paragraph_1() {
  $about_paragraph_1 = get_theme_mod( 'about_paragraph_1' );
  if( $about_paragraph_1 ) {
    return $about_paragraph_1;
  } else {
    return __( 'We take care that your home has everything you always need. We are available 24 hours a day.', 'cornerstore' );
  }
}

function get_about_image_1_url() {
  $url = get_theme_mod( 'about_image_1' );
  if( $url ) {
    return $url;
  } else {
    return 'https://i.imgur.com/jHQqot0.jpghttps://i.imgur.com/jHQqot0.jpg';
  }
}

function get_about_title_2() {
  $about_title_2 = get_theme_mod( 'about_title_2' );
  if( $about_title_2 ) {
    return $about_title_2;
  } else {
    return __( 'About our store?', 'cornerstore' );
  }
}

function get_about_paragraph_2() {
  $about_paragraph_2 = get_theme_mod( 'about_paragraph_2' );
  if( $about_paragraph_2 ) {
    return $about_paragraph_2;
  } else {
    return __( 'We are a small fictitious store that serves as a model for those who use the CornerStore theme for their website made in WordPress.', 'cornerstore' );
  }
}

function get_about_image_2_url() {
  $url = get_theme_mod( 'about_image_2' );
  if( $url ) {
    return $url;
  } else {
    return 'https://i.imgur.com/GoPCMe3.jpg';
  }
}

function get_about_title_3() {
  $about_title_3 = get_theme_mod( 'about_title_3' );
  if( $about_title_3 ) {
    return $about_title_3;
  } else {
    return __( 'Vegetables?... Yes', 'cornerstore' );
  }
}

function get_about_paragraph_3() {
  $about_paragraph_3 = get_theme_mod( 'about_paragraph_3' );
  if( $about_paragraph_3 ) {
    return $about_paragraph_3;
  } else {
    return __( 'We sell all kinds of products, fruits, meats, drinks, candies, but our specialty is vegetables, our fresh and recently harvested vegetables.', 'cornerstore' );
  }
}

function get_about_image_3_url() {
  $url = get_theme_mod( 'about_image_3' );
  if( $url ) {
    return $url;
  } else {
    return 'https://i.imgur.com/obUPM4v.jpg';
  }
}

function get_about_title_4() {
  $about_title_4 = get_theme_mod( 'about_title_4' );
  if( $about_title_4 ) {
    return $about_title_4;
  } else {
    return '24/7';
  }
}

function get_about_paragraph_4() {
  $about_paragraph_4 = get_theme_mod( 'about_paragraph_4' );
  if( $about_paragraph_4 ) {
    return $about_paragraph_4;
  } else {
    return __( 'We are available 24 hours a day, 7 days a week. We will wait for you.', 'cornerstore' );
  }
}

function get_about_image_4_url() {
  $url = get_theme_mod( 'about_image_4' );
  if( $url ) {
    return $url;
  } else {
    return 'https://i.imgur.com/A4vVFxG.jpg';
  }
}









/* Footer Section */

function get_theme_background_image_url() {
  $url = get_theme_mod( 'background_image' );
  if( $url ) {
    return $url;
  } else {
    return 'https://i.imgur.com/OY4hBoi.jpg';
  }
}











/* Sanitization */

function checkbox_sanitization( $input ) {
  if ( true === $input ) {
    return 1;
  } else {
    return 0;
  }
}