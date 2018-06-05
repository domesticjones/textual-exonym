<?php
  if (!defined('WPINC')) { die; }

  // TAB: Styling - Text
  function exCon_textStyles() {
    $gridText = get_sub_field('text');
    $textSize = ' module-text-size-' . $gridText['size'];
    $textColor = ' module-text-color-' . $gridText['text_color'];
    $textLink = ' module-link-color-' . $gridText['link_color'];
    $textHeading = ' module-heading-color-' . $gridText['heading_color'];
    $output = '';
    if ($gridText && get_row_layout() != 'slideshow') {
      $output = $textSize . $textColor . $textLink . $textHeading;
    }
    return $output;
  }

  // TAB: Grid - Alignment
  function exCon_align() {
    $contentSettings = get_sub_field('content');
    $alignment = $contentSettings['alignment'];
    $alignX = ' module-align-' . $alignment['horizontal'];
    $alignY = ' module-align-' . $alignment['vertical'];
    $output = '';
    if ($contentSettings && get_row_layout() != 'slideshow') {
      $output = $alignX . $alignY;
    }
    return $output;
  }

  // TAB: Grid - Width
  function exCon_widthInner() {
    $contentSettings = get_sub_field('content');
    $width = $contentSettings['width']['percent'];
    $max = $contentSettings['width']['max_width'];
    $output = '';
    if(!$max && get_row_layout() != 'slideshow') {
      $output = 'width: ' . $width . '%;';
    }
    return $output;
  }

  // TAB: Grid - Max Width
  function exCon_maxWidth() {
    $contentSettings = get_sub_field('content');
    $max = $contentSettings['width']['max_width'];
    $maxTrue = '';
    if ($max) {
      $maxTrue = ' wrap';
    }
    return $maxTrue;
  }

  // TAB: Advanced - Pre HTML
  function exCon_contentHtmlPre() {
    echo the_sub_field('pre-content_html');
  }

  // TAB: Advanced - Post HTML
  function exCon_contentHtmlPost() {
    echo the_sub_field('post-content_html');
  }

  // OUTPUT: Class List
  function exCon_contentClass() {
    echo 'module-inner' . exCon_maxWidth() . exCon_align() . exCon_textStyles();
  }

  // OUTPUT: Inline Styles
  function exCon_contentInline() {
    echo exCon_widthInner();
  }
?>
