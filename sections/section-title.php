<?php
include('variables.php');
?>

<section class="section section--title<?php echo isset($classes) ? $classes : ''; ?>">
	<div class="layout layout--<?php echo $layout; ?>">
		<?php if ( get_sub_field('page_title') ): ?>
			<h1>
				<?php the_sub_field('page_title'); ?>
				<?php if ( get_sub_field('subtitle') ): ?>
					<small><?php the_sub_field('subtitle') ?></small>
				<?php endif; ?>
			</h1>
		<?php endif; ?>
	</div>
</section>
