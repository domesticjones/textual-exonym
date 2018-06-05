<?php
  if (!defined('WPINC')) { die; }
  $autoplaySettings = get_sub_field('autoplay');
  if ($autoplaySettings['enable']) {
    $autoplay = '"autoplay": true, "autoplaySpeed": ' . ($autoplaySettings['speed'] * 1000) . ', ';
    if (!$autoplaySettings['pause_on_hover']) { $autoplay .= '"pauseOnHover": false, '; }
    if (!$autoplaySettings['pause_on_click']) { $autoplay .= '"pauseOnFocus": false, '; }
  } else {
    $autoplay = '"autoplay": false, ';
  }
  $transitionSettings = get_sub_field('transition');
  $transition = '';
  if ($transitionSettings['type'] == 'fade') { $transition = '"fade": true, '; }
  $speed = '"speed": ' . ($transitionSettings['speed'] * 1000) . ', ';
  $easing = '"cssEase": "' . $transitionSettings['animation'] . '", ';
  $navSettings = get_sub_field('navigation');
  $arrows = '';
  $dots = '';
  if (!$navSettings['arrows']) { $arrows = '"arrows": false, '; }
  if ($navSettings['dots']) { $dots = '"dots": true, '; }
  $sliderSettingsCloser = '"infinite": true';
  $sliderSettings = " data-slick='{" . $autoplay . $speed . $easing . $arrows . $dots . $transition . $sliderSettingsCloser . "}'";
  if(have_rows('slides')) {
    echo '<nav class="slideshow-nav"></nav><section class="module-slideshow-container"' . $sliderSettings . '>';
    while(have_rows('slides')): the_row();
      $height = get_sub_field('height');
      $padding = get_sub_field('padding');
      $heightPrint = 'height: ' . $height['amount'] . $height['kind'] . ';';
      $paddingSettings = get_sub_field('padding');
      $padding = ' padding: ';
      $padding .= $paddingSettings['top'] . 'rem ';
      $padding .= $paddingSettings['right'] . 'rem ';
      $padding .= $paddingSettings['bottom'] . 'rem ';
      $padding .= $paddingSettings['left'] . 'rem;';
    ?>
      <div>
        <section class="module-slide-content-wrap<?php echo exCon_bgColor() . exCon_textStyles(); ?>" style="<?php echo $heightPrint; ?>">
          <?php exCon_containerBgImage(); ?>
          <div class="module-slide-inner<?php echo exCon_align() . exCon_maxWidth(); ?>" style="<?php echo exCon_widthInner() . $padding; ?>">
            <?php
              ex_cta('above');
              the_sub_field('slide_content');
              ex_cta('below');
            ?>
          </div>
        </section>
      </div>
    <?php endwhile;
    echo '</section>';
  }
?>
