<?php
  if (!defined('WPINC')) { die; }
?>
<?php if(get_sub_field('heading')): ?>
  <h2 class="columns-heading <?php if(get_sub_field('heading_border')) { echo ' column-border'; } ?>">
    <?php the_sub_field('heading'); ?>
  </h2>
<?php
  endif;
  if(get_sub_field('heading')):
?>
  <h3 class="columns-heading <?php if(get_sub_field('sub-heading_border')) { echo ' column-border'; } ?>">
    <?php the_sub_field('sub-heading'); ?>
  </h3>
<?php
  endif;
  $columnSettings = exCon_columnSettings();
  if (have_rows('columns')):
?>
  <div class="module-columns-wrap">
    <?php while (have_rows('columns')): the_row(); ?>
      <div class="column-single" style="<?php echo $columnSettings; ?>">
        <?php the_sub_field('column'); ?>
      </div>
    <?php endwhile; ?>
  </div>
<?php endif; ?>
