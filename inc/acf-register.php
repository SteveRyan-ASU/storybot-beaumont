<?php
/**
 * Additional functions for Advanced Custom Fields.
 *
 * Contents:
 *   - Register save path for ACF fields directly into child theme.
 * 	 - ACF calculate spacing using style engine
 *
 *
 * @package storybot-beaumont
 */


/**
 * Create save point for the child theme's ACF groups.
 *
 * @return $path
 */
function storybot_child_theme_field_groups( $path ) {
	$path = get_stylesheet_directory() . '/acf-json';
	return $path;
}
add_filter( 'acf/settings/save_json', 'storybot_child_theme_field_groups' );


/**
 * Given an $block object from an ACF block for gutenberg:
 * This will return a string of CSS inline values suitable for
 * inclusion in the block output in PHP.
 *
 * @param  mixed $block
 * @return $style as string
 */
function storybot_blocks_acf_calculate_spacing( $block ) {

	if ( ! empty( $block['style'] ) ) {
		$style_engine = wp_style_engine_get_styles( $block['style'] );
		$style        = $style_engine['css'];
	} else {
		$style = '';
	}

	return $style;
	// echo '<div style="' . $style . '">Block content</div>';
}


/**
 * Register a custom block category for our blocks to live in. We hook into
 * the block_categories_all() filter to do this.
 */
if ( ! function_exists( 'storybot_blocks_custom_category' ) ) {
	/**
	 * Merges our custom category in with the others.
	 *
	 * @param array                   $categories The existing block categories.
	 * @param WP_Block_Editor_Context $editor_context Editor context.
	 */
	function storybot_blocks_custom_category( $categories, $editor_context ) {
		return array_merge(
			$categories,
			array(
				array(
					'slug'  => 'storybot-blocks',
					'title' => __( 'Storybot Blocks', 'storybot-blocks' ),
				),
			)
		);
	}
}
add_filter( 'block_categories_all', 'storybot_blocks_custom_category', 10, 2 );

/**
 * Loops through an array of block folder names.
 * Register blocks via the included 'block.json' and register_block_type()
 */
function storybot_blocks_register_acf_blocks() {

	// require_once get_stylesheet_directory_uri() . '/acf-block-templates/icons.php';

	// Array of block folders to use. Each contains a block.json file.
	$block_includes = array(
		'/storybot-questions',               // Questions block
	);

	// Loop through array items and register each block.
	foreach ( $block_includes as $folder ) {
		register_block_type( get_stylesheet_directory() . '/acf-block-templates' . $folder );
	}
}
add_action( 'init', 'storybot_blocks_register_acf_blocks' );