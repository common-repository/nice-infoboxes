<?php
/**
 * NiceThemes Plugin API
 *
 * This file contains general helper functions that allow interactions with
 * this module in an easier way.
 *
 * @package Nice_Infoboxes_Plugin_API
 * @license GPL-2.0+
 * @since   1.0
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'nice_infoboxes_integration_create' ) ) :
/**
 * Create and obtain a new instance of Nice_Infoboxes_Integration.
 *
 * @since  1.0
 *
 * @uses   nice_infoboxes_create()
 *
 * @param  array $data Data to create the new instance.
 *
 * @return Nice_Infoboxes_Integration
 */
function nice_infoboxes_integration_create( array $data ) {
	return nice_infoboxes_create( 'Nice_Infoboxes_Integration', $data );
}
endif;
