<?php
/**
 * The header.
 *
 * This is the template that displays all of the 
 * <head> section and everything after the header.
 */

?>

<!doctype html>
<html <?php language_attributes() ?>>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head() ?>
  <?php get_template_part( 'template-parts/style', 'variables' ) ?>
</head>

<body>

<header class="container-xxl">
  <?php get_template_part( 'template-parts/header', 'navbar' ) ?>
</header> 