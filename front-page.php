<?php
/**
 * Front Page
 *
 * This file is the Front Page template for the WordPress theme.
 *
 * @package WordPress
 * @subpackage Gucci
 * @since Gucci 1.0
 */

get_header(); ?>


<?php if ( have_posts() ) : ?>
	<main class="content">
		<?php while ( have_posts() ) : the_post(); ?>
			<article>
        <?php the_content(); ?>
			</article>
		<?php endwhile; ?>
	</main>
<?php endif; ?>

<?php get_footer(); ?>
