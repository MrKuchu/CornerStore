<?php
/*
 * Displays the product thumbnail
 */

?>

<figure>
  <?php
  
  if ( has_post_thumbnail() ) {

    the_post_thumbnail( 'product-' . $post_grid_size );
  
  } else {
    ?>
    <img 
      src="<?php echo get_post_meta( $args['post_id'], '_product_default_image_url', true ) ?>" 
      class="attachment-large size-large wp-post-image" 
      alt="product default image" 
      loading="lazy"
      width="660" 
      height="442" 
    />
    <?php
  
  }

  ?>
</figure>
