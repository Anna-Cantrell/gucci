<?php
/**
 * Singular Template
 *
 * This file is the single post template for the WordPress theme. It displays
 * the main content area of individual types (posts, pages, etc).
 *
 * @package WordPress
 * @subpackage Gucci
 * @since Gucci 1.0
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<article>
			<?php the_content(); ?>
		</article>
	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
