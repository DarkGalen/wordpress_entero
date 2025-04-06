<?php 
/*
* Template name: Template for about us
*/
get_header(); /*get the header*/ ?>
<main class="container">
    <div class="main-content">
        <?php while (have_posts()) {
            the_post(); /*initialise WordPress Loop*/ ?>
            <h1><?php the_title(); /*Title of your page*/ ?></h1>
            <p><?php the_content(); /*Content of your page*/ ?></p>
        <?php } ?>
        <?php galdentravel_list_guides(10); ?>
    </div>
</main>
<?php get_footer() /*get the footer*/ ?>