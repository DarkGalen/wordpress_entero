<?php
function loyolagames_menus()
{
    register_nav_menus(array(
        // id => __('Name of your menu', 'text domain of your theme')
        'main-menu' => __('Main menu', 'loyolagames')
    ));
}
// Hook: it indicates that this function must be activated when WordPress is initialized
add_action('init', 'loyolagames_menus');

// Scripts y Styles
function loyolagames_scripts_styles()
{
    //Descriptive name, file path, dependences, version
    wp_enqueue_style('normalize', get_template_directory_uri() . '
    /css/normalize.css', array(), '8.0.1');
    wp_enqueue_style('googleFont', 'https://fonts.googleapis.com/
    css?family=Open+Sans|Oswald|PT+Sans&display=swap', array(), '
    1.0.0');
    wp_enqueue_style('style', get_stylesheet_uri(), array(
        'normalize',
        'googleFont'
    ), '1.0.0');
}
//Hook: it indicates that these styles (and also scripts) are enqueued to be used in the front-end
add_action('wp_enqueue_scripts', 'loyolagames_scripts_styles');

function loyolagames_setup()
{
    add_theme_support('post-thumbnails');
    //Titles SEO
    add_theme_support('title-tag');
    //New sizes
    add_image_size('square', '350', '350', true);
    add_image_size('portrait', '350', '724', true);
    add_image_size('boxes', '375', '375', true);
    add_image_size('med', '700', '400', true);
    add_image_size('blog', '966', '644', true);
}
//Hook: it is activated after the theme is configured
add_action('after_setup_theme', 'loyolagames_setup');



function loyolagames_list_videogames($n)
{
    $args = array(
        'post_type' => 'videogames',
        'posts_per_page' => $n
    );
    $games = new WP_Query($args);
?>
    <ul class="list-games">
        <?php while ($games->have_posts()) {
            $games->the_post(); ?>
            <li class='card'>
                <?php the_post_thumbnail('med'); ?>
                <div class="content">
                    <a href="<?php the_permalink(); ?>">
                        <h3><?php the_title(); ?></h3>
                    </a>
                    <?php $company = get_field('company'); ?>
                    <?php $date = get_field('release'); ?>
                    <?php $price = get_field('price'); ?>
                    <p><?php echo "<span> " . $company . "</span> : " . $date . " - " . $price; ?> </p>
                    <div class="genre">
                        <?php
                        $genre = get_field('genre');
                        foreach ($genre as $g) { ?>
                            <span class="genre-i"><?php echo esc_html($g); ?></span>
                        <?php } ?>
                    </div>
                </div>
            </li>
        <?php }
        wp_reset_postdata(); ?>
    </ul>
<?php } ?>