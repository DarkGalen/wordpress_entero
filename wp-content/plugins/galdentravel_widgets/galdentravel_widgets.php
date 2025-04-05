<?php
/*
Plugin Name: Galden Travel - Widgets
Plugin URI:
Description: Añade Widgets personalizado al sitio Galden Travel
Version: 1.0.0
Author: Carlos Galeano Torres, Diego Caldentey Largaespada
Author URI: https://www.uloyola.com
Text Domain: galdentravel
*/

if (!defined('ABSPATH')) die(); //Previene que se vea de forma directa el plugin

/**
 * Adds galdentravel_destinations widget.
 */
class galdentravel_Destinations_Widget extends WP_Widget
{

    /**
     * Register widget with WordPress.
     */
    function __construct()
    {
        parent::__construct(
            'galdentravel_widgets', // Base ID
            esc_html__('Destinations', 'galdentravel'), // Name
            array('description' => esc_html__('Agrega los destinos como widget', 'galdentravel'),) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        $instance['title'] = "Other destinations";
        if (! empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
?>
        <ul>
            <?php
            $args_query = array(
                'post_type' => 'destinations',
                'posts_per_page' => $instance['cantidad'],
                'orderby' => 'rand'
            );
            $destinations = new WP_Query($args_query);
            while ($destinations->have_posts()) {
                $destinations->the_post();
                if (get_the_ID() === get_queried_object_id()) {
                    continue; // Skip the current post
                }
            ?>
                <li class="sidebar-class">
                    <div class="image">
                        <?php the_post_thumbnail('thumbnail'); ?>
                    </div>
                    <div class="destination-content">
                        <a href="<?php the_permalink() ?>">
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

    <?php
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance)
    {
        $cantidad = ! empty($instance['cantidad']) ? $instance['cantidad'] : esc_html__('¿Cuántos destinations deseas mostrar?', 'galdentravel'); ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cantidad')); ?>">
                <?php esc_attr_e('¿Cuántos destinations deseas mostrar?', 'loyolagames'); ?>
            </label>

            <input
                class="widefat"
                id="<?php echo esc_attr($this->get_field_id('cantidad')); ?>"
                name="<?php echo esc_attr($this->get_field_name('cantidad')); ?>"
                type="number"
                value="<?php echo esc_attr($cantidad); ?>">
        </p>
<?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['cantidad'] = (! empty($new_instance['cantidad'])) ? sanitize_text_field($new_instance['cantidad']) : '';
        return $instance;
    }
} // class Loyolagames_Videogames_Widget

// register Foo_Widget widget
function galdentravel_register_widgets()
{
    register_widget('galdentravel_Destinations_Widget');
}
add_action('widgets_init', 'galdentravel_register_widgets');
?>