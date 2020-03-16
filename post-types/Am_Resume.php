<?php
/*
 * Class: Am_Resume
 * Developed by Amir Meshkin
 */
namespace Resume\Plugin;

//avoid direct calls to this file, because now WP core and framework has been used
if ( ! function_exists( 'add_filter' ) ) {
  header( 'Status: 403 Forbidden' );
  header( 'HTTP/1.1 403 Forbidden' );
  exit();
}

// ATRIA_Business_Optimizer_Controller

if ( ! class_exists( 'Am_Resume' ) ) {

  class Am_Resume extends Plugin {

    static $slug = 'resume';

    /**
     * Am_Resume constructor.
     */
    public function __construct() {
      add_action( 'init', [ get_called_class(), 'register_post_type' ] );
    }

    /**
     *
     */
    static function register_post_type() {

      $labels = [
        'name' => 'Resume',
        'singular_name' => 'Resume',
        'add_new' => 'Add Resume',
        'add_new_item' => 'Add Resume',
        'edit_item' => 'Edit Resume',
        'new_item' => 'New Resume',
        'all_items' => 'All Resumes',
        'view_item' => 'View Resume',
        'search_items' => 'Search Resume',
        'not_found' =>  'No Resumes found',
        'not_found_in_trash' => 'No content found in Trash',
        'parent_item_colon' => '',
        'menu_name' => 'Resumes'
      ];

      $directory_args = [
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => [ 'slug' => self::$slug ],
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'menu_icon' => 'dashicons-category',
        'supports' => [ 'title', 'editor', 'thumbnail', 'custom-fields' ],
      ];

      register_post_type( self::$slug, $directory_args );
    }
  }
}
