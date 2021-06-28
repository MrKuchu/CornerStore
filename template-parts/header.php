<?php
/*
 * Displays the navbar menu to the header
 */

?>


<div class="navbar">

  <nav class="navbar-container">

    <div class="navbar-header">

      <?php get_template_part( 'template-parts/component', 'logo' ) ?>
      <span class="vertical-divider"></span>
      <span id="navbar-primary-toggler" class="burger-menu-icon"></span>

    </div>
  
    <div class="navbar-body" id="navbar-primary-body">
      
      <div class="navbar-body-container justify-content-between unselectable">

        <?php get_template_part( 'template-parts/header', 'primary-menu' ) ?>
        <span class="horizontal-divider"></span>
        <?php get_template_part( 'template-parts/component', 'social-media-menu' ) ?>

      </div>

    </div>

  </nav>

</div>
