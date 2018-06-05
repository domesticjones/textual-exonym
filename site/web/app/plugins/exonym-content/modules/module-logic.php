<?php
  if (!defined('WPINC')) { die; }

  // CAROUSEL: Wrapper
  function exCon_carouselWrap($position) {
    $output = '';
    if ($position == 'start') {
      $output = '<div><section class="carousel-slide-wrap' . exCon_bgColor() . exCon_align() . '">';
      $output .= '<div class="carousel-slide-inner' . exCon_textStyles() . '">';
    } elseif ($position == 'end') {
      $output = '</div></section></div>';
    }
    return $output;
  }

  // CAROUSEL: Carousel Post
  function exCon_carouselPost() {
    echo '<a href="' . get_the_permalink() . '" class="module-carousel-post-link">';
    echo '<h2 class="module-carousel-post-title">' . get_the_title() . '</h2>';
    the_post_thumbnail('thumbnail', array('class' => 'alignright'));
    echo '<time datetime="' . get_the_date('Y-m-d') . '">' . get_the_date('F j, Y') . '</time>';
    echo '<p class="module-carousel-post">' . get_the_excerpt() . '</p>';
    echo '</a>';
  }

  // MULTI-COLUMN: Column width & Padding
  function exCon_columnSettings() {
    $width = get_sub_field('column_width');
    $pad = get_sub_field('column_inner_padding');
    $padding = $pad['top'] . 'rem ' . $pad['right'] . 'rem ' . $pad['bottom'] . 'rem ' . $pad['left'] . 'rem;';
    $output = 'width: ' . $width . '%; padding: ' . $padding;
    return $output;
  }
