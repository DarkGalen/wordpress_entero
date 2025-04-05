<?php get_header(); ?>
<main class="container withsidebar entry">
    prueba de que estas en single
    <div class="main-content">
        <?php while (have_posts()) {
            the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <?php the_post_thumbnail('blog', array('class' => 'image-class'));
            ?>
            <p class="meta">
                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                    <?php echo get_the_author_meta('display_name'); ?>
                </a> -
                <?php the_time($d = 'd/m/Y'); ?>
            </p>
            <p><?php the_content(); ?></p>
        <?php } ?>
    </div>
    <?php get_sidebar(); ?>
</main>
<?php get_footer() ?>