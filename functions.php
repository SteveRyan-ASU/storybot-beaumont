<?php
/**
 * Beaumont-storybot Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package beaumont-storybot
 */

add_action( 'wp_enqueue_scripts', 'beaumont_storybot_parent_theme_enqueue_styles' );

/**
 * Enqueue scripts and styles.
 */
function beaumont_storybot_parent_theme_enqueue_styles() {
	wp_enqueue_style( 'beaumont-style', get_template_directory_uri() . '/style.css', array(), '0.1.0' );
	wp_enqueue_style(
		'beaumont-storybot-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'beaumont-style' ),
		'0.1.0'
	);
}
