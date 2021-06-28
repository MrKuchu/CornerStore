<?php
/*
 * Displays the store section
 */

?>


<section id="store">

  <?php 
  get_template_part( 'template-parts/store', 'navbar' );
  get_template_part( 'template-parts/store', 'products', array(
    'post_type' => 'product',
    'post_per_page' => -1,
    'order' => 'ASC',
    'orderby' => 'menu_order'
  ) );
  ?>

</section>