<?php
/**
 * Additional functions for Advanced Custom Fields.
 *
 * Contents:
 *   - Register save path for ACF fields directly into child theme.
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