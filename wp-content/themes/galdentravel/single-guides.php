<?php get_header(); /*get the header*/ ?>
<main class="container withsidebar">
    <div class="main-content">
        <?php while (have_posts()) {
            the_post(); /*initialise WordPress Loop*/ ?>
            <h1><?php the_title();/*Title of your page */ ?></h1>
            <?php the_post_thumbnail('medium_large', array('class' => 'image-class')); /*Image*/ ?>
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
            <p><?php the_content(); /*Content of your page*/ ?></p>
        <?php } ?>
    </div>
    <?php get_sidebar('guides'); ?>
</main>
<?php get_footer() /*get the footer*/ ?>