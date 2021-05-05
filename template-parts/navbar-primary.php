<div class="navbar-container">

  <nav class="navbar navbar-primary">

    <div class="navbar-header">

      <?php
      if ( the_custom_logo() ) {
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
      ?>

      <span class="vertical-divider"></span>

      <span id="navbar-primary-toggler" class="navbar-toggler"></span>

    </div>
  
    <div class="navbar-body-container" id="navbar-primary-body-container">
      
      <div class="navbar-body">

        <?php 
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
        ?>

        <span class="horizontal-divider"></span>

        <?php 
        if ( has_nav_menu( 'social-media-menu' ) ) {
          wp_nav_menu( array(
              'theme_location'  => 'social-media-menu',
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
        ?>

      </div>

    </div>

  </nav>

</div>
