<?php
/*
 * Displays the products
 */

?>

<div class="products-container container-xxl"> 
  <?php  

  $products = new WP_Query( $args );

  if( $products->have_posts() ) {
    while( $products->have_posts() ) {
      $products->the_post();

      $post_id = get_the_ID();
      $post_price = get_post_meta( $post_id, '_product_price', true );
      $post_grid_size = get_post_meta( $post_id, '_product_grid_size', true );

      ?>
      <a class="product-card grid-<?php echo $post_grid_size ?>" href="<?php echo get_permalink() . '#store' ?>">
        
        <?php get_template_part( 'template-parts/store', 'product-thumbnail', array( 'post_id' => $post_id ) ) ?>
        <?php get_template_part( 'template-parts/store', 'product-price', array( 'post_price' => $post_price ) ) ?>

      </a>
      <?php

    }
  }

  ?>
</div>



