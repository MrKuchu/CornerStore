<section id="store">

  <?php get_template_part( 'template-parts/navbar-store' ) ?>
  <div class="products-container container-xxl"><?php 
    the_theme_products( array(
      'post_type' => 'product',
      'post_per_page' => -1,
      'order' => 'ASC',
      'orderby' => 'menu_order',
    ) ) ?>
  </div>

</section>