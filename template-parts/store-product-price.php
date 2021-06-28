<?php
/*
 * Display the product price 
 */

?>


<div class="price-container">
  <span class="dollar-sign">$</span>

  <?php 
  list($whole, $decimal) = explode('.', $args['post_price'] );

  if( $decimal !== null ) { 

    ?>
    <span class="price-dollars"><?php echo intval( $args['post_price'] ) . '.' ?></span>
    <span class="price-pennies"><?php echo $decimal ?></span>
    <?php
    
  } else { 

    ?>
    <span class="price-dollars"><?php echo $whole?></span>
    <?php

  }
  ?>

</div>