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
add_action( 'nice_infoboxes_plugin_enqueue_styles', 'nice_infoboxes_enqueue_font_awesome_styles' );
add_action( 'nice_infoboxes_admin_enqueue_styles', 'nice_infoboxes_enqueue_font_awesome_styles' );
/**
 * Enqueue styles for infoboxes.
 *
 * @since 1.0
 */
function nice_infoboxes_enqueue_font_awesome_styles() {
	$load = true;

	if ( is_admin() ) {
		$screen = get_current_screen();
		$load = nice_infoboxes_post_type_name() == $screen->post_type;
	}

	if ( ! $load ) {
		return;
	}

	// Enqueue Font Awesome styles.
	wp_enqueue_style(
		nice_infoboxes_plugin_slug() . '-font-awesome',
		nice_infoboxes_canonicalize_url( plugins_url( 'assets/css/font-awesome.min.css', __FILE__ ) ),
		array(),
		nice_infoboxes_plugin_version()
	);
}
endif;
