<?php
/**
 * Main Template
 *
 * This file is the main template for the WordPress theme. It displays a list of
 * posts in the main content area.
 *
 * @package WordPress
 * @subpackage Gucci
 * @since Gucci 1.0
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'content', get_post_format() ); ?>
	<?php endwhile; ?>
	<?php the_posts_pagination(); ?>
<?php endif; ?>

<?php get_footer(); ?>
