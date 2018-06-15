<?php
	/* ===================
		 TEMPLATE NAME: Home
		 =================== */
	get_header();
	get_template_part('templates/wrap', 'start');
	get_template_part('templates/module', 'header');
  get_template_part('templates/module', 'features');
  get_template_part('templates/module', 'demo');
  get_template_part('templates/module', 'carousel');
	get_template_part('templates/wrap', 'end');
	get_footer();
?>
