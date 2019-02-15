<?php
/**
 * Header Template
 *
 * This file is the header template for the WordPress theme. It displays the top
 * part of the HTML document.
 *
 * @package WordPress
 * @subpackage Gucci
 * @since Gucci 1.0
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<?php wp_nav_menu(
		array( 'theme_location' => 'main-menu' )
	); ?>
