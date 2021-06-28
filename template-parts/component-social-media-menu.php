<?php
/*
 * Displays the social media menu, 
 * if not exist display a default one
 */

 
if ( has_nav_menu( 'social-media-menu' ) ) {

  wp_nav_menu( array(
    'theme_location' => 'social-media-menu',
    'menu_class'     => 'social-media-menu-ul unstyled-ul'
  ) );

} else { 

  ?>
  <div>
    <ul class="social-media-menu-ul unstyled-ul">
      <li><a href="https://www.facebook.com/" target="_blank"></a></li>
      <li><a href="https://www.instagram.com/" target="_blank"></a></li>
      <li><a href="https://api.whatsapp.com/" target="_blank"></a></li>
      <li><a href="https://goo.gl/maps/uXQogmZRupywRk1A6" target="_blank"></a></li>
    </ul>
  </div>
  <?php 

}