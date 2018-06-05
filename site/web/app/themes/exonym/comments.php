<?php
  /* =================
     COMMENTS TEMPLATE
     ================= */

// Check to see if this is turned off via Utilities
if(!get_field('disable_comments', 'options')) {

  // Don't load it if you can't comment
  if(post_password_required()) {
    return;
  }

  if(have_comments()): ?>
    <h3 id="comments-title"><?php comments_number( __( '<span>No</span> Comments', 'exonym' ), __( '<span>One</span> Comment', 'exonym' ), __( '<span>%</span> Comments', 'exonym' ) );?></h3>
    <section class="commentlist">
      <?php
        wp_list_comments(array(
          'style'             => 'div',
          'short_ping'        => true,
          'avatar_size'       => 40,
          'callback'          => '',
          'type'              => 'all',
          'reply_text'        => __('Reply', 'exonym'),
          'page'              => '',
          'per_page'          => '',
          'reverse_top_level' => null,
          'reverse_children'  => ''
        ));
      ?>
    </section>
    <?php if(get_comment_pages_count() > 1 && get_option('page_comments')): ?>
      <nav class="navigation comment-navigation" role="navigation">
        <div class="comment-nav-prev"><?php previous_comments_link( __( '&larr; Previous Comments', 'exonym' ) ); ?></div>
        <div class="comment-nav-next"><?php next_comments_link( __( 'More Comments &rarr;', 'exonym' ) ); ?></div>
      </nav>
    <?php endif; ?>
    <?php if(!comments_open()) : ?>
      <p class="no-comments"><?php _e('Comments are closed.' , 'exonym'); ?></p>
    <?php endif; ?>
  <?php endif; ?>
  <?php comment_form(); ?>

<?php
// End check to see if comments are enabled
} ?>
