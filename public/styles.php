<?php
/**
 * Nice InfoBoxes.
 *
 * This file includes actions to handle styles for the public-facing side of
 * the plugin.
 *
 * @package Nice_Infoboxes
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! function_exists( 'nice_infoboxes_enqueue_styles' ) ) :
add_action( 'nice_infoboxes_plugin_enqueue_styles', 'nice_infoboxes_enqueue_styles' );
/**
 * Enqueue styles for infoboxes.
 *
 * @since 1.0
 */
function nice_infoboxes_enqueue_styles() {
	if ( nice_infoboxes_needs_assets() ) {
		// Enqueue infoboxes styles.
		wp_enqueue_style(
			nice_infoboxes_plugin_slug() . '-styles',
			nice_infoboxes_canonicalize_url( plugins_url( 'assets/css/nice-infoboxes.css', __FILE__ ) ),
			array(),
			nice_infoboxes_plugin_version()
		);

		$inline_style = '.nice-infoboxes.default-styles .nice-infobox-icon { color: ' . nice_infoboxes_icon_default_color() . '}';
		wp_add_inline_style( nice_infoboxes_plugin_slug() . '-styles', $inline_style );
	}
}
endif;
