<?php
/**
 * Block Name: Hero
 */
include('variables.php'); // $classes $id $align_class

if ( get_field('background_image') ) {
	$image = get_field('background_image');
	$style = 'background-image:url('. $image['url'] .')';
}

?>
<section id="<?php echo $id; ?>" class="section section--hero <?php echo isset($classes) ? $classes : ''; ?> <?php echo $align_class; ?>"<?php echo isset($style) ? 'style="'. $style .'"' : ''; ?>>
	<div class="layout">
		<?php if ( get_field('title') ): ?>
			<h2><?php the_field('title'); ?></h2>
		<?php endif; ?>
		<?php if ( get_field('content') ): ?>
			<?php the_field('content'); ?>
		<?php endif; ?>
		<?php if ( get_field('cta') ): $cta = get_field('cta'); ?>
			<p><a href="<?php echo $cta['url']; ?>" target="<?php echo $cta['target']; ?>" class="button"><?php echo $cta['title']; ?></a></p>
		<?php endif; ?>
	</div>
</section>

<style type="text/css">
	#<?php echo $id; ?> {}
</style>
