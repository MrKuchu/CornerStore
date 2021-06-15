<?php get_header() ?>

<?php get_template_part( 'template-parts/section-hero' ) ?>

<section id="store">
  <?php get_template_part( 'template-parts/navbar-store' ) ?>
  <div class="products-container container-xxl"><?php
  global $wp_query;
  $term = $wp_query->queried_object; 
  the_theme_products( array(
    'post_type' => 'product',
    'suppress_filters' => true,
    'tax_query' => array(
      array(
          'taxonomy' => 'products-category',
          'field' => 'slug',
          'terms' => $term->slug
      )
    ),
    'post_per_page' => -1,
    'order' => 'ASC',
    'orderby' => 'menu_order'
  ) ) ?>
  </div>
</section>

<style>
  .products-container a {
    grid-row-end: span 1;
    grid-column-end: span 1;
  }
</style>

<?php get_footer() ?>