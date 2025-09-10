<?php
/**
 * Storybot theme - Enqueue assets
 *
 * @package storybot-beaumont
 */

add_action( 'wp_enqueue_scripts', 'beaumont_storybot_parent_theme_enqueue_styles' );

/**
 * Enqueue scripts and styles.
 */
function beaumont_storybot_parent_theme_enqueue_styles() {
	wp_enqueue_style( 'beaumont-style', get_template_directory_uri() . '/style.css', array(), '0.1.0' );
	wp_enqueue_style(
		'storybot-style',
		get_stylesheet_directory_uri() . 'dist/theme.css',
		array( 'beaumont-style' ),
		'0.1.0'
	);
}