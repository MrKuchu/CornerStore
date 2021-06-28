<?php
/*
 * Initialize variables to be used in CSS
 */

?>

<style>
  :root {
    --url-background-image: url('<?php echo get_theme_background_image_url() ?>'); 
    --color-light: <?php echo get_theme_light_color( 'light_color' ) ?>;
    --color-dark: <?php echo get_theme_dark_color( 'dark_color' ) ?>;
  }
</style>