<?php
  if (!defined('WPINC')) { die; }

  function cpt_staff() {
  	$labels = array(
  		'name'                  => _x( 'Staff', 'Post Type General Name', 'staff' ),
  		'singular_name'         => _x( 'Staff Member', 'Post Type Singular Name', 'staff' ),
  		'menu_name'             => __( 'Staff', 'staff' ),
  		'name_admin_bar'        => __( 'Staff Member', 'staff' ),
  		'archives'              => __( 'Staff Archives', 'staff' ),
  		'attributes'            => __( 'Staff Attributes', 'staff' ),
  		'parent_item_colon'     => __( 'Parent Staff Member:', 'staff' ),
  		'all_items'             => __( 'All Staff', 'staff' ),
  		'add_new_item'          => __( 'Add New Staff Member', 'staff' ),
  		'add_new'               => __( 'Add New', 'staff' ),
  		'new_item'              => __( 'New Staff Member', 'staff' ),
  		'edit_item'             => __( 'Edit Staff Member', 'staff' ),
  		'update_item'           => __( 'Update Staff Member', 'staff' ),
  		'view_item'             => __( 'View Staff Member', 'staff' ),
  		'view_items'            => __( 'View Staff', 'staff' ),
  		'search_items'          => __( 'Search Staff Member', 'staff' ),
  		'not_found'             => __( 'Not found', 'staff' ),
  		'not_found_in_trash'    => __( 'Not found in Trash', 'staff' ),
  		'featured_image'        => __( '', 'staff' ),
  		'set_featured_image'    => __( '', 'staff' ),
  		'remove_featured_image' => __( '', 'staff' ),
  		'use_featured_image'    => __( '', 'staff' ),
  		'insert_into_item'      => __( 'Insert into Staff Member', 'staff' ),
  		'uploaded_to_this_item' => __( 'Uploaded to this Staff Member', 'staff' ),
  		'items_list'            => __( 'Staff list', 'staff' ),
  		'items_list_navigation' => __( 'Staff list navigation', 'staff' ),
  		'filter_items_list'     => __( 'Filter Staff list', 'staff' ),
  	);
  	$rewrite = array(
  		'slug'                  => 'staff',
  		'with_front'            => true,
  		'pages'                 => true,
  		'feeds'                 => true,
  	);
  	$args = array(
  		'label'                 => __( 'Staff Member', 'staff' ),
  		'labels'                => $labels,
  		'supports'              => array( 'title', ),
  		'hierarchical'          => false,
  		'public'                => true,
  		'show_ui'               => true,
  		'show_in_menu'          => true,
  		'menu_position'         => 20,
  		'menu_icon'             => 'dashicons-businessman',
  		'show_in_admin_bar'     => true,
  		'show_in_nav_menus'     => true,
  		'can_export'            => true,
  		'has_archive'           => true,
  		'exclude_from_search'   => false,
  		'publicly_queryable'    => true,
  		'rewrite'               => $rewrite,
  		'capability_type'       => 'page',
  		'show_in_rest'          => true,
  	);
  	register_post_type( 'staff', $args );
  }
  add_action( 'init', 'cpt_staff', 0 );

function cpt_staff_entertitle($title) {
  $screen = get_current_screen();
  if ('staff' == $screen->post_type) {
    $title = 'Staff Member name';
  }
  return $title;
}
add_filter('enter_title_here', 'cpt_staff_entertitle');

function ctax_staff() {
	$labels = array(
		'name'                       => _x( 'Staff Categories', 'Taxonomy General Name', 'staff_category' ),
		'singular_name'              => _x( 'Staff Category', 'Taxonomy Singular Name', 'staff_category' ),
		'menu_name'                  => __( 'Staff Categories', 'staff_category' ),
		'all_items'                  => __( 'All Staff Categories', 'staff_category' ),
		'parent_item'                => __( 'Parent Staff Category', 'staff_category' ),
		'parent_item_colon'          => __( 'Parent Staff Category:', 'staff_category' ),
		'new_item_name'              => __( 'New Staff Category', 'staff_category' ),
		'add_new_item'               => __( 'Add New Staff Category', 'staff_category' ),
		'edit_item'                  => __( 'Edit Staff Category', 'staff_category' ),
		'update_item'                => __( 'Update Staff Category', 'staff_category' ),
		'view_item'                  => __( 'View Staff Category', 'staff_category' ),
		'separate_items_with_commas' => __( 'Separate categories with commas', 'staff_category' ),
		'add_or_remove_items'        => __( 'Add or remove staff categories', 'staff_category' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'staff_category' ),
		'popular_items'              => __( 'Popular Staff Categories', 'staff_category' ),
		'search_items'               => __( 'Search Staff Categories', 'staff_category' ),
		'not_found'                  => __( 'Not Found', 'staff_category' ),
		'no_terms'                   => __( 'No Staff Categories', 'staff_category' ),
		'items_list'                 => __( 'Staff Categories list', 'staff_category' ),
		'items_list_navigation'      => __( 'Staff Categories list navigation', 'staff_category' ),
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
		'show_in_rest'               => true,
	);
	register_taxonomy( 'staff_cat', array( 'staff' ), $args );
}
add_action( 'init', 'ctax_staff', 0 );
