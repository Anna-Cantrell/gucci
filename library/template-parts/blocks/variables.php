<?php
	if ( get_field('classes') != '' ) {
		$classes = ' '. get_field('classes') .'';
	}


	// create id attribute for specific styling
	$name = str_replace('acf/', '', $block['name']);
	$id = $name . "-" . $block['id'];

	// create align class ("alignwide") from block setting ("wide")
	$align_class = $block['align'] ? 'align' . $block['align'] : '';
?>
