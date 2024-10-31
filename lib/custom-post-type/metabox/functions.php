<?php
/**
 * NiceThemes Post Type API
 *
 * This file includes functions to handle the admin-facing side of custom post
 * types for the current plugin.
 *
 * @package Nice_Infoboxes_Post_Type
 * @license GPL-2.0+
 * @since   1.1
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Create a metabox.
 *
 * @uses   nice_infoboxes_create()
 *
 * @since  1.1
 *
 * @param  array|null $args
 *
 * @return Nice_Infoboxes_Metabox
 *
 * Accepted $args:
 *
	array(
		'post_types' => {all possible content types},
		'fields'     => array(
			array(
				'type'  => {info|text|select|textarea|upload|checkbox|radio},
				'label' => 'Field label',
				'name'  => 'field-name',
				'desc'  => 'Field description',
			),
		),
		'settings'  => {all possible meta box settings},
	)
 */
function nice_infoboxes_metabox_create( array $args = null ) {
	return nice_infoboxes_create( 'Nice_Infoboxes_Metabox', $args );
}

/**
 * Callback to print a metabox.
 *
 * @see   Nice_Infoboxes_MetaboxCreateResponder::get_metabox_settings()
 *
 * @uses  Nice_Infoboxes_Metabox_HTMLHandler::print_html()
 *
 * @param WP_Post $post Current post.
 * @param array   $data Metabox arguments.
 */
function nice_infoboxes_metabox_print( WP_Post $post, array $data ) {
	do_action( 'nice_infoboxes_metabox', $data['args']['instance'], $post );
}

/**
 * Schedule update process.
 *
 * @since 1.1
 */
function nice_infoboxes_metabox_enqueue_update() {
	add_filter( 'edit_post', 'nice_infoboxes_update' );
}
