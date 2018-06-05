<?php
  if (!defined('WPINC')) { die; }

  $images = get_sub_field('gallery_images');
  $display = get_sub_field('gallery_display');
  $size = get_sub_field('image_size');
  $style = '';
  $class = '';
  if ($display == 'grid') {
    $gridOptions = get_sub_field('image_grid');
    $gridEach = 100 / $gridOptions['row_count'];
    $gridPad = $gridOptions['padding'];
    $style = ' style="width: ' . $gridEach . '%; padding: ' . $gridPad . 'px;"';
    $class = ' gallery-wrap-' . $gridOptions['alignment']['x'] . ' gallery-item-align-' . $gridOptions['alignment']['y'];
  } elseif($display == 'slideshow') {
    $sliderOptions = get_sub_field('image_slideshow');
    $auto = '';
    $dots = '"dots": false, ';
    $arrows = '"arrows": false';
    if ($sliderOptions['auto']) {
      $speed = $sliderOptions['autoplay_speed'] * 1000;
      $auto = '"autoplay": true, "autoplaySpeed": ' . $speed . ', ';
    }
    if ($sliderOptions['dots']) {
      $dots = '"dots": true, ';
    }
    if ($sliderOptions['arrows']) {
      $arrows = '"arrows": true';
    }
    $slickData = '{' . $auto . $dots . $arrows . '}';
    $class = ' module-gallery-slideshow"';
    $class .= " data-slick='" . $slickData . "'";
  }
?>
<?php if($images): ?>
  <ul class="module-gallery-wrap<?php echo $class; ?>">
    <?php foreach($images as $image): ?>
      <li class="gallery-item"<?php echo $style; ?>>
        <img src="<?php echo $image['sizes'][$size]; ?>" alt="<?php echo $image['alt']; ?>" />
      </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>
