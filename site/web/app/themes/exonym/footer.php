<?php
  /* ==============
     DEFAULT FOOTER
     ============== */
?>
    <footer id="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
      <a href="<?php echo get_home_url(); ?>" class="footer-logo">
        <?php
          $logoFile = get_field('logo', 'options')['primary']['full_color']['url'];
          echo file_get_contents($logoFile);
        ?>
      </a>
      <nav class="nav-footer" role="navigation">
        <h2>About <?php echo ex_brand(); ?></h2>
        <?php wp_nav_menu(array(
          'container' => 'ul',                    // enter '' to remove nav container
          'container_class' => 'footer-links cf',	// class of container (should you choose to use it)
          'menu' => __('Footer', 'exonym'),	      // nav name
          'menu_class' => 'nav footer-nav cf',    // adding custom nav class
          'theme_location' => 'footer-menu',		  // where it's located in the theme
          'before' => '',							            // before the menu
          'after' => '',							            // after the menu
          'link_before' => '',					          // before each link
          'link_after' => '',						          // after each link
          'depth' => 1,							              // limit the depth of the nav
          'fallback_cb' => ''						          // fallback function
        )); ?>
      </nav>
      <?php ex_social(); ?>
      <p class="copyright">&copy; Copyright <?php ex_brand('legal'); ?></p>
    </footer>
    <?php get_template_part('templates/nav', 'responsive'); ?>
  </div>
  <?php wp_footer(); ?>
</body>
</html>
