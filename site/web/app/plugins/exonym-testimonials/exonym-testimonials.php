<?php
  /*
    Plugin Name: Exonym - Testimonials
    Plugin URI: http://domesticjones.com
    Description: Catalog and display customer feedback
    Version: 1.0
    Author: Dustin Jones
    Author URI: http://domesticjones.com
    Text Domain: exTest
  */

  if (!defined('WPINC')) { die; }

  require_once('cpt.php');

  function exTestis() {
    return true;
  }
