<?php
/**
 * Functions and Definitions
 *
 * This document contains the custom functions and definitions for various WordPress
 * theme functionality.
 *
 * @package WordPress
 * @subpackage Gucci
 * @since Gucci 1.0
 */

 /* Remove user's access to theme editor */
define( 'DISALLOW_FILE_EDIT', true );

/**
 * Register Styles & Scripts
 *
 * The code below registers custom WordPress styles using wp_register_style()
 * function.
 *
 * @since Gucci 1.0
 */

function gucci_styles() {
	// Load main stylesheet
	wp_enqueue_style('gucci-style', get_template_directory_uri() . '/library/dist/css/style.css');
	// Load main javascript
	wp_enqueue_script('gucci-script', get_template_directory_uri() . '/library/dist/js/functions.min.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'gucci_styles');


/**
 * Register Block Styles & Scripts
 *
 * The code below registers custom WordPress styles for editor blocks using wp_register_style()
 * function.
 *
 * @since Gucci 1.0
 */
function gucci_block_editor_assets() {
	wp_enqueue_style(
		'gucci-editor-styles',
		get_stylesheet_directory_uri() . "/library/dist/css/block-styles.css",
		array(),
		'1.0'
	);
}
add_action('enqueue_block_editor_assets', 'gucci_block_editor_assets');

/**
 * Register Features
 *
 * The code below registers custom WordPress theme features using
 * add_theme_support() function.
 *
 * @since Gucci 1.0
 */

function gucci_features() {
	// Support title tag
	add_theme_support('title-tag');
	// Support featured images
	add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'gucci_features');

/**
 * Register Menus
 *
 * The code below registers custom WordPress menus using register_my_menus()
 * function.
 *
 * @since Gucci 1.0
 */
function gucci_register_menus() {
	register_nav_menus(
		array( 'main-menu' => __('Main Menu') )
	);
}
add_action('init', 'gucci_register_menus');

/**
 * Register support for Gutenberg wide alignment
 */
function gucci_setup() {
  add_theme_support( 'align-wide' );
}
add_action( 'after_setup_theme', 'gucci_setup' );


/**
 * Advanced Custom Fields Settings
 *
 * The code below adds and adjusts various functionality for the Advanced Custom
 * Fields PRO plugin.
 *
 * @since Gucci 1.0
 */

if( function_exists('acf_add_options_page') ) {
	// Theme settings
	acf_add_options_page( array(
		'page_title' => 'Theme Settings',
		'menu_title' => 'Theme Settings',
		'parent_slug' => 'themes.php'
	));
}


/**
 * Custom Post Types
 *
 * @since Gucci 1.0
 */

function custom_post_type() {

// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Projects', 'Post Type General Name', 'gucci' ),
        'singular_name'       => _x( 'Project', 'Post Type Singular Name', 'gucci' ),
        'menu_name'           => __( 'Projects', 'gucci' ),
        'parent_item_colon'   => __( 'Parent Project', 'gucci' ),
        'all_items'           => __( 'All Projects', 'gucci' ),
        'view_item'           => __( 'View Project', 'gucci' ),
        'add_new_item'        => __( 'Add New Project', 'gucci' ),
        'add_new'             => __( 'Add New', 'gucci' ),
        'edit_item'           => __( 'Edit Project', 'gucci' ),
        'update_item'         => __( 'Update Project', 'gucci' ),
        'search_items'        => __( 'Search Project', 'gucci' ),
        'not_found'           => __( 'Not Found', 'gucci' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'gucci' ),
    );

// Set other options for Custom Post Type
    $args = array(
        'label'               => __( 'projects', 'gucci' ),
        'description'         => __( 'Development Projects', 'gucci' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        'taxonomies'          => array( 'tech' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'show_in_rest'        => true, // remove to use classic editor
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
				'menu_icon'           => 'dashicons-edit',
        'capability_type'     => 'page',
    );

    // Registering your Custom Post Type
    register_post_type( 'projects', $args );

}
// uncomment below to add custom post type
// add_action( 'init', 'custom_post_type', 0 );



/*
 * Removes block editors from Homepage
 *
 * @since Gucci 1.0
 */
function disable_gutenberg( $can_edit, $post_type ) {
	if( ! ( is_admin() && !empty( $_GET['post'] ) ) ) {
    return $can_edit;
  }

	if( $_GET['post'] == get_option( 'page_on_front' ) ) {
    $can_edit = false;
  }
	return $can_edit;
}
// Uncomment to remove block editors from homepage
// add_filter( 'gutenberg_can_edit_post_type', 'disable_gutenberg', 10, 2 );
// add_filter( 'use_block_editor_for_post_type', 'disable_gutenberg', 10, 2 );

function init_remove_support(){
  if( !empty($_GET['post']) && intval($_GET['post']) == get_option( 'page_on_front' ) ) {
    remove_post_type_support('page', 'editor');
  }
}
// Uncomment to remove block editors from homepage
// add_action('admin_head', 'init_remove_support');


/**
 *  Create block template for internal pages
 *
 * @since Gucci 1.0
 */
function gucci_register_template() {
  $page_type_object = get_post_type_object( 'page' );
  $page_type_object->template = array(
      array( 'acf/page-hero' ),
  );
}
// Uncomment to add block templates to pages
// add_action( 'init', 'gucci_register_template' );


/**
 *  Remove H1 from wysiwyg editors
 *
 * @since Gucci 1.0
 */
function remove_h1_from_heading($args) {
$args['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;Pre=pre';
return $args;
}
// Uncomment to remove H1 as an option on wysiwyg editors
// add_filter('tiny_mce_before_init', 'remove_h1_from_heading' );


/**
 *  Shortcode Example
 *
 * @since Gucci 1.0
 */
function phone_shortcode() {
	$phone = '555-555-5555';
	$output = "<a href='tel:$phone'>$phone</a>";
	return $output;
}
// register shortcode
add_shortcode('phone', 'phone_shortcode');

/**
	 * Returns the SVG code of the SVG asset represented by the given key.
	 *
	 * @param string $key - A key that represents a specific SVG file/asset
	 * @return string - The code of the SVG file/asset
	 */
function get_svg($key) {
	$content = 'none';
	$file = get_stylesheet_directory().'/library/assets/svg/'.$key.'.svg';
	if(file_exists($file)) {
		$content = file_get_contents($file);
	}
	return $content;
}

// Include blocks
require_once('library/theme-functions/acf-blocks.php');
