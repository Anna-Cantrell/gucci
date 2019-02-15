<?php
include('variables.php');

if ( get_sub_field('background_image') ) {
	$image = get_sub_field('background_image');
	$style = 'background-image:url('. $image['url'] .')';
}
?>

<section class="section section--hero<?php echo isset($classes) ? $classes : ''; ?>"<?php echo isset($style) ? 'style="'. $style .'"' : ''; ?>>
	<div class="layout layout--<?php echo $layout; ?>">
		<?php if ( get_sub_field('title') ): ?>
			<h2><?php the_sub_field('title'); ?></h2>
		<?php endif; ?>
		<?php if ( get_sub_field('content') ): ?>
			<?php the_sub_field('content'); ?>
		<?php endif; ?>
		<?php if ( get_sub_field('cta') ): $cta = get_sub_field('cta'); ?>
			<p><a href="<?php echo $cta['url']; ?>" target="<?php echo $cta['target']; ?>" class="button"><?php echo $cta['title']; ?></a></p>
		<?php endif; ?>
	</div>
</section>
