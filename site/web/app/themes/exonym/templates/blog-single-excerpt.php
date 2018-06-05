<article id="post-<?php the_ID(); ?>" <?php post_class('entry-content'); ?> role="article" itemprop="blogPost" itemtype="http://schema.org/BlogPosting">
  <div class="article-thumb">
    <?php if(has_post_thumbnail()): ?>
      <?php the_post_thumbnail('medium'); ?>
    <?php endif; ?>
  </div>
  <header class="article-header">
    <h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
    <p class="entry-meta"><?php ex_post_meta(); ?></p>
  </header>
  <section itemprop="text">
    <?php the_excerpt(); ?>
  </section>
  <footer class="article-footer">
    <p class="entry-meta">
      <?php ex_comment_count(); ?><br />
      <?php ex_categories(); ?><br />
      <?php ex_tags(); ?>
    </p>
  </footer>
</article>
