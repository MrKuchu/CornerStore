<?php get_header() ?>

<?php get_template_part( 'template-parts/section-hero' ) ?>

<section id="store">

  <?php get_template_part( 'template-parts/navbar-store' ) ?>

  <div class="product-container container-xxl">

    <div class="product-card product-img">
      <figure>
        <?php 
        $post_id = get_the_ID();
        $post_price = get_post_meta( $post_id, '_product_price', true );
        if ( has_post_thumbnail() ) {
          the_post_thumbnail( 'product-2x2' );
        } else {
          echo '<img width="660" height="442" src="'. get_post_meta( $post_id, '_product_default_image_url', true ) .'" class="attachment-large size-large wp-post-image" alt="" loading="lazy" >';
        }
        ?>
      </figure>
      <div class="price-container">
        <span class="dollar-sign">$</span>
        <?php 
        list($whole, $decimal) = explode('.', $post_price);
        if( $decimal !== null ) { ?>
          <span class="price-dollars"><?php echo intval( $post_price ) . '.' ?></span>
          <span class="price-pennies"><?php echo $decimal ?></span>
          <?php
        } else { ?>
          <span class="price-dollars"><?php echo $whole?></span>
          <?php
        }
        ?>
      </div>
    </div>
    <div class="product-details-container">
      <div class="product-details">
        <h2><?php the_title() ?></h2>
        <hr>
        <?php the_content() ?>
      </div>
      <div class="product-calls-to-action">
        <a class="btn-buy"><?php _e( 'Contact us', 'cornerstore' ) ?></a>
        <a><?php _e( 'Visit us', 'cornerstore' ) ?></a>
      </div>
    </div>
    <div class="related-products">
      <h4><?php _e( 'Related products', 'cornerstore' ) ?></h4>
      <div class="related-products-container">  
      <?php
        $products = new WP_Query( array(
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
        if( $products->have_posts() ) {
          while( $products->have_posts() ) {
            $products->the_post();
            $post_recommended_id = get_the_ID();
            $post_recommended_price = get_post_meta( $post_recommended_id, '_product_price', true );
            ?>

            <a class="product-card" href="<?php echo get_permalink() . '#store' ?>">
            <figure>
              <?php
              if ( has_post_thumbnail() ) {
                the_post_thumbnail( 'product-1x1' );
              } else {
                echo '<img width="320" height="320" src="'. get_post_meta( $post_recommended_id, '_product_default_image_url', true ) .'" class="attachment-large size-large wp-post-image" alt="" loading="lazy" >';
              }
              ?>
            </figure>
              <div class="price-container">
                <span class="dollar-sign">$</span>
                <?php 
                list($whole, $decimal) = explode('.', $post_recommended_price);
                if( $decimal !== null ) { ?>
                  <span class="price-dollars"><?php echo intval( $post_recommended_price ) . '.' ?></span>
                  <span class="price-pennies"><?php echo $decimal ?></span>
                  <?php
                } else { ?>
                  <span class="price-dollars"><?php echo $whole?></span>
                  <?php
                }
                ?>
              </div>
            </a>
            <?php
          }
        }
        ?>
      </div>
    </div>

  </div>

</section>

<?php get_footer() ?>