<?php

/*
* Product Post Type.
* This adds a new post type for store products,
* taxonomies and manage his administrator view.
* 
*/

class product {

  public function __construct() {
    add_action( 'init', [$this, 'product_post_type'] );
    add_action( 'save_post', [$this, 'save_product'] );
    add_action( 'add_meta_boxes', [$this, 'product_info_meta_box'] );
    add_filter( 'manage_product_posts_columns', [$this, 'products_columns'] );
    add_action( 'manage_product_posts_custom_column', [$this, 'products_column'], 10, 2 );
    add_filter( 'manage_edit-product_sortable_columns', [$this, 'products_sortable_columns'] );
    add_action( 'pre_get_posts', [$this, 'products_order_filters'] );
    add_action( 'wp_footer', [$this, 'add_products_fetch'] );
    add_action( 'wp_ajax_products_keywords', [$this, 'products_keywords'] );
    add_action( 'wp_ajax_nopriv_products_keywords', [$this, 'products_keywords'] );
  }

  /*
  * Register an manage the product post type and his 
  * taxonomies.
  */
  public function product_post_type() {
    // Post Type
    register_post_type( 'product', array(
      'labels' => array(
        'name'               => __( 'Products', 'cornerstore' ),
        'singular_name'      => __( 'Product', 'cornerstore' ),
        'add_new'            => __( 'Add New', 'cornerstore' ),
        'search_items'       => __( 'Search Products', 'cornerstore' ),
        'not_found'          => __( 'No products found', 'cornerstore' ),
        'not_found_in_trash' => __( 'No products found in Trash', 'cornerstore' ),
      ),
      'public'        => true,
      'show_in_rest'  => true,
      'menu_position' => 5,
      'menu_icon'     => 'dashicons-cart',
      'supports'      => array( 'title', 'editor', 'page-attributes', 'thumbnail' ),
    ) );

    // Taxonomy
    register_taxonomy( 'products-category', array( 'product' ), array(
      'labels' => array(
        'name'          => __( 'Products Category', 'cornerstore' ),
        'singular_name' => __( 'Product Category', 'cornerstore' ),
      ),
      'public'       => true,
      'hierarchical' => true,
    ) );
  }

  /* 
  * Execute when product is save
  */
  public function save_product( $post_id ) {

    if ( isset( $_POST['_product_price'] ) ) {
      update_post_meta( $post_id, '_product_price', $_POST['_product_price'] );
    } else {
      add_post_meta( $post_id, '_product_price', $_POST['_product_price'], true );
    }
    if ( isset( $_POST['_product_size'] ) ) {
      update_post_meta( $post_id, '_product_size', $_POST['_product_size'] );
    } else {
      add_post_meta( $post_id, '_product_size', $_POST['_product_size'], true );
    }
    if ( !isset( $_POST['_product_default_image_url'] ) ) {
      add_post_meta( $post_id, '_product_default_image_url', 'https://i.imgur.com/PJ64ZZk.jpg', true );
    }

  }

  /* 
  * Add meta boxes to the product post type 
  */
  public function product_info_meta_box() {
    add_meta_box( 'product_info', __( 'Product Info', 'cornerstore'), [$this, 'product_info_meta_box_html'], ['product'], 'side', 'default' );
  }
  public function product_info_meta_box_html( $post ) {
    $price = get_post_meta( $post->ID, '_product_price', true );
    $size = get_post_meta( $post->ID, '_product_size', true );
    ?>
    <div class="components-base-control__field">
      <label for="_product_price" class="components-base-control__label"><?php _e( 'Price', 'cornerstore' ) ?></label>
      <input name="_product_price" id="_product_price" type="number" class="components-text-control__input" value="<?php echo $price ?>" >
    </div><br>
    <div class="components-base-control__field" style="margin-bottom: 300px">
      <label for="_product_size" class="components-base-control__label"><?php _e( 'Size', 'cornerstore' ) ?></label>
      <select name="_product_size" id="_product_size">
        <option ><?php _e( ' - Select One - ' ) ?></option>
        <option <?php if ( $size === '1x1' ) { echo 'selected'; } ?> value="1x1">1 x 1</option>
        <option <?php if ( $size === '1x2' ) { echo 'selected'; } ?> value="1x2">1 x 2</option>
        <option <?php if ( $size === '2x1' ) { echo 'selected'; } ?> value="2x1">2 x 1</option>
        <option <?php if ( $size === '2x2' ) { echo 'selected'; } ?> value="2x2">2 x 2</option>
      </select>
    </div>
    <?php
  }

  /* 
  * Filter the columns to be displayed in the Product 
  * admin view.
  */
  public function products_columns( $columns ) {
    $columns = array(
      'cb'    => $columns['cb'],
      'title' => __( 'Title', 'cornerstore' ),
      'price' => __( 'Price', 'cornerstore' ),
      'order' => __( 'Order', 'cornerstore' ),
      'date'  => __( 'Date', 'cornerstore' )
    );
    return $columns;
  }

  /*
  * Add the data to the new columns.
  */
  public function products_column( $column, $post_id ) {
    switch( $column ) {
      case 'price':
        echo '$' . get_post_meta( $post_id, '_product_price', true );
        break;
      case 'order':
        echo get_post_field( 'menu_order', $post_id );
        break;
    }
  }

  /*
  * Make columns sortable.
  */
  public function products_sortable_columns( $columns ) {
    $columns['price'] = 'price';
    $columns['order'] = 'order';
    return $columns;
  }

  /*
  * Manage sortable columns.
  */
  public function products_order_filters( $query ) {
    $orderby = $query->get( 'orderby' );
    switch( $orderby ) {
      case 'price':
        $query->set( 'meta_key', 'price' );
        $query->set( 'orderby', 'meta_value_num' );
        break;
      case 'order':
        $query->set( 'orderby', 'menu_order' );
        break;
    }
  }

  /* 
  * Add the AJAX fetch for the search bar on the 
  * store section of the front-page on the footer.
  */
  public function add_products_fetch() { ?>
    <script type="text/javascript">
      function productKeywordFetch() {
        let input = jQuery('#product-search-bar')
        let optionsContainer = jQuery('.search-options-container')

        jQuery.ajax({
          url: '<?php echo admin_url('admin-ajax.php') ?>',
          type: 'post',
          data: {
            action: 'products_keywords',
            keyword: input.val()
          },
          success: function(productsKeywords) {
            if ( input.val() === '' ) {
              optionsContainer.css('display', 'none')
            } else {
              optionsContainer.css('display', 'flex')
              optionsContainer.html(productsKeywords)
            }
          }
        }) 
      }
    </script>    
    <?php
  }
  
  /*
  * Product data to send by AJAX.
  */
  public function products_keywords() { 
    global $wpdb;
    $products = $wpdb->get_results( "SELECT post_title AS title, `guid` AS `url` FROM wp_posts WHERE post_status = 'publish' AND post_type = 'product' AND post_title LIKE'" . $_POST['keyword'] . "%' LIMIT 10" );
    foreach($products as $product) {
      ?>
      <a href="<?php echo $product->url . '#store' ?>"><?php echo $product->title ?></a>
      <?php
    }
    die();
  }
}

new product();