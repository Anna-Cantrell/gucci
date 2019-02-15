<?php
/**
 * Content Template
 *
 * This file is the content template for the WordPress theme. It displays a 
 * regular post content area.
 *
 * @package WordPress
 * @subpackage Gucci
 * @since Gucci 1.0
 */

?>

<article>
	<header>
		<h2>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php the_title(); ?>
			</a>
		</h2>
	</header>
	<section>
		<?php the_field('teaser'); ?>
	</section>
</article>
