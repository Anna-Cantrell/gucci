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
<section id="<?=$id; ?>" class="section section--hero <?=$classes ?: ''?> <?=$align_class; ?>"<?=isset($style) ? 'style="'. $style .'"' : ''; ?>>
	<div class="layout">
		<?php if ( get_field('title') ): ?>
			<h2><?php the_field('title'); ?></h2>
		<?php endif; ?>
		<?php if ( get_field('content') ): ?>
			<?php the_field('content'); ?>
		<?php endif; ?>
		<?php if ( get_field('cta') ): $cta = get_field('cta'); ?>
			<p><a href="<?=$cta['url']; ?>" title="<?=$cta['title']?>" target="<?=$cta['target']; ?>" class="button"><?=$cta['title']; ?></a></p>
		<?php endif; ?>
	</div>
</section>
