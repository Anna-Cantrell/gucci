<?php
/**
 * Block Name: Testimonial
 *
 * This is the template that displays the testimonial block.
 */

// get image field (array)
$avatar = get_field('avatar');

// create id attribute for specific styling
$id = 'testimonial-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>
<section id="<?=$id?>" class="section section--testimonial <?=$classes ?: '';?> <?=$align_class; ?>"<?=isset($style) ? 'style="'. $style .'"' : ''; ?>>
  <div class="layout">
    <blockquote id="<?=$id; ?>" class="testimonial <?=$align_class; ?>">
      <p><?php the_field('testimonial'); ?></p>
      <cite>
        <img src="<?=$avatar['url']; ?>" alt="<?=$avatar['alt']; ?>" />
        <span><?php the_field('author'); ?></span>
      </cite>
    </blockquote>
  </div>
</section>

<?php if(is_admin()) : ?>
	<script type="text/javascript">
		<?php // include_once get_template_directory() . '/library/dist/js/editor-functions.min.js'; ?>
	</script>
<?php endif; ?>