<?php
/**
 * NiceThemes Post Type API
 *
 * @package Nice_Infoboxes_Post_Type_API
 * @since   1.1
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Nice_Infoboxes_Post_Type_Dashboard_Glancer
 *
 * Easily add items to the At a Glance Dashboard widget in WordPress 3.8+.
 *
 * @since  1.1
 *
 * @author NiceThemes (originally Gary Jones)
 */
class Nice_Infoboxes_Glancer extends Nice_Infoboxes_Entity {
	/**
	 * Hold all of the items to show.
	 *
	 * @since 1.1
	 *
	 * @type array
	 */
	protected $items;

	/**
	 * Text domain for this class.
	 *
	 * @var string
	 */
	public $textdomain = 'nice-infoboxes-post-type-dashboard-glancer';
}
