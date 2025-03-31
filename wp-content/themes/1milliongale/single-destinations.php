<?php get_header(); /*get the header*/ ?>
<main class="container withsidebar">
    <div class="main-content">
        <?php while (have_posts()) {
            the_post(); /*initialise WordPress Loop*/ ?>
            <h1><?php the_title();/*Title of your page */ ?></h1>
            <?php the_post_thumbnail('blog', array('class' => 'image-class')); /*Image*/ ?>
            <?php $description = get_field('destination_shortDescription'); ?>
            <?php $price = get_field('destination_price'); ?>
            <?php $itinerary = get_field('destination_itinerary'); ?>
            <p>
                <?php
                echo esc_html($description) .
                    " | Price: " . esc_html($price) .
                    " | Itinerary: " . esc_html($itinerary);
                ?>
            </p>
            <p><?php the_content(); /*Content of your page*/ ?></p>
        <?php } ?>
    </div>
    <?php get_sidebar('destinations'); ?>
</main>
<?php get_footer() /*get the footer*/ ?>