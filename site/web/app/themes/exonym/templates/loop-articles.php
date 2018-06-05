<?php
  $layout = get_field('news_layout', 'options');
  $layoutClass = 'news-layout-' . $layout;
  $image = '';
  $newest = wp_get_recent_posts(array('numberposts' => 1));
  $newestID = '';
  $animateScroll = get_field('article_animation_animate_on_scroll', 'options');
  $animateEnterVal = $animateScroll['enter'];
  $animateLeaveVal = $animateScroll['leave'];
  $animateHoverVal = get_field('article_animation_animate_on_hover', 'options');
  $animateEnter = '';
  $animateLeave = '';
  $animateHover = '';
  if($animateEnterVal) {
    $animateEnter = ' animate-on-enter';
  }
  if($animateLeaveVal) {
    $animateLeave = ' animate-on-leave';
  }
  if($animateHoverVal) {
    $animateHover = ' animate-on-hover';
  }
  $animate = $animateEnter . $animateLeave . $animateHover;
  foreach($newest as $new) { $newestID = $new['ID']; }

?>

<?php if(have_posts()): ?>
  <section class="news-index <?php echo $layoutClass; ?>">
    <?php while(have_posts()): the_post(); ?>
      <?php
        $id = get_the_ID();
        $date = '<time datetime="' . get_the_date('Y-m-d') . '">' . get_the_date('F j, Y') . '</time>';
        $newestArticle = '';
        if(has_post_thumbnail()) {
          $image = get_the_post_thumbnail_url($post->ID, 'large');
        }
        if($newestID === $id) {
          $newestArticle = ' article-archive-newest';
        }
      ?>
      <article id="article-<?php the_ID(); ?>" <?php post_class('module-article-single' . $newestArticle . $animate); ?> role="article" itemprop="blogPost" itemtype="http://schema.org/BlogPosting">
        <?php if($image) { echo '<a href="' . get_the_permalink() . '" class="module-article-image" style="background-image: url(' . $image . ');">' . $date . '</a>'; }  ?>
        <div class="module-article-content">
          <a href="<?php the_permalink(); ?>">
            <h2><?php the_title(); ?></h2>
          </a>
          <?php
            the_excerpt();
            echo post_format_permalink();
          ?>
        </div>
      </article>
    <?php endwhile; ?>
  </section>
  <?php ex_page_navi(); ?>
<?php endif; ?>
