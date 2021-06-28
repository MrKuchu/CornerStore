<?php
/*
 * Displays the navbar menu to the store section
 */

?>


<div class="navbar container-xxl">

  <nav class="navbar-container">

    <div class="navbar-header">

      <?php get_template_part( 'template-parts/component', 'logo' ) ?>
      <span class="vertical-divider"></span>
      <span id="navbar-store-toggler" class="burger-menu-icon"></span>

    </div>
  
    <div class="navbar-body" id="navbar-store-body">
      
      <div class="navbar-body-container unselectable">

        <?php get_template_part( 'template-parts/store', 'category-menu' ) ?>
        <span class="horizontal-divider"></span>
        <?php get_template_part( 'template-parts/store', 'search-bar' ) ?>

      </div>

    </div>

  </nav>

</div>