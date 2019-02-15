<?php
include('variables.php');
?>

<section class="section section--image<?php echo isset($classes) ? $classes : ''; ?>">
	<div class="layout layout--<?php echo $layout; ?>">
		<?php if ( get_sub_field('image') ): ?>
			<?php the_sub_field('image'); ?>
		<?php endif; ?>
	</div>
</section>
