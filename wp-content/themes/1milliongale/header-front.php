<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <?php wp_head(); ?>
  <title></title>
</head>
<body <?php body_class(  ); ?>>
  <header class="site-header">
    <div class="container">
      <div class="navigation-bar">
        <div class="logo">
          <?php $path = get_template_directory_uri(); ?>
          <a href="<?php echo site_url( '/'); ?>">
            <img src="<?php echo $path ?>/img/logo.png" alt="logo IMG">
          </a>
        </div>
        <div class="mobile-menu">
          <span></span>
          <span></span>
          <span></span>
        </div>
        <?php
        $args = array(
          // Indicate the menu you want to include
          'theme-location' => 'main-menu',
          // Indicate the type of container for your menu
          'container' => 'nav',
          // Indicate a personalized class for your container
          'container_class' => 'main-menu'
        );
        wp_nav_menu($args);
        ?>
      </div>
      <div class="tagline text-center">
        <h1><?php the_field('title_heading'); ?></h1>
        <p><?php the_field('content_heading'); ?></p>
      </div>
    </div>
  </header>
