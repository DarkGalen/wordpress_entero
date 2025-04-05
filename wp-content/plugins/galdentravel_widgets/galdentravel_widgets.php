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
            'galdentravel_destinations_widgets', // Base ID
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
            $destino_actual = get_the_ID();
            $args_query = array(
                'post_type' => 'destinations',
                'posts_per_page' => $instance['cantidad'],
                'orderby' => 'rand',
                'post__not_in' => array($destino_actual) 
            );
            $destinations = new WP_Query($args_query);

            while ($destinations->have_posts()) {
                $destinations->the_post();
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
                <?php esc_attr_e('¿Cuántos destinations deseas mostrar?', 'galdentravel'); ?>
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
} // class galdentravel_Destinations_Widget















/**
 * Adds galdentravel_guides widget.
 */
class galdentravel_guides_Widget extends WP_Widget
{

    /**
     * Register widget with WordPress.
     */
    function __construct()
    {
        parent::__construct(
            'galdentravel_guides_widgets', // Base ID
            esc_html__('Guides', 'galdentravel'), // Name
            array('description' => esc_html__('Agrega los guides como widget', 'galdentravel'),) // Args
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
        $instance['title'] = "Other guides";
        if (! empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
    ?>
        <ul>
        <?php
            $guide_actual = get_the_ID();
            $args_query = array(
                'post_type' => 'guides',
                'posts_per_page' => $instance['cantidad'],
                'orderby' => 'rand',
                'post__not_in' => array($guide_actual) 
            );
            $guides = new WP_Query($args_query);

            while ($guides->have_posts()) {
                $guides->the_post();
            ?>
                <li class="sidebar-class">
                    <div class="image">
                        <?php the_post_thumbnail('thumbnail'); ?>
                    </div>
                    <div class="guide-content">
                        <a href="<?php the_permalink() ?>">
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
        $cantidad = ! empty($instance['cantidad']) ? $instance['cantidad'] : esc_html__('¿Cuántos guides deseas mostrar?', 'galdentravel'); ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cantidad')); ?>">
                <?php esc_attr_e('¿Cuántos guides deseas mostrar?', 'galdentravel'); ?>
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
} // class galdentravel_guides_Widget








// register Foo_Widget widget
function galdentravel_register_widgets()
{
    register_widget('galdentravel_Destinations_Widget');
    register_widget('galdentravel_guides_Widget');
}
add_action('widgets_init', 'galdentravel_register_widgets');
?>