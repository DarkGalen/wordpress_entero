<?php get_header('front'); ?>

<section class="welcome container">
    <h2><?php the_field('title_welcome'); ?></h2>
    <p><?php the_field('content_welcome'); ?></p>
</section>

<section class="main-destinations">
    <div class="container">
        <h2>Our destinations</h2>
        <?php galdentravel_list_destinations(3); ?>
        <div class="button-container">
            <a href="<?php echo esc_url(get_permalink(get_page_by_title('Our Destinations'))); ?>" class="button">See All</a>
        </div>
    </div>
</section>

<section class="guides">
    <div class="container">
        <h2> Our guides </h2>
        <p>Specialized guides to support you in the best way</p>
        <ul class="guides-list">
            <?php galdentravel_list_guides(3); ?>
        </ul>
    </div>
</section>

<p id="date-countdown">
    <?php the_field('date_countdown'); ?>
</p>
<section class="countdown">
    <div class="container">
        <h2> Next conference </h2>
        <div class="countdown-numbers">
            <div class="days">
                <p class="number" id="days"> </p>
                <p class="countdown-tag"> days </p>
            </div>
            <div class="hours">
                <p class="number" id="hours"> </p>
                <p class="countdown-tag"> hours </p>
            </div>
            <div class="minutes">
                <p class="number" id="minutes"> </p>
                <p class="countdown-tag"> minutes </p>
            </div>
            <div class="seconds">
                <p class="number" id="seconds"> </p>
                <p class="countdown-tag"> seconds </p>
            </div>
        </div>
    </div>
</section>

<section class="blog container">
    <h2>Our blog</h2>
    <p>Learn tips with our professional team</p>
    <ul class="list-blog">
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 4
        );
        $blog = new WP_Query($args);
        while ($blog->have_posts()) {
            $blog->the_post(); ?>
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
</section>

<?php get_footer(); ?>