<?php
/*
* Template name: page no sidebar
*/
?>
<?php get_header(); /*get the header*/ ?>
<main class="container nosidebar">
    <div class="main-content">
        <?php while (have_posts()) {
            the_post(); /*initialise WordPress Loop*/ ?>
            <h1><?php the_title(); /*Title of your page*/ ?></h1>
            
        <?php } ?>
    </div>
</main>
<?php get_footer() /*get the footer*/ ?>