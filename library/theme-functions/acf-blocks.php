<?php
add_action('acf/init', 'my_acf_init');
function my_acf_init() {

	if( function_exists('acf_register_block') ) {

		// register blocks
		acf_register_block(array(
			'name'				=> 'testimonial',
			'title'				=> __('Testimonial'),
			'description'		=> __('A custom testimonial block.'),
			'render_callback'	=> 'gucci_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'testimonial', 'quote' ),
		));
    acf_register_block(array(
			'name'				=> 'hero',
			'title'				=> __('Hero'),
			'description'		=> __('Homepage Hero'),
			'render_callback'	=> 'gucci_acf_block_render_callback',
			'category'			=> 'homepage',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'homepage', 'hero' ),
		));
	}
}

function gucci_acf_block_render_callback( $block ) {

	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
	$slug = str_replace('acf/', '', $block['name']);

	// include a template part from within the "template-parts/block" folder
	if( file_exists( get_theme_file_path("/library/template-parts/blocks/section-{$slug}.php") ) ) {
		include( get_theme_file_path("/library/template-parts/blocks/section-{$slug}.php") );
	}
}

// Add custom Block Categories
function gucci_block_categories( $categories, $post ) {
    return array_merge(
        array(
            array(
                'slug' => 'homepage',
                'title' => __( 'HomePage', 'homepage' )
            ),
        ),
				$categories
    );
}
add_filter( 'block_categories', 'gucci_block_categories', 10, 2 );
?>
