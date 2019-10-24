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

    console.log('connected!');

    // smooth scroll
  	var $root = $('html, body');
  	$('a[href^="#"]').on('click', function () {
  		$root.animate({
  			scrollTop: $( $.attr(this, 'href') ).offset().top - 60
  		}, 500);

  		return false;
  	});

	});
})(jQuery);
