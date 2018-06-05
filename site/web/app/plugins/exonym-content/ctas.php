<?php
  if (!defined('WPINC')) { die; }

  function exCon_cta_loop() {
    $positionChoice = get_sub_field('cta_placement');
    if (have_rows('call_to_actions')) {
      echo '<nav class="module-ctas module-align-' . $positionChoice['alignment'] . '"><ul>';
      while (have_rows('call_to_actions')) {
        the_row();
        $action = get_sub_field('action');
        $actionTitle = '<span>' . $action[$action['type']]['title'] . '</span>';
        $actionUrl = $action[$action['type']]['url'];
        $icon = get_sub_field('icon');
        $iconImage = '';
        if ($icon['icon']) {
          $iconImage = '<img src="' . $icon['icon']['sizes']['thumbnail'] . '" alt="' . $icon['icon']['alt'] . '" />';
        }
        $style = get_sub_field('style');
        $deviceDisplayOptions = get_sub_field('hide_cta');
        $deviceDisplay = '';
        if (!empty($deviceDisplayOptions)) {
          foreach ($deviceDisplayOptions as &$value) {
            $value = ' hide-' . $value;
          }
          unset($value);
          $deviceDisplay = implode('', $deviceDisplayOptions);
        }
        $styleClasses = ' cta-bg-color-' . $style['background_color'] . ' cta-color-' . $style['text_color'];
        echo '<li class="module-cta-' . $style['size'] . $deviceDisplay . '">';
          if ($action['type'] == 'link') {
            echo '<a href="' . $actionUrl . '" target="' . $action['link']['target'] . '" class="button cta' . $styleClasses . '">';
          } elseif ($action['type'] == 'file') {
            echo '<a href="' . $actionUrl . '" target="_blank" class="button cta' . $styleClasses . '">';
          }
            if ($icon['placement'] == 'before') {
              echo $iconImage . $actionTitle;
            } elseif ($icon['placement'] == 'after') {
              echo $actionTitle . $iconImage;
            }
          echo '</a>';
        echo '</li>';
      }
      echo '</ul></nav>';
    }
  }

  function ex_cta($position) {
    $positionChoice = get_sub_field('cta_placement');
    if ($position == 'above' && $positionChoice['position'] == 'above') {
      exCon_cta_loop();
    } elseif ($position == 'below' && $positionChoice['position'] == 'below') {
      exCon_cta_loop();
    }
  }
