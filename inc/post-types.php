<?php
/**
 * Register CPTs & taxonomies for Storybot.
 *
 * @package storybot-beaumont
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register custom post types.
 */
function storybot_register_post_types() {

	// STORY CPT
	register_post_type(
		'story',
		[
			'labels' => [
				'name'               => __( 'Stories', 'storybot-beaumont' ),
				'singular_name'      => __( 'Story', 'storybot-beaumont' ),
				'add_new'            => __( 'Add New', 'storybot-beaumont' ),
				'add_new_item'       => __( 'Add New Story', 'storybot-beaumont' ),
				'edit_item'          => __( 'Edit Story', 'storybot-beaumont' ),
				'new_item'           => __( 'New Story', 'storybot-beaumont' ),
				'view_item'          => __( 'View Story', 'storybot-beaumont' ),
				'search_items'       => __( 'Search Stories', 'storybot-beaumont' ),
				'not_found'          => __( 'No stories found.', 'storybot-beaumont' ),
				'not_found_in_trash' => __( 'No stories found in Trash.', 'storybot-beaumont' ),
			],
			'public'       => true,
			'has_archive'  => true,
			'show_in_rest' => true,
			'menu_icon'    => 'dashicons-book-alt',
			'supports'     => [ 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author' ],
		]
	);

	// QUESTION CPT
	register_post_type(
		'question',
		[
			'labels' => [
				'name'               => __( 'Questions', 'storybot-beaumont' ),
				'singular_name'      => __( 'Question', 'storybot-beaumont' ),
				'add_new'            => __( 'Add New', 'storybot-beaumont' ),
				'add_new_item'       => __( 'Add New Question', 'storybot-beaumont' ),
				'edit_item'          => __( 'Edit Question', 'storybot-beaumont' ),
				'new_item'           => __( 'New Question', 'storybot-beaumont' ),
				'view_item'          => __( 'View Question', 'storybot-beaumont' ),
				'search_items'       => __( 'Search Questions', 'storybot-beaumont' ),
				'not_found'          => __( 'No questions found.', 'storybot-beaumont' ),
				'not_found_in_trash' => __( 'No questions found in Trash.', 'storybot-beaumont' ),
			],
			'public'              => false, // not publicly viewable
			'exclude_from_search' => true,
			'publicly_queryable'  => false,
			'show_ui'             => true,  // manage in admin
			'show_in_rest'        => true,  // block editor / REST
			'menu_icon'           => 'dashicons-editor-help',
			'supports'            => [ 'title', 'editor', 'revisions', 'author' ],
			// 'capability_type'     => [ 'question', 'questions' ],
			'map_meta_cap'        => true,
		]
	);
}
add_action( 'init', 'storybot_register_post_types' );

/**
 * Register taxonomies.
 */
function storybot_register_taxonomies() {

	// STORY taxonomies
	register_taxonomy(
		'genre',
		[ 'story' ],
		[
			'label'        => __( 'Genres', 'storybot-beaumont' ),
			'labels'       => [
				'name'          => __( 'Genres', 'storybot-beaumont' ),
				'singular_name' => __( 'Genre', 'storybot-beaumont' ),
			],
			'hierarchical' => true,
			'show_ui'      => true,
			'show_in_rest' => true,
		]
	);

	register_taxonomy(
		'grade_band',
		[ 'story' ],
		[
			'label'        => __( 'Grade level', 'storybot-beaumont' ),
			'labels'       => [
				'name'          => __( 'Grade level', 'storybot-beaumont' ),
				'singular_name' => __( 'Grade level', 'storybot-beaumont' ),
			],
			'hierarchical' => false,
			'show_ui'      => true,
			'show_in_rest' => true,
		]
	);

	// QUESTION taxonomies
	register_taxonomy(
		'question_type',
		[ 'question' ],
		[
			'label'        => __( 'Question Types', 'storybot-beaumont' ),
			'labels'       => [
				'name'          => __( 'Question Types', 'storybot-beaumont' ),
				'singular_name' => __( 'Question Type', 'storybot-beaumont' ),
			],
			'hierarchical' => false,
			'show_ui'      => true,
			'show_in_rest' => true,
		]
	);

	register_taxonomy(
		'skill',
		[ 'question' ],
		[
			'label'        => __( 'Skills', 'storybot-beaumont' ),
			'labels'       => [
				'name'          => __( 'Skills', 'storybot-beaumont' ),
				'singular_name' => __( 'Skill', 'storybot-beaumont' ),
			],
			'hierarchical' => false,
			'show_ui'      => true,
			'show_in_rest' => true,
		]
	);

    register_taxonomy(
        'standard',
        ['question'],
        [
            'label'        => __( 'Standards', 'storybot-beaumont' ),
            'hierarchical' => false,
            'show_ui'      => true,
            'show_in_rest' => true,
        ]
    );

}
add_action( 'init', 'storybot_register_taxonomies' );
