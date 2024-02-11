<?php 
add_action( 'init', 'team_type', 0 );
    
function team_type() {
    
  $labels = array(
    'name' => _x( 'Type', 'im' ),
    'singular_name' => _x( 'Type', 'im' ),
    'search_items' =>  __( 'Search Type' ),
    'all_items' => __( 'All Types' ),
    'parent_item' => __( 'Parent Type' ),
    'parent_item_colon' => __( 'Type Topic:' ),
    'edit_item' => __( 'Edit Type' ), 
    'update_item' => __( 'Update Type' ),
    'add_new_item' => __( 'Add New Type' ),
    'new_item_name' => __( 'New Type Name' ),
    'menu_name' => __( 'Types' ),
  );    
  
  register_taxonomy('team_type',array('im_teams'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'type' ),
    'capabilites'       => array(
        'manage_terms'  => 'edit_posts',
        'edit_terms'    => 'edit_posts',
        'delete_terms'  => 'edit_posts',
        'assign_terms'  => 'edit_posts'
    )
  ));

}
?>