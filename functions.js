/**
 * Custom JavaScript Functionality
 *
 * This document contains the custom JavaScript functionality for WordPress
 * theme. This is written using jQuery to simplify code complexity.
 *
 * @package WordPress
 * @subpackage Gucci
 * @since Gucci 1.0
 */

// jQuery
(function($) {

	$(document).ready(function() {
		// Menu toggle
		$('.menu-main-menu-container').prepend('<a href="#" class="main-menu-toggle">Menu</a>');
		$('#menu-main-menu').hide();
		$('.main-menu-toggle').click(function(e) {
			e.preventDefault();
			$(this).toggleClass('expanded');
			$('#menu-main-menu').slideToggle().toggleClass('expanded');
		});
	});

})(jQuery);
