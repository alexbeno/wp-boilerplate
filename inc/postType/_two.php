<?php
/**
 * [Post type réalisation]
 */

add_action( 'init', 'create_post_typeB' );
function create_post_typeB() {
  register_post_type( 'réalisation',
    array(
      'labels' => array(
        'name' => 'réalisations',
        'singular_name' => 'réalisation'
      ),
      'public' => true,
      'supports' => array(
        'title',
        'editor',
        'thumbnail'
      ),
      'menu_position'       => 5,
      'menu_icon'           => 'dashicons-camera',
      'taxonomies'  => array( 'category' ),
    )
  );
}

add_filter( 'sanitize_file_name', 'remove_accents' );//enlever les accent image
