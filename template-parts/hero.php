<?php
/*
 * Displays the hero section
 */

?>


<section id="hero">

  <div id="hero-content">

    <h1 class="hero-title"><?php echo get_hero_primary_text() ?></h1>
    <p class="hero-copy"><?php echo get_hero_secondary_text() ?></p>
    <div class="hero-calls-to-actions-container"><?php get_template_part( 'template-parts/hero', 'calls-to-action' ) ?></div>

  </div>

</section>