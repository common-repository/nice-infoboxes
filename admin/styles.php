<?php
/**
 * Nice InfoBoxes.
 *
 * Enqueue styles for admin-facing side.
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

if ( ! function_exists( 'nice_infoboxes_admin_enqueue_styles' ) ) :
add_action( 'admin_enqueue_scripts', 'nice_infoboxes_admin_enqueue_styles' );
/**
 * Register and enqueue admin-specific stylesheet.
 *
 * @since 1.0
 */
function nice_infoboxes_admin_enqueue_styles() {
	$screen = get_current_screen();

	if ( nice_infoboxes_post_type_name() === $screen->post_type ) {
		wp_register_style(
			nice_infoboxes_plugin_slug() . '-admin-styles',
			nice_infoboxes_canonicalize_url( plugins_url( 'assets/css/nice-infoboxes-admin.css', __FILE__ ) ),
			array(),
			nice_infoboxes_plugin_version()
		);
		wp_enqueue_style( nice_infoboxes_plugin_slug() . '-admin-styles' );
	}

	if ( 'edit' !== $screen->base ) {
		global $post;

		if ( ! empty( $post ) ) {
			if ( nice_infoboxes_post_type_name() === $post->post_type ) {
				wp_enqueue_style( 'wp-color-picker' );
			}
		}
	}
}
endif;
