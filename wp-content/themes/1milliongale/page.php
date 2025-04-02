<?php get_header(); /*get the header*/ ?>
<main class="container withsidebar">
    <div class="main-content">
        <?php while (have_posts()) {
            the_post(); /*initialise WordPress Loop*/ ?>
            <h1><?php the_title();/*Title of your page */ ?></h1>
            <?php the_post_thumbnail('blog', array('class' => 'image-class')); /*Image*/ ?>
            <p><?php the_content(); /*Content of your page*/ ?></p>
        <?php } ?>
    </div>
    <?php get_sidebar(); ?>
</main>
<?php get_footer() /*get the footer*/ ?>