<?php
/**
 * Nice InfoBoxes by NiceThemes.
 *
 * Enqueue scripts for admin-facing side.
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

if ( ! function_exists( 'nice_infoboxes_admin_enqueue_scripts' ) ) :
add_action( 'nice_infoboxes_admin_enqueue_scripts', 'nice_infoboxes_admin_enqueue_scripts' );
/**
 * Register and enqueue admin-specific JavaScript.
 *
 * @since 1.0
 */
function nice_infoboxes_admin_enqueue_scripts() {
	// Obtain plugin slug and version.
	$slug    = nice_infoboxes_plugin_slug();
	$version = nice_infoboxes_plugin_version();

	// Obtain whether or not we're in debug mode.
	$debug = ( nice_infoboxes_debug() || nice_infoboxes_development_mode() );

	// Define script URLs.
	$scripts = array(
		$slug . '-admin-notices-script' => NICE_INFOBOXES_ADMIN_ASSETS_URL . ( $debug ? 'js/nice-infoboxes-admin-notices.js' : 'js/min/nice-infoboxes-admin-notices.min.js' ),
		$slug . '-admin-script'         => NICE_INFOBOXES_ADMIN_ASSETS_URL . ( $debug ? 'js/nice-infoboxes-admin.js' : 'js/min/nice-infoboxes-admin.min.js' ),
	);

	/**
	 * Admin notices script.
	 */
	if ( nice_infoboxes_admin_is_update_notice_enabled() ) {
		wp_register_script( $slug . '-admin-notices-script', $scripts[ $slug . '-admin-notices-script' ], array( 'jquery' ), $version );
		wp_enqueue_script( $slug . '-admin-notices-script' );

		wp_localize_script( $slug . '-admin-notices-script', 'nice_infoboxes_admin_notices_vars', array(
			'ajax_url' => admin_url() . 'admin-ajax.php',
			'nonce'    => wp_create_nonce( 'nice-infoboxes-admin-notices-nonce' ),
		) );
	}

	/**
	 * Main admin script.
	 */
	$screen = get_current_screen();

	if ( 'edit' !== $screen->base ) {
		global $post;

		if ( ! empty( $post ) ) {
			if ( nice_infoboxes_post_type_name() === $post->post_type ) {
				wp_register_script( $slug . '-admin-script', $scripts[ $slug . '-admin-script' ], array( 'jquery', 'wp-color-picker' ), $version );
				wp_enqueue_script( $slug . '-admin-script' );
			}
		}
	}
}
endif;

if ( ! function_exists( 'nice_infoboxes_admin_inline_styles' ) ) :
add_action( 'admin_head', 'nice_infoboxes_admin_inline_styles' );
/**
 * Add inline styles for admin side.
 *
 * @since 1.0
 */
function nice_infoboxes_admin_inline_styles() {
	$screen = get_current_screen();

	if ( $screen instanceof  WP_Screen ) {
		if ( 'edit' !== $screen->base ) {
			global $post;

			if ( ! empty( $post ) ) {
				if ( nice_infoboxes_post_type_name() === $post->post_type ) {
					global $_wp_admin_css_colors;

					$color  = get_user_meta( get_current_user_id(), 'admin_color', true );
					$scheme = $_wp_admin_css_colors[ $color ];

					?>
						<style>
							.nice-infobox-icon.selected {
								background: <?php echo esc_attr( $scheme->colors[2] ); ?>;
								box-shadow: 0 0 0 4px <?php echo esc_attr( $scheme->colors[2] ); ?>;
							}

							.nice-infobox-icon .button-link.check .media-modal-icon {
								background-color: <?php echo esc_attr( $scheme->colors[2] ); ?>;
								box-shadow: 0 0 0 1px <?php echo esc_attr( $scheme->colors[2] ); ?>;
							}
						</style>
					<?php
				}
			}
		}
	}
}
endif;
