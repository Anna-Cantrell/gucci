<?php
/**
 * Block Name: Button
 */
include('variables.php'); // $classes $id $align_class

?>
<section id="<?=$id; ?>" class="section section--button <?=$classes ?: ''?> <?=$align_class; ?>"<?=isset($style) ? 'style="'. $style .'"' : ''; ?>>
	<div class="layout">
		<?php if ( get_field('button') ): $button_link = get_field('button'); ?>
			<p><a href="<?=$button_link['url']; ?>" title="<?=$button_link['title']?>" target="<?=$button_link['target']; ?>" class="button"><?=$button_link['title']; ?></a></p>
		<?php endif; ?>
	</div>
</section>

<?php if(is_admin()) : ?>
	<style type="text/css">
		#<?=$id; ?> {}
	</style>
<?php endif; ?>
