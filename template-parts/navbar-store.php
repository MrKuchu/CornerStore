<div class="navbar container-xxl">

  <nav class="navbar-container">

    <div class="navbar-header">

      <?php the_theme_logo() ?>
      <span class="vertical-divider"></span>
      <span id="navbar-store-toggler" class="burger-menu-icon"></span>

    </div>
  
    <div class="navbar-body" id="navbar-store-body">
      
      <div class="navbar-body-container unselectable">

        <?php the_theme_store_categories_menu() ?>
        <span class="horizontal-divider"></span>
        <?php the_theme_store_search_bar() ?>

      </div>

    </div>

  </nav>

</div>