<?php
  /*
    Plugin Name: Exonym - Staff
    Plugin URI: http://domesticjones.com
    Description: Display company directories, staff members, and their bios
    Version: 1.2
    Author: Dustin Jones
    Author URI: http://domesticjones.com
    Text Domain: exStaff
  */

  if (!defined('WPINC')) { die; }

  require_once('cpt.php');
  require_once('fields.php');

  // Plugin sanity check
  function exStaff() {
    return true;
  }

  // Display contact methods
  function exStaff_contactMethods($style) {
    if(have_rows('contact_methods')):
      echo '<ul class="staff-info-contact-methods">';
        while(have_rows('contact_methods')): the_row();
          echo '<li>';
            $type = get_sub_field('contact_type');
            $to = get_sub_field('info');
            $link = '';
            $icon = '';
            if ($type == 'email') {
              $link = 'mailto:' . $to;
              $icon = 'icon-mail.svg';
            } elseif ($type == 'facebook') {
              $link = $to;
              $icon = 'social-fb.svg';
            } elseif ($type == 'instagram') {
              $link = $to;
              $icon = 'social-ig.svg';
            } elseif ($type == 'linkedin') {
              $link = $to;
              $icon = 'social-li.svg';
            } elseif ($type == 'phone') {
              $link = 'tel:' . $to;
              $icon = 'icon-phone.svg';
            } elseif ($type == 'pinterest') {
              $link = $to;
              $icon = 'social-pt.svg';
            } elseif ($type == 'twitter') {
              $link = $to;
              $icon = 'social-tw.svg';
            } elseif ($type == 'website') {
              $link = $to;
              $icon = 'icon-home.svg';
            }
            echo '<a href="' . $link . '" class="staff-info-contact-link staff-info-contact-type-' . $type . '" target="_blank">';
              if ($style == 'icons') {
                echo '<img src="' . asset_path("images/" . $icon) . '" alt="icon for ' . $type . '" />';
              } elseif ($style == 'text') {
                $linkStrip = str_replace(parse_url($to, PHP_URL_SCHEME) . '://', '', $to);
                $linkDisplay = rtrim(str_replace('www.', '', $linkStrip), '/');
                echo '<span>';
                  echo '<small>' . $type . '</small>';
                  echo  $linkDisplay;
                echo '</span>';
              }
            echo '</a>';
          echo '</li>';
        endwhile;
      echo '</ul>';
    endif;
  }
