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

// Store Categories Menu
function the_theme_store_categories_menu() {
  ?>
  <div class="store-categories-menu">
    <ul class="unstyled-ul navbar-menu-ul">
      <li><a href="<?php echo home_url() . '#store' ?>" ><?php _e( 'All', 'cornerstore' ) ?></a></li>
      <?php
      $products_categories = get_terms( array( 
        'taxonomy' => 'products-category',
        'hide_empty' => false
      ) );
      foreach ( $products_categories as $products_category ) {
        ?>
        <li>
          <a href="<?php echo get_term_link( $products_category->slug, 'products-category' ) . '#store' ?>" class="product-category">
            <?php echo $products_category->name ?>
          </a>
        </li>
        <?php
      }
      ?>
    </ul>
  </div>
  <?php
}

// Store Search Bar
function the_theme_store_search_bar() {
  ?>
  <form>
    <div class="search-bar-container">
      <input id="product-search-bar" type="text" onkeyup="productKeywordFetch()" />
      <svg class="search-icon-container" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path class="search-icon" d="M15.6082 13.718L12.4434 10.5532C13.1619 9.47608 13.5808 8.18207 13.5808 6.79045C13.5808 3.04 10.5408 0 6.79041 0C3.03998 0 0 3.04 0 6.79045C0 10.5409 3.03998 13.5809 6.79041 13.5809C8.18202 13.5809 9.47601 13.162 10.5531 12.4435L13.7179 15.6083C13.9789 15.8693 14.321 16 14.663 16C15.0051 16 15.3472 15.8693 15.6082 15.6083C16.1306 15.0863 16.1306 14.24 15.6082 13.718ZM2.67372 6.79045C2.67372 4.52032 4.52029 2.67374 6.79041 2.67374C9.06052 2.67374 10.9071 4.52032 10.9071 6.79045C10.9071 9.06058 9.06052 10.9072 6.79041 10.9072C4.52029 10.9072 2.67372 9.06058 2.67372 6.79045Z" />
      </svg>
      <div class="search-options-container"></div>
    </div>
  </form>
  <?php
}

// Store Products
function the_theme_products( $args ) {
  $products = new WP_Query( $args );
  if( $products->have_posts() ) {
    while( $products->have_posts() ) {
      $products->the_post();
      $post_id = get_the_ID();
      $post_price = get_post_meta( $post_id, '_product_price', true );
      ?>
      <a class="product-card grid-<?php echo get_post_meta( $post_id, '_product_size', true ) ?>" href="<?php echo get_permalink() . '#store' ?>">
        <figure>
          <?php 
          if ( has_post_thumbnail() ) {
            the_post_thumbnail( 'large' );
          } else {
            echo '<img width="1024" height="768" src="'. get_post_meta( $post_id, '_product_default_image_url', true ) .'" class="attachment-large size-large wp-post-image" alt="" loading="lazy" >';
          }
          ?>
        </figure>
        <div class="price-container">
          <span class="dollar-sign">$</span>
          <?php 
          list($whole, $decimal) = explode('.', $post_price);
          if( $decimal !== null ) { ?>
            <span class="price-dollars"><?php echo intval( $post_price ) . '.' ?></span>
            <span class="price-pennies"><?php echo $decimal ?></span>
            <?php
          } else { ?>
            <span class="price-dollars"><?php echo $whole?></span>
            <?php
          }
        ?>
        </div>
      </a>
      <?php
    }
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