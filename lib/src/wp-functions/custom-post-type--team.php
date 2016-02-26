<?php 
// Creates Team Custom Post Type
function my_custom_post_team() {
  $labels = array(
    'name'               => _x( 'Team Members', 'post type general name' ),
    'singular_name'      => _x( 'Team Member', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'Team Member' ),
    'add_new_item'       => __( 'Add Team Member' ),
    'edit_item'          => __( 'Edit Team Member' ),
    'new_item'           => __( 'Add Team Member' ),
    'all_items'          => __( 'All Team Members' ),
    'view_item'          => __( 'View Team Members' ),
    'search_items'       => __( 'Search Team Members' ),
    'not_found'          => __( 'No Team Members found' ),
    'not_found_in_trash' => __( 'No Team Members found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Team Members'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Team Members',
    'public'        => true,
    'menu_position' => 4,
    'rewrite'       => array( 'slug' => 'team' ),
    'supports'      => array(),
    'has_archive'   => true,
  );
  register_post_type( 'team_members', $args );
}
add_action( 'init', 'my_custom_post_team' );
?>