<?php
  if (!defined('WPINC')) { die; }

  $carouselOptions = get_sub_field('carousel_options');
  $amountToShow = $carouselOptions['slides_to_show'];
  $arrows = $carouselOptions['show_arrows'];
  $arrowsShow = '';
  if ($arrows) {
    $arrowsShow = ', "arrows": true';
  }
  $auto = $carouselOptions['autoplay'];
  $autoPlay = '';
  if ($auto) {
    $autoPlay = ', "autoplay": true';
  }
  $slickOptions = '"slidesToShow":'  . $amountToShow . $autoPlay . $arrowsShow;

  if (have_rows('carousel_slides')):
?>
  <nav class="slideshow-nav"></nav>
  <section class="carousel-wrapper" data-slick='{<?php echo $slickOptions; ?>}'>
    <?php while (have_rows('carousel_slides')): the_row(); ?>
      <?php
        $wrapStart = exCon_carouselWrap('start');
        $wrapEnd = exCon_carouselWrap('end');
        if (get_row_layout() == 'custom_content') {
          echo $wrapStart;
          ex_cta('above');
          exCon_containerBgImage();
          the_sub_field('custom_content_area');
          ex_cta('below');
          echo $wrapEnd;
        } elseif (get_row_layout() == 'posts') {
          $postCount = get_sub_field('number_of_blog_posts');
          $modulePostsArgs = array(
            'post_type'       => array('post'),
            'nopaging'        => true,
            'posts_per_page'  => $postCount,
          );
          $modulePosts = new WP_Query($modulePostsArgs);
          if ($modulePosts->have_posts()) {
            while ($modulePosts->have_posts()) {
              $modulePosts->the_post();
              echo $wrapStart;
                exCon_carouselPost();
              echo $wrapEnd;
            }
            wp_reset_postdata();
          }
        } elseif (get_row_layout() == 'testimonials' && function_exists('exTestis') ) {
          $testimonialCount = get_sub_field('number_of_blog_posts');
          $moduleTestimonialArgs = array(
            'post_type'       => array('testimonial'),
            'nopaging'        => true,
            'orderby'         => 'rand',
            'posts_per_page'  => $testimonialCount,
          );
          $moduleTestimonials = new WP_Query($moduleTestimonialArgs);
          if ($moduleTestimonials->have_posts()) {
            while ($moduleTestimonials->have_posts()) {
              $moduleTestimonials->the_post();
              echo $wrapStart;
                the_content();
                echo '<h3 class="testimonial-name">' . get_the_title() . '</h3>';
              echo $wrapEnd;
            }
            wp_reset_postdata();
          }
        }
      ?>
    <?php endwhile; ?>
  </section>
<?php endif; ?>
