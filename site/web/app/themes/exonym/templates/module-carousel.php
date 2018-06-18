<?php
  $carouselQueryArgs = array(
  	'post_type'              => array('case_study'),
  	'posts_per_page'         => '5',
  	'orderby'                => 'rand',
  );
  $carouselQuery = new WP_Query($carouselQueryArgs);
  if($carouselQuery->have_posts()): ?>
  <section id="module-carousel" class="animate-on-enter wrap">
  	<?php while($carouselQuery->have_posts()): $carouselQuery->the_post(); ?>
      <?php
        $website = get_field('website');
        $gallery = get_field('gallery');
        $gallerySize = 'medium';
      ?>
      <div>
        <div class="carousel-container">
          <?php if(has_post_thumbnail()) {
            the_post_thumbnail('small');
          } else {
            echo '<h2>Business Name</h2>';
          } ?>
          <h3>Case Study</h3>
          <div class="carousel-quote"><?php the_field('testimonial'); ?></div>
          <div class="carousel-text"><?php the_field('description'); ?></div>
          <?php if(!empty($website)): ?>
            <a href="<?php echo $website['url']; ?>" target="<?php echo $website['target']; ?>" class="carousel-button">
              <button type="button">
      					<span><?php echo $website['title']; ?></span>
      					<span class="button-arrow"><?php echo file_get_contents(asset_path('images/icon-arrow.svg')); ?></span>
              </button>
            </a>
          <?php endif; ?>
          <?php if($gallery): ?>
            <aside class="carousel-images">
              <?php foreach($gallery as $image): ?>
                <div style="background-image: url(<?php echo $image['sizes'][$gallerySize]; ?>);"><span><?php echo $image['alt']; ?></span></div>
              <?php endforeach; ?>
              <?php if(count($gallery) > 1): ?>
                <nav class="carousel-images-nav">
                  <button class="carousel-images-prev">
          					<span class="carousel-images-nav-label">Previous</span>
          					<span class="button-arrow"><?php echo file_get_contents(asset_path('images/icon-arrow.svg')); ?></span>
                  </button>
                  <button class="carousel-images-next">
          					<span class="carousel-images-nav-label">Next</span>
          					<span class="button-arrow"><?php echo file_get_contents(asset_path('images/icon-arrow.svg')); ?></span>
                  </button>
                </nav>
              <?php endif; ?>
            </aside>
          <?php endif; ?>
        </div>
      </div>
  	<?php endwhile; ?>
    <nav id="carousel-count"><div id="carousel-count-number"><i class="current">1</i>/<i class="total"><?php echo $carouselQuery->post_count; ?></i></div></nav>
  </section>
<?php endif; wp_reset_postdata(); ?>
