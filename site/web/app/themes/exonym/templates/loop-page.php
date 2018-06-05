<?php if(have_posts()):while (have_posts()): the_post(); ?>
  <article id="page-<?php the_ID(); ?>" <?php post_class('content-module-wrap'); ?> role="article" itemprop="blogPost" itemtype="http://schema.org/BlogPosting">
    <?php // content_modules(); ?>
  </article>
<?php endwhile; endif; ?>
