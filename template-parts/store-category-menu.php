<?php 
/*
 * Displays the products categories for the navbar store menu
 */

?>


<div class="store-categories-menu">

  <ul class="unstyled-ul navbar-menu-ul">
    <li><a href="<?php echo home_url() . '#store' ?>" ><?php _e( 'All', 'cornerstore' ) ?></a></li>
    
    <?php
    $products_categories = get_terms( array( 
      'taxonomy' => 'products-category',
      'hide_empty' => false
    ) );
    foreach ( $products_categories as $products_category ) {
      ?>
      <li>
        <a href="<?php echo get_term_link( $products_category->slug, 'products-category' ) . '#store' ?>" class="product-category">
          <?php _e( $products_category->name, 'cornerstore' ) ?>
        </a>
      </li>
      <?php
    }
    ?>

  </ul>

</div>