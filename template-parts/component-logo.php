<?php
/*
 * Displays the custom logo, 
 * if not exist display a default one
 */

 
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