<?php
/**
 * Nice InfoBoxes.
 *
 * This file handles processes that fire on plugin deactivation.
 *
 * @package   Nice_Infoboxes
 * @author    NiceThemes <hello@nicethemes.com>
 * @license   GPL-2.0+
 * @link      https://nicethemes.com/product/nice-infoboxes
 * @copyright 2016 NiceThemes
 * @since     1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! function_exists( 'nice_infoboxes_remove_settings' ) ) :
add_action( 'nice_infoboxes_deactivate', 'nice_infoboxes_remove_settings' );
/**
 * Remove settings on plugin deactivation.
 *
 * @since 1.0
 */
function nice_infoboxes_remove_settings() {
	/**
	 * Remove plugin data only if requested.
	 */
	$settings = nice_infoboxes_settings();

	if (   ! empty( $settings['remove_data_on_deactivation'] )
	       && $settings['remove_data_on_deactivation']
	) {
		/**
		 * Remove settings holder.
		 */
		delete_option( nice_infoboxes_settings_name() );
	}
}
endif;
