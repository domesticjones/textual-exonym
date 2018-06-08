<?php if(have_rows('features')): ?>
  <ul class="module-features" class="animate-on-enter">
    <?php
      while(have_rows('features')):
      the_row();
      $featureHeading = get_sub_field('heading');
    ?>
      <li class="animate-on-enter">
        <div class="feature-heading">
          <?php if(!empty($featureHeading['icon'])) { echo '<img src="' . $featureHeading['icon']['url'] . '" alt="' . $featureHeading['icon']['alt'] . '" class="feature-heading-icon" />'; } ?>
          <div class="feature-heading-text">
            <?php if(!empty($featureHeading['headline'])) { echo '<h2>' . $featureHeading['headline'] . '</h2>'; } ?>
            <?php if(!empty($featureHeading['headline'])) { echo '<h3>' . $featureHeading['sub_headline'] . '</h3>'; } ?>
          </div>
        </div>
        <div class="feature-heading-description"><?php the_sub_field('description'); ?></div>
      </li>
    <?php endwhile; ?>
    <?php
      $featureLink = get_field('feature_link');
      if(!empty($featureLink)):
    ?>
      <li class="feature-button animate-on-enter">
        <a href="<?php echo $featureLink['url']; ?>" target="<?php echo $featureLink['target']; ?>">
          <button type="button">
            <span><?php echo $featureLink['title']; ?></span>
            <span class="button-arrow"><?php echo file_get_contents(asset_path('images/icon-arrow.svg')); ?></span>
          </button>
        </a>
      </li>
    <?php endif; ?>
  </ul>
<?php endif; ?>
