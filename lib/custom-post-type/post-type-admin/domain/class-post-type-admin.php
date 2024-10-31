<?php
/**
 * NiceThemes Post Type API
 *
 * @package Nice_Infoboxes_Post_Type_API
 * @license GPL-2.0+
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Nice_Infoboxes_Post_Type_Admin' ) ) :
/**
 * Register post types and taxonomies.
 *
 * @package Nice_Infoboxes_Post_Type
 * @since   1.1
 */
class Nice_Infoboxes_Post_Type_Admin extends Nice_Infoboxes_Entity {
	/**
	 * Registered post type object.
	 *
	 * @var Nice_Infoboxes_Post_Type
	 */
	protected $post_type;

	/**
	 * Data for Dashboard at a Glance.
	 *
	 * @var   Nice_Infoboxes_Glancer
	 * @since 1.1
	 */
	protected $glancer;

	/**
	 * Text domain for this class.
	 *
	 * @var  string
	 * since 1.1
	 */
	protected $textdomain = 'nice-infoboxes-post-type-admin';
}
endif;
