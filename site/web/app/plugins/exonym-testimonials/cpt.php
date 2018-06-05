<?php
  if (!defined('WPINC')) { die; }

// Register Custom Post Type
function cpt_testimonials() {
	$labels = array(
		'name'                  => _x( 'Testimonials', 'Post Type General Name', 'testimonials' ),
		'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'testimonials' ),
		'menu_name'             => __( 'Testimonials', 'testimonials' ),
		'name_admin_bar'        => __( 'Testimonials', 'testimonials' ),
		'archives'              => __( 'Testimonial Archives', 'testimonials' ),
		'attributes'            => __( 'Testimonial Attributes', 'testimonials' ),
		'parent_item_colon'     => __( 'Parent Testimonial:', 'testimonials' ),
		'all_items'             => __( 'All Testimonials', 'testimonials' ),
		'add_new_item'          => __( 'Add New Testimonial', 'testimonials' ),
		'add_new'               => __( 'Add New', 'testimonials' ),
		'new_item'              => __( 'New Testimonial', 'testimonials' ),
		'edit_item'             => __( 'Edit Testimonial', 'testimonials' ),
		'update_item'           => __( 'Update Testimonial', 'testimonials' ),
		'view_item'             => __( 'View Testimonial', 'testimonials' ),
		'view_items'            => __( 'View Testimonials', 'testimonials' ),
		'search_items'          => __( 'Search Testimonial', 'testimonials' ),
		'not_found'             => __( 'Not found', 'testimonials' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'testimonials' ),
		'insert_into_item'      => __( 'Insert into testimonial', 'testimonials' ),
		'uploaded_to_this_item' => __( 'Uploaded to this testimonial', 'testimonials' ),
		'items_list'            => __( 'Testimonials list', 'testimonials' ),
		'items_list_navigation' => __( 'Testimonials list navigation', 'testimonials' ),
		'filter_items_list'     => __( 'Filter testimonials list', 'testimonials' ),
	);
	$args = array(
		'label'                 => __( 'Testimonial', 'testimonials' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'revisions', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-format-quote',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => false,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'testimonial', $args );
}
add_action( 'init', 'cpt_testimonials', 0 );

function cpt_testimonial_entertitle($title) {
  $screen = get_current_screen();
  if ('testimonial' == $screen->post_type) {
    $title = 'Customer/Client name';
  }
  return $title;
}

add_filter('enter_title_here', 'cpt_testimonial_entertitle');
