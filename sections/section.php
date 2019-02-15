<?php
include('variables.php');
?>

<section class="section<?php echo isset($classes) ? $classes : ''; ?>">
	<div class="layout layout--<?php echo $layout; ?>">
		<?php if ( get_sub_field('content') ): ?>
			<?php the_sub_field('content'); ?>
		<?php endif; ?>
	</div>
</section>
