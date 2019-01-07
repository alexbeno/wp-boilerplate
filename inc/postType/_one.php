<?php
/**
 * [Post type styliste]
 */

add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'styliste',
    array(
      'labels' => array(
        'name' => 'stylistes',
        'singular_name' => 'styliste'
      ),
      'public' => true,
      'supports' => array(
        'title',
        'editor',
        'thumbnail'
      ),
      'menu_position'       => 5,
      'menu_icon'           => 'dashicons-businessman',
      'taxonomies'  => array( 'category' ),
    )
  );
}

add_filter( 'sanitize_file_name', 'remove_accents' );//enlever les accent image
