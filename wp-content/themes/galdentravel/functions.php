<?php
function galdentravel_menus()
{
    register_nav_menus(array(
        // id => __('Name of your menu', 'text domain of your theme')
        'main-menu' => __('Main menu', 'galdentravel')
    ));
}
// Hook: it indicates that this function must be activated when WordPress is initialized
add_action('init', 'galdentravel_menus');

// Scripts y Styles
function galdentravel_scripts_styles()
{
    //Descriptive name, file path, dependences, version
    wp_enqueue_style('googleFont', 'https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans&display=swap', array(), '1.0.0');
    wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '8.0.1');
    if (is_page('photogallery')) {
        wp_enqueue_style('lightboxCSS', get_template_directory_uri() . '/css/lightbox.min.css', array(), '2.11.0');
    }
    wp_enqueue_style('style', get_stylesheet_uri(), array('normalize', 'googleFont'), '1.0.0');

    if (is_page('photogallery')) {
        wp_enqueue_script('lightboxJS', get_template_directory_uri() . '/js/lightbox.min.js', array('jquery'), '2.11.0', true);
    }

    wp_enqueue_script('scriptsJS', get_template_directory_uri() . '/js/scriptsJS.js', array(), '1.0.0', true);
}
//Hook: it indicates that these styles (and also scripts) are enqueued to be used in the front-end
add_action('wp_enqueue_scripts', 'galdentravel_scripts_styles');

function galdentravel_setup()
{
    add_theme_support('post-thumbnails');
    //Titles SEO
    add_theme_support('title-tag');
    //New sizes
    add_image_size('square', '350', '350', true);
    add_image_size('portrait', '350', '724', false);
    add_image_size('boxes', '375', '375', false);
    add_image_size('med', '700', '400', true);
    add_image_size('blog', '966', '644', false);
}
//Hook: it is activated after the theme is configured
add_action('after_setup_theme', 'galdentravel_setup');



function galdentravel_list_destinations($n)
{
    $args = array(
        'post_type' => 'destinations',
        'posts_per_page' => $n
    );
    $destinations = new WP_Query($args);
?>
    <ul class="list-destinations">
        <?php while ($destinations->have_posts()) {
            $destinations->the_post(); ?>
            <li class='card'>
                <?php the_post_thumbnail('thumbnail'); ?>
                <div class="content">
                    <a href="<?php the_permalink(); ?>">
                        <h3><?php the_title(); ?></h3>
                    </a>
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
                </div>
            </li>
        <?php }
        wp_reset_postdata(); ?>
    </ul>
<?php } ?>



<?php
function galdentravel_list_guides($n)
{
    $args = array(
        'post_type' => 'guides',
        'posts_per_page' => $n
    );
    $guides = new WP_Query($args);
?>
    <ul class="list-guides">
        <?php while ($guides->have_posts()) {
            $guides->the_post(); ?>
            <li class='card'>
                <?php the_post_thumbnail('boxes'); ?>
                <div class="content">
                    <a href="<?php the_permalink(); ?>">
                        <h3><?php the_title(); ?></h3>
                    </a>
                    <?php $name = get_field('guide_name'); ?>
                    <?php $biography = get_field('guide_biography'); ?>
                    <?php $date = get_field('guide_joining_date'); ?>
                    <?php $expertise = get_field('guide_expertise_area'); ?>
                    <p>
                        <?php
                        echo "Name: " . esc_html($name) .
                                " | Biography: " . esc_html($biography) .
                                " | Date Joined: " . esc_html($date) .
                                " | Expertise Area: ";
                            if ($expertise) {
                                // Si hay valores seleccionados, los mostramos separados por comas
                                $first = true;
                                foreach ($expertise as $area) {
                                    if (!$first) {
                                        echo ', ';
                                    }
                                    echo esc_html($area);
                                    $first = false;
                                }
                            } else {
                                // Si no hay valores seleccionados
                                echo 'No se seleccionaron áreas de especialización.';
                            }
                        ?>
                    </p>
                </div>
            </li>
        <?php }
        wp_reset_postdata(); ?>
    </ul>
<?php } ?>



<?php //Define widgets
function galdentravel_widgets()
{
    register_sidebar(array(
        'name' => 'Sidebar single posts',
        'id' => 'sidebar_single_posts',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    register_sidebar(array(
        'name' => 'Sidebar single destinations',
        'id' => 'sidebar_single_destinations',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    register_sidebar(array(
        'name' => 'Sidebar single guides',
        'id' => 'sidebar_single_guides',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}
//Hook: Fires after all default WordPress widgets have been registered
add_action('widgets_init', 'galdentravel_widgets');



function galdentravel_main_image()
{
    //obtain page id
    $front_page_id = get_option('page_on_front');
    //obtain image id
    $id_image = get_field('image_heading', $front_page_id);
    //obtain the image
    $image = wp_get_attachment_image_src($id_image, 'full')[0];
    //CSS
    wp_register_style('custom', false);
    wp_enqueue_style('custom');
    $image_css = "
body.home .site-header{
background-image: linear-gradient(to right,rgba(0,0,0,0.75),rgba
(0,0,0,0.75)),url($image);
}
";
    wp_add_inline_style('custom', $image_css);
}
add_action('init', 'galdentravel_main_image');
