<?php get_header(); ?>
<h1>Author: <?php echo get_queried_object()->data->display_name; ?></h1>
<main class="container nosidebar">
    <ul class="list-blog">
        <?php while (have_posts()) {
            the_post(); ?>
            <li class="card">
                <?php the_post_thumbnail('med'); ?>
                <div class="content">
                    <a href="<?php the_permalink(); ?>">
                        <h3><?php the_title(); ?></h3>
                    </a>
                    <p class="meta">
                        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                            <?php echo get_the_author_meta('display_name'); ?>
                        </a> -
                        <?php the_time($d = 'd/m/Y'); ?>
                    </p>
                    <?php the_category(); ?>
                </div>
            </li>
        <?php } ?>
    </ul>
</main>
<?php get_footer(); ?>