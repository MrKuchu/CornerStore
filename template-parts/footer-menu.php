<?php
/*
 * Displays the footer menu
 */ 


if ( has_nav_menu( 'footer-menu' ) ) {

  wp_nav_menu( 
    array(
      'theme_location' => 'footer-menu',
      'container_class' => 'footer-menu'
    )
  );

} else { 
  ?>

  <footer>
    <div class="footer-menu container-xxl">
      <ul>
        <li><a href="<?php echo home_url() . '/#store' ?>" target="_blank"><?php _e( 'Store', 'cornerstore' ) ?></a></li>
        <li><a href="<?php echo home_url() . '/contact' ?>" target="_blank"><?php _e( 'Contact', 'cornerstore' ) ?></a></li>
        <li><a href="<?php echo home_url() . '/about' ?>" target="_blank"><?php _e( 'About', 'cornerstore' ) ?> </a></li>
        <li><a href="https://api.whatsapp.com/send?phone=<?php echo get_store_phone_number() ?>&text=<?php _e( 'Hello', 'cornerstore' ) ?>" target="_blank"><?php _e( 'Chat', 'cornerstore' ) ?></a></li>
        <li><a href="<?php echo get_store_location() ?>" target="_blank"><?php _e( 'Location', 'cornerstore' ) ?></a></li>
      </ul>
    </div>
  </footer>
  
  <?php 
}