<?php
add_action('acf/init', 'my_acf_init');
function my_acf_init() {

	if( function_exists('acf_register_block') ) {

		// register blocks
		acf_register_block(array(
			'name'				=> 'hero',
			'title'				=> __('Hero'),
			'description'		=> __('Hero Section'),
			'render_template'   => 'library/template-parts/blocks/block-hero.php',
			'category'			=> 'homepage',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'homepage', 'hero' ),
			'supports' => array('multiple' => false)
		));
		acf_register_block(array(
			'name'				=> 'testimonial',
			'title'				=> __('Testimonial'),
			'description'		=> __('A custom testimonial block.'),
			'render_template'   => 'library/template-parts/blocks/block-testimonial.php',
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'testimonial', 'quote' ),
		));
		acf_register_block(array(
			'name'				=> 'button',
			'title'				=> __('Button'),
			'description'		=> __('A big CTA button'),
			'render_template'   => 'library/template-parts/blocks/block-button.php',
			'category'			=> 'formatting',
			'icon'				=> 'editor-removeformatting',
			'keywords'			=> array( 'testimonial', 'quote' ),
		));
	}
}
// Here's a list of dashicons, you might have to get creative!
// https://developer.wordpress.org/resource/dashicons/

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

// Disallow most default blocks
add_filter( 'allowed_block_types', 'gucci_allowed_block_types' );
function gucci_allowed_block_types( $allowed_blocks ) {
	return array(
		'core/image',
		'core/paragraph',
		'core/heading',
		'acf/hero',
    'acf/button',
		'acf/testimonial'
	);
}

/*
Full list of default core blocks (preface with core/):

archives
audio
button
categories
code
column
columns
coverImage
embed
file
freeform
gallery
heading
html
image
latestComments
latestPosts
list
more
nextpage
paragraph
preformatted
pullquote
quote
reusableBlock
separator
shortcode
spacer
subhead
table
textColumns
verse
video
*/
?>
