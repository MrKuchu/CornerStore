<?php
/*
 * Initialize variables to be used in CSS
 */

?>

<style>
  :root {
    --url-background-image: url('<?php echo get_theme_background_image_url() ?>'); 
    --color-primary: <?php echo get_theme_color() ?>;
    --color-primary-dark: <?php echo get_theme_color( -8 ) ?>;
    --color-primary-light: <?php echo get_theme_color( 8 ) ?>;
    --color-primary-dark-medium: <?php echo get_theme_color( -4 ) ?>;
    --color-primary-light-medium: <?php echo get_theme_color( 4 ) ?>;
  }
</style>