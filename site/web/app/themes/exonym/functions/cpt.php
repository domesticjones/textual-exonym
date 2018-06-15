<?php
	/* ===================
		 WP IMAGE DEFINITIONS
		 =================== */

  // WP Theme Checker Compliance
  function ex_theme_terlet() {
  	flush_rewrite_rules();
  }
  add_action('after_switch_theme', 'ex_theme_terlet');

  // Register Custom Post Type
  function cpt_casestudy() {

  	$labels = array(
  		'name'                  => _x( 'Case Studies', 'Post Type General Name', 'case_study' ),
  		'singular_name'         => _x( 'Case Study', 'Post Type Singular Name', 'case_study' ),
  		'menu_name'             => __( 'Case Studies', 'case_study' ),
  		'name_admin_bar'        => __( 'Case Study', 'case_study' ),
  		'archives'              => __( 'Case Study Archives', 'case_study' ),
  		'attributes'            => __( 'Case Study Attributes', 'case_study' ),
  		'parent_item_colon'     => __( 'Parent Case Study:', 'case_study' ),
  		'all_items'             => __( 'All Case Studies', 'case_study' ),
  		'add_new_item'          => __( 'Add New Case Study', 'case_study' ),
  		'add_new'               => __( 'Add New', 'case_study' ),
  		'new_item'              => __( 'New Case Study', 'case_study' ),
  		'edit_item'             => __( 'Edit Case Study', 'case_study' ),
  		'update_item'           => __( 'Update Case Study', 'case_study' ),
  		'view_item'             => __( 'View Case Study', 'case_study' ),
  		'view_items'            => __( 'View Case Studies', 'case_study' ),
  		'search_items'          => __( 'Search Case Study', 'case_study' ),
  		'not_found'             => __( 'Not found', 'case_study' ),
  		'not_found_in_trash'    => __( 'Not found in Trash', 'case_study' ),
  		'featured_image'        => __( 'Business Logo', 'case_study' ),
  		'set_featured_image'    => __( 'Set business logo', 'case_study' ),
  		'remove_featured_image' => __( 'Remove business logo', 'case_study' ),
  		'use_featured_image'    => __( 'Use as business logo', 'case_study' ),
  		'insert_into_item'      => __( 'Insert into Case Study', 'case_study' ),
  		'uploaded_to_this_item' => __( 'Uploaded to this Case Study', 'case_study' ),
  		'items_list'            => __( 'Case Studies list', 'case_study' ),
  		'items_list_navigation' => __( 'Case Studies list navigation', 'case_study' ),
  		'filter_items_list'     => __( 'Filter Case Studies list', 'case_study' ),
  	);
  	$args = array(
  		'label'                 => __( 'Case Study', 'case_study' ),
  		'labels'                => $labels,
  		'supports'              => array( 'title', 'thumbnail' ),
  		'taxonomies'            => array( 'case_study_categories' ),
  		'hierarchical'          => false,
  		'public'                => true,
  		'show_ui'               => true,
  		'show_in_menu'          => true,
  		'menu_position'         => 20,
  		'menu_icon'             => 'dashicons-analytics',
  		'show_in_admin_bar'     => true,
  		'show_in_nav_menus'     => true,
  		'can_export'            => true,
  		'has_archive'           => true,
  		'exclude_from_search'   => true,
  		'publicly_queryable'    => true,
  		'rewrite'               => false,
  		'capability_type'       => 'page',
  	);
  	register_post_type( 'case_study', $args );

  }
  add_action( 'init', 'cpt_casestudy', 0 );

  // Register Custom Taxonomy
  function ctax_casestudytacats() {

  	$labels = array(
  		'name'                       => _x( 'Case Study Categories', 'Taxonomy General Name', 'case_study_categories' ),
  		'singular_name'              => _x( 'Case Study Category', 'Taxonomy Singular Name', 'case_study_categories' ),
  		'menu_name'                  => __( 'Case Study Categories', 'case_study_categories' ),
  		'all_items'                  => __( 'All Case Study Categories', 'case_study_categories' ),
  		'parent_item'                => __( 'Parent Case Study Category', 'case_study_categories' ),
  		'parent_item_colon'          => __( 'Parent Case Study Category:', 'case_study_categories' ),
  		'new_item_name'              => __( 'New Case Study Category Name', 'case_study_categories' ),
  		'add_new_item'               => __( 'Add Case Study Category Item', 'case_study_categories' ),
  		'edit_item'                  => __( 'Edit Case Study Category', 'case_study_categories' ),
  		'update_item'                => __( 'Update Case Study Category', 'case_study_categories' ),
  		'view_item'                  => __( 'View Case Study Category', 'case_study_categories' ),
  		'separate_items_with_commas' => __( 'Separate categories with commas', 'case_study_categories' ),
  		'add_or_remove_items'        => __( 'Add or remove categories', 'case_study_categories' ),
  		'choose_from_most_used'      => __( 'Choose from the most used', 'case_study_categories' ),
  		'popular_items'              => __( 'Popular Case Study Categories', 'case_study_categories' ),
  		'search_items'               => __( 'Search Case Study Categories', 'case_study_categories' ),
  		'not_found'                  => __( 'Not Found', 'case_study_categories' ),
  		'no_terms'                   => __( 'No Case Study Categories', 'case_study_categories' ),
  		'items_list'                 => __( 'Case Study Categories list', 'case_study_categories' ),
  		'items_list_navigation'      => __( 'Case Study Categories list navigation', 'case_study_categories' ),
  	);
  	$args = array(
  		'labels'                     => $labels,
  		'hierarchical'               => true,
  		'public'                     => true,
  		'show_ui'                    => true,
  		'show_admin_column'          => true,
  		'show_in_nav_menus'          => false,
  		'show_tagcloud'              => false,
  		'rewrite'                    => false,
  	);
  	register_taxonomy( 'case_study_categories', array( 'case_study' ), $args );

  }
  add_action( 'init', 'ctax_casestudytacats', 0 );



  function cpt_change_title_text($title) {
    $screen = get_current_screen();
    if('case_study' == $screen->post_type) {
      $title = 'Enter Client Name Here';
    }
    return $title;
  }
  add_filter('enter_title_here', 'cpt_change_title_text');
