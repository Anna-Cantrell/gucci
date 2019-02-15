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
	wp_enqueue_style('gucci-style', get_template_directory_uri() . '/style.min.css');

	// Load main javascript
	wp_enqueue_script('gucci-script', get_template_directory_uri() . '/functions.min.js', array('jquery'), '1.0', true);
}

add_action('wp_enqueue_scripts', 'gucci_styles');

// Move jQuery to footer
function gucci_jquery_footer() {
	// unregister jquery
	wp_deregister_script('jquery');

	// register to footer
	wp_register_script('jquery', includes_url('/js/jquery/jquery.js'), false, null, true);

	wp_enqueue_script('jquery');
}

add_action('wp_enqueue_scripts', 'gucci_jquery_footer');

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
		array(
			'main-menu' => __('Main Menu')
		)
	);
}

add_action('init', 'gucci_register_menus');

// Remove editor (using flexible content instead)

function remove_editor() {
	remove_post_type_support('page', 'editor');
	remove_post_type_support('post', 'editor');
}

add_action('init', 'remove_editor');

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

// Include fields
require_once('vendor/autoload.php');
require_once('fields.php');
