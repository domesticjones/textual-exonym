<?php
  if (!defined('WPINC')) { die; }

  $staff = get_sub_field('staff_members', false, false);
  $staffArgs = array(
    'post_type'       => 'staff',
    'posts_per_page'  => 99,
    'post__in'        => $staff,
    'orderby'         => 'post__in'
  );
  $staffPosts = new WP_Query($staffArgs);
  if ($staffPosts->have_posts()):
?>
  <ul class="module-staff-wrap">
    <?php
      while ($staffPosts->have_posts()): $staffPosts->the_post();
        get_template_part('modules/module', 'staff');
      endwhile;
    ?>
  </ul>
<?php wp_reset_postdata(); endif; ?>
