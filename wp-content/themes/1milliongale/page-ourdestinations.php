<?php
/*
* Template name: page no sidebar
*/
?>
<?php get_header(); /*get the header*/ ?>
<main class="container nosidebar">
    <div class="main-content">
        <p> Prueba de que estas en page-ourdestinations</p>
        <?php while (have_posts()) {
            the_post(); /*initialise WordPress Loop*/ ?>
            <h1><?php the_title(); /*Title of your page*/ ?></h1>
            
        <?php } ?>
        <?php onemilliongale_list_destinations(10); ?>
    </div>
</main>
<?php get_footer() /*get the footer*/ ?>