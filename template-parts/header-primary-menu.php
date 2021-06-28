<?php
/*
 * Displays the primary menu, 
 * if not exist display a default one
 */

 
if ( has_nav_menu( 'primary-menu' ) ) {

  wp_nav_menu( array(
    'theme_location' => 'primary-menu',
    'menu_class'     => 'navbar-menu-ul unstyled-ul'
  ) );

} else { 

  ?>
  <div class="primary-menu">
    <ul class="navbar-menu-ul unstyled-ul">
      <li><a href="<?php echo home_url() . '#store' ?>" ><?php _e( 'Store', 'cornerstore' ) ?></a></li>
      <li><a href="<?php echo get_permalink( get_page_by_path( 'contact' ) ) ?>"><?php _e( 'Contact', 'cornerstore' ) ?></a></li>
      <li><a href="<?php echo get_permalink( get_page_by_path( 'about' ) ) ?>"><?php _e( 'About', 'cornerstore' ) ?></a></li>
    </ul>
  </div>
  <?php

}