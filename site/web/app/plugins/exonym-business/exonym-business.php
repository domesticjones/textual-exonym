<?php
  /*
    Plugin Name: Exonym - Your Business
    Plugin URI: http://domesticjones.com
    Description: Globalize all your business info with intuitive GUI's and shortcodes
    Version: 1.1
    Author: Dustin Jones
    Author URI: http://domesticjones.com
    Text Domain: ex_business
  */

  if (!defined('WPINC')) { die; }

  // Create Options Page
  if (function_exists('acf_add_options_page')) {
  	acf_add_options_page(array(
  		'page_title' 	=> 'Your Business Information',
  		'menu_title'	=> 'Your Business',
  		'menu_slug' 	=> 'ex-business',
  		'capability'	=> 'edit_posts',
  		'redirect'		=> true,
      'icon_url'    => 'dashicons-location',
      'position'    => 2
  	));
  }

  // All Components
  require_once('fields.php');
  require_once('branding.php');
  require_once('contact.php');
  require_once('social.php');
