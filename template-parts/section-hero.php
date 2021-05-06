<section id="hero">

  <div id="hero-content">

    <h1 class="hero-title"><?php echo get_hero_primary_text() ?></h1>
    <p class="hero-copy"><?php echo get_hero_secondary_text() ?></p>

    <div class="hero-calls-to-actions-container">
      
      <?php 
      // Store button
      if( get_hero_store_button() === 1 ) { 
        ?>
        <a class="hero-btn" href="#store">
          <img 
            src="<?php echo get_template_directory_uri() . '/assets/svg/store.svg' ?>" 
            alt="<?php _e( 'Store', 'cornerstore' ) ?>" 
          />
          <?php _e( 'Store', 'cornerstore' ) ?>
        </a>
        <?php
      }
      ?>

      <?php
      // Phone button
      if( get_hero_chat_button() === 1 ) { 
        ?>
        <a class="hero-btn" href="https://api.whatsapp.com/send?phone=<?php echo get_store_phone_number() ?>&text=<?php _e( 'Hello', 'cornerstore' ) ?>" target="_blank">
          <img 
            src="<?php echo get_template_directory_uri() . '/assets/svg/whatsapp.svg' ?>" 
            alt="WhatsApp"
          />
          <?php _e( 'Chat us', 'cornerstore' ) ?>
        </a>
        <?php
      }
      ?>

      <?php
      // Visit button
      if( get_hero_location_button() === 1 ) { 
        ?>
        <a class="hero-btn" href="<?php echo get_store_location() ?>" target="_blank">
          <img 
            src="<?php echo get_template_directory_uri() . '/assets/svg/location.svg' ?>" 
            alt="Location"
          />
          <?php _e( 'Visit us', 'cornerstore' ) ?>
        </a>
        <?php
      }
      ?>

    </div>

  </div>

</section>