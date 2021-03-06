<?php
  /* ==============
     DEFAULT HEADER
     ============== */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title><?php wp_title(); ?></title>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
		<div id="container">
			<header id="header-contact">
				<div class="header-contact-inner">
					<?php echo do_shortcode('[contact-form-7 id="25" title="Contact form 1"]'); ?>
					<div class="header-contact-public">
						<h2>Connect with Textual</h2>
						<?php ex_social(); ?>
						<?php ex_contact('email'); ?>
					</div>
				</div>
			</header>
      <header id="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
        <a href="<?php echo get_home_url(); ?>">
					<img src="<?php ex_logo('alternate'); ?>" alt="Logo for <?php ex_brand(); ?>" class="logo-header" />
				</a>
        <nav class="nav-header menu-dropdown" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
          <?php wp_nav_menu(array(
            'container' => false,								// remove nav container
            'container_class' => '',						// class of container (should you choose to use it)
            'menu' => __('Header', 'exonym'),	  // nav name
            'menu_class' => '',									// adding custom nav class
            'theme_location' => 'header-menu',	// where it's located in the theme
            'before' => '',											// before the menu
            'after' => '',											// after the menu
            'link_before' => '',								// before each link
            'link_after' => '',									// after each link
            'depth' => 0,												// limit the depth of the nav
            'fallback_cb' => ''									// fallback function (if there is one)
          )); ?>
        </nav>
				<button id="header-contact-button">
					<span>Contact Us</span>
					<span class="button-arrow"><?php echo file_get_contents(asset_path('images/icon-arrow.svg')); ?></span>
				</button>
				<a href="#" id="responsive-nav-toggle">
          <span class="line"></span>
          <span class="line"></span>
          <span class="line"></span>
				</a>
      </header>
