<?php 
add_action( 'init', 'im_teams' );
function im_teams() {

	$labels = array(
		'name'                => _x( 'Team Members', 'Post Type General Name', 'im' ),
		'singular_name'       => _x( 'Team Member', 'Post Type Singular Name', 'im' ),
		'menu_name'           => __( 'Team Members', 'im' ),
		'parent_item_colon'   => __( 'Parent Team Member:', 'im' ),
		'all_iteim'           => __( 'All Team Members', 'im' ),
		'view_item'           => __( 'View Team Member', 'im' ),
		'add_new_item'        => __( 'Add New Team Member', 'im' ),
		'add_new'             => __( 'Add New Team Member', 'im' ),
		'edit_item'           => __( 'Edit Team Member', 'im' ),
		'update_item'         => __( 'Update Team Member', 'im' ),
		'search_iteim'        => __( 'Search Team Member', 'im' ),
		'not_found'           => __( 'No Team Member found', 'im' ),
		'not_found_in_trash'  => __( 'No Team Member found in Trash', 'im' ),
	);
	$args = array(
		'label'               => __( 'Team Member', 'im' ),
		'description'         => __( 'Team Members information pages', 'im' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', 'revisions'),
		'taxonomies'          => array( '' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 21,
		'menu_icon'           => 'dashicons-groups',
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'rewrite' => array(
			'slug' => 'event',
			'with_front' => false,
		) ,
	);
	register_post_type( 'im_teams', $args );
	flush_rewrite_rules();
}
?>