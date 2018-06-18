<nav id="nav-responsive">
  <?php wp_nav_menu(array(
    'container' => 'ul',                    // enter '' to remove nav container
    'container_class' => 'responsive-links',// class of container (should you choose to use it)
    'menu' => __('Responsive', 'exonym'),	  // nav name
    'menu_class' => 'nav responsive-nav',   // adding custom nav class
    'theme_location' => 'responsive',		    // where it's located in the theme
    'before' => '',							            // before the menu
    'after' => '',							            // after the menu
    'link_before' => '',					          // before each link
    'link_after' => '',						          // after each link
    'depth' => 1,							              // limit the depth of the nav
    'fallback_cb' => ''						          // fallback function
  )); ?>
  <button id="responsive-contact-button">
    <span>Contact Us</span>
    <span class="button-arrow"><?php echo file_get_contents(asset_path('images/icon-arrow.svg')); ?></span>
  </button>
</nav>
