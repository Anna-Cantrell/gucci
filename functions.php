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
	wp_enqueue_style('gucci-style', get_template_directory_uri() . '/style.css');
	// Load main javascript
	wp_enqueue_script('gucci-script', get_template_directory_uri() . '/library/js/functions.min.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'gucci_styles');


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

// Include blocks
require_once('library/theme-functions/acf-blocks.php');
