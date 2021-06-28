<?php get_header() ?>


<section id="contact">


  <div class="contact-info section-card"> 

    <div class="section-card-header">
      <div class="tab">
        <h3><?php _e( 'Contact' , 'cornerstore' ) ?></h3>
        <span class="underline"></span>
      </div>
    </div>

    <div class="section-card-body">
      <div class="item whatsapp">
        <div class="item-title">WhatsApp</div>
        <div class="item-info"><?php echo get_store_phone_number() ?></div>
      </div>
      <div class="item facebook">
        <div class="item-title">Facebook</div>
        <div class="item-info"><?php echo get_store_facebook() ?></div>
      </div>
      <div class="item instagram">
        <div class="item-title">Instagram</div>
        <div class="item-info"><?php echo get_store_instagram() ?></div>
      </div>
      <div class="item email">
        <div class="item-title"><?php _e( 'Email', 'cornerstore' ) ?></div>
        <div class="item-info"><?php echo get_store_email() ?></div>
      </div>
      <div class="item location">
        <div class="item-title"><?php _e( 'Location', 'cornerstore' ) ?></div>
        <div class="item-info"><?php echo get_store_address() ?></div>
      </div>
    </div>

  </div>

  <div class="contact-location section-card"> 

    <div class="section-card-header">
      <div class="tab">
        <h3><?php _e( 'Location' , 'cornerstore' ) ?></h3>
        <span class="underline"></span>
      </div>
    </div>

    <div class="section-card-body">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d997.4424844931813!2d-79.48528687083734!3d-0.2821662588983955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x902ab7a574a41d0d%3A0xb862579dc9272ce9!2sMuebles%20Artesanales!5e0!3m2!1sen!2sec!4v1622322431391!5m2!1sen!2sec" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

  </div>

  <div class="contact-gallery section-card">
    <div class="section-card-header">
      <div class="tab">
        <h3><?php _e( 'Gallery' , 'cornerstore' ) ?></h3>
        <span class="underline"></span>
      </div>
    </div>
    <div class="section-card-body">
      <img class="grid-1x1" src="<?php echo get_gallery_image_1_url() ?>">
      <img class="grid-1x1" src="<?php echo get_gallery_image_2_url() ?>">
      <img class="grid-2x2" src="<?php echo get_gallery_image_3_url() ?>">
      <img class="grid-2x1" src="<?php echo get_gallery_image_4_url() ?>">
    </div>
  </div>



  
</section>

<?php get_footer() ?>