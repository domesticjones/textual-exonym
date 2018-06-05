<?php if(have_posts()):while (have_posts()): the_post(); ?>
  <article id="article-<?php the_ID(); ?>" <?php post_class('article-single-wrap'); ?> role="article" itemprop="blogPost" itemtype="http://schema.org/BlogPosting">
    <header class="article-header">
      <?php
        if(has_post_format(array('video', 'audio', 'image'))) {
          post_format_header();
        } else {
          the_post_thumbnail($post->ID, 'large');
        }
      ?>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <h2 class="entry-date"><?php the_date(); ?></h2>
    </header>
    <section>
      <?php
        if(has_post_format('quote')) { echo '<blockquote class="post-format-quote">' . get_field('post_quote') . '</blockquote>'; }
        the_content();
        ex_post_pagination();
      ?>
    </section>
    <footer>
      <?php
        post_format_footer();
        comments_template();
      ?>
    </footer>
  </article>
<?php endwhile; endif; ?>
