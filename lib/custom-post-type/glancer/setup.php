<?php
/**
 * NiceThemes Post Type API
 *
 * This file hooks processes to internal actions within this domain.
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
 * Fire the display action for this domain once a glancer has been created.
 *
 * @since 1.0
 *
 * @uses  nice_infoboxes_display()
 *
 * Hook origin:
 * @see Nice_Infoboxes_GlancerCreateResponder::loaded()
 */
add_action( 'nice_infoboxes_glancer_created', 'nice_infoboxes_display' );
