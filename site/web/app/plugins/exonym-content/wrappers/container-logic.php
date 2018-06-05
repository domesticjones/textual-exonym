<?php
  if (!defined('WPINC')) { die; }

  // TAB: Styling - BgColor
  function exCon_bgColor() {
    $bgOptions = get_sub_field('background');
    $output = ' module-bg-color-' . $bgOptions['color'];
    return $output;
  }

  // TAB: Grid - Width
  function exCon_width() {
    if (get_row_layout() == 'slideshow') {
      $output = ' module-x-' . get_sub_field('width');
    } else {
      $gridOptions = get_sub_field('container');
      $output = ' module-x-' . $gridOptions['size']['width'];
    }
    return $output;
  }

  // TAB: Grid - Padding
  function exCon_padding() {
    $gridOptions = get_sub_field('container');
    $padding = $gridOptions['padding'];
    $output = '';
    if ($gridOptions && get_row_layout() != 'slideshow') {
      $output = 'padding: ';
      $output .= $padding['top'] . 'rem ';
      $output .= $padding['right'] . 'rem ';
      $output .= $padding['bottom'] . 'rem ';
      $output .= $padding['left'] . 'rem;';
    }
    return $output;
  }

  // TAB: Grid - Height
  function exCon_height() {
    $gridOptions = get_sub_field('container');
    $height = $gridOptions['size']['height'];
    $number = $height['amount'];
    $property = $height['kind'];
    $output = '';
    if ($gridOptions && get_row_layout() != 'slideshow') {
      $output = 'min-height: ' . $number . $property . '; ';
    }
    return $output;
  }

  // TAB: Animate - Enter/Leave
  function exCon_animation() {
    $aniOptions = get_sub_field('animate');
    $output = '';
    if ($aniOptions['enter']) {
      $output .= ' animate-on-enter';
    }
    if ($aniOptions['leave']) {
      $output .= ' animate-on-leave';
    }
    return $output;
  }

  // TAB: Responsive
  function exCon_responsive() {
    $mobile = get_sub_field('mobile_hide');
    $desktop = get_sub_field('desktop_hide');
    $output = '';
    if ($mobile) {
      $output .= ' module-hide-mobile';
    }
    if ($desktop) {
      $output .= ' module-hide-desktop';
    }
    return $output;
  }

  // TAB: Animate - Parallax
  function exCon_parallax() {
    $parallax = get_sub_field('parallax');
    $output = '';
    if ($parallax != 'none' && get_row_layout() != 'slideshow') {
      $output = ' animate-parallax animate-z-' . $parallax;
    }
    return $output;
  }

  // TAB: Advanced - Classes
  function exCon_customClasses() {
    $output = '';
    if (get_sub_field('custom_classes')) {
      $output = ' ' . get_sub_field('custom_classes');
    }
    return $output;
  }

  // OUTPUT: Background Image
  function exCon_containerBgImage() {
    $gridSize = get_sub_field('container')['size']['width'];
    $bgOptions = get_sub_field('background');
    $opacity = $bgOptions['image_opacity'] / 100;
    $color = $bgOptions['color'];
    $sizeChoice = '';
    if ($gridSize > 6) {
      $sizeChoice = 'jumbo';
    } else {
      $sizeChoice = 'large';
    }
    $image = $bgOptions['image']['sizes'][$sizeChoice];
    if (!empty($image)) {
    ?>
      <div class="module-bg" style="opacity: <?php echo $opacity; ?>; background-image: url(<?php echo $image; ?>)">
        <span><?php echo $bgOptions['image']['alt']; ?></span>
      </div>
    <?php
    }
  }

  // OUTPUT: Style ID
  function exCon_containerId() {
    if(get_sub_field('custom_id')) {
      echo 'id="' . get_sub_field('custom_id') . '" ';
    }
  }

  // OUTPUT: Class List
  function exCon_containerClass() {
    echo 'module module-' . get_row_layout() . exCon_width() . exCon_animation() . exCon_parallax() . exCon_responsive() . exCon_bgColor() . exCon_customClasses();
  }

  // OUTPUT: Inline Styles
  function exCon_containerInline() {
    echo exCon_height() . exCon_padding();
  }
?>
