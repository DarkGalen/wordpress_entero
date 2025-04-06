<?php
/*
* Template name: Template for galleries
*/

get_header(); ?>

<main class="container">
  <div class="main-content">
    <?php while(have_posts()){ the_post(); ?>
      <h1><?php the_title(); ?></h1>
      <?php
        //Obtain the gallery of this page
        $gallery = get_post_gallery( get_the_ID(), false );
        //Obtain ids
        $gallery_images_ID = explode(',',$gallery['ids']);
      ?>
      <ul class="gallery-images">
        <?php
        $i=1;
          foreach ($gallery_images_ID as $id) {
            if ($i == 3 || $i == 9)
            {
              $imageThumb = wp_get_attachment_image_src( $id, 'portrait')[0];
            }
            else{
              $imageThumb = wp_get_attachment_image_src( $id, 'square')[0];
            }
            $image = wp_get_attachment_image_src( $id, 'large')[0];
            ?>

            <li>
              <a href="<?php echo $image;?>" data-lightbox="gallery">
                <img src="<?php echo $imageThumb; ?>" alt="image">
              </a>
            </li>
         <?php $i++; } ?>
      </ul>
    <?php } ?>
  </div>
</main>


<?php get_footer() ?>
