<?php get_header() ?>

<?php get_template_part( 'template-parts/hero' ) ?>

<section id="store">

  <?php get_template_part( 'template-parts/store', 'navbar' ) ?>

  <div class="product-container">

    <div class="product-card product-img">
      <?php 
      $post_id = get_the_ID();
      $post_price = get_post_meta( $post_id, '_product_price', true );
      get_template_part( 'template-parts/store', 'product-thumbnail', array( 'post_id' => $post_id ) );
      get_template_part( 'template-parts/store', 'product-price', array( 'post_price' => $post_price ) );
      ?>
    </div>

    <div class="product-details-container">

      <div class="product-details">
        <h2><?php the_title() ?></h2>
        <hr>
        <?php the_content() ?>
      </div>

      <div class="product-calls-to-action">
        <a class="btn-buy" href="<?php echo get_permalink( get_page_by_path( 'contact' ) ) ?>">
          <?php _e( 'Contact us', 'cornerstore' ) ?>
        </a>
        <a href="<?php echo get_permalink( get_page_by_path( 'contact' ) ) ?>">
          <?php _e( 'Visit us', 'cornerstore' ) ?>
        </a>
      </div>

    </div>

    <div class="related-products">

      <h4><?php _e( 'Related products', 'cornerstore' ) ?></h4>
      <div class="related-products-container">  
        <?php
        get_template_part( 'template-parts/store', 'products', array(
          'post_type' => 'product',
          'tax_query' => array(
            array(
              'taxonomy' => 'products-category',
              'field' => 'slug',
              'terms' => array( get_the_terms( get_the_ID(), 'products-category' )[0]->slug )
            )
          ),
          'post_per_page' => -1,
          'order' => 'ASC',
          'orderby' => 'menu_order'
        ) );
        ?>
      </div>

    </div>

  </div>

</section>

<?php get_footer() ?>