<?php
/**
 * Nice InfoBoxes by NiceThemes.
 *
 * Create notices for admin-facing side.
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


if ( ! function_exists( 'nice_infoboxes_admin_enable_update_notice' ) ) :
/**
 * Enable (show) the update notice for the current user.
 *
 * @since 1.0
 */
function nice_infoboxes_admin_enable_update_notice() {
	delete_user_option( get_current_user_id(), 'nice_infoboxes_admin_disable_update_notice' );
}
endif;

if ( ! function_exists( 'nice_infoboxes_admin_disable_update_notice' ) ) :
/**
 * Disable (hide) the update notice for the current user.
 *
 * @since 1.0
 */
function nice_infoboxes_admin_disable_update_notice() {
	update_user_option( get_current_user_id(), 'nice_infoboxes_admin_disable_update_notice', true );
}
endif;

if ( ! function_exists( 'nice_infoboxes_admin_is_update_notice_enabled' ) ) :
/**
 * Obtain whether or not the update notice is enabled for the current user.
 *
 * @since 1.0
 */
function nice_infoboxes_admin_is_update_notice_enabled() {
	return ! nice_infoboxes_bool( get_user_option( 'nice_infoboxes_admin_disable_update_notice', get_current_user_id() ) );
}
endif;


if ( ! function_exists( 'nice_infoboxes_admin_update_notice' ) ) :
add_action( 'admin_notices', 'nice_infoboxes_admin_update_notice' );
/**
 * Add an update notice.
 *
 * @since 1.0
 */
function nice_infoboxes_admin_update_notice() {
	// Return early if we're in an AJAX context.
	if ( nice_infoboxes_doing_ajax() ) {
		return;
	}

	$screen = get_current_screen();

	// Don't load the notice in plugin settings page.
	if ( nice_infoboxes_post_type_name() . '_page_' . nice_infoboxes_plugin_slug() === $screen->id ) {
		return;
	}

	// Don't load the notice if the user dismissed it.
	if ( nice_infoboxes_admin_is_update_notice_enabled() ) {
		global $current_user;

		/**
		 * Construct URLs using a nonce.
		 *
		 * {@link http://codex.wordpress.org/Function_Reference/wp_nonce_url}
		 */
		$settings_url = wp_nonce_url(
			admin_url( 'admin.php?page=' . nice_infoboxes_plugin_slug() ),
			'nice_infoboxes_admin_disable_update_notice',
			'nice_infoboxes_admin_disable_update_notice_nonce'
		);
		$settings_url = apply_filters( 'nice_infoboxes_admin_settings_url', $settings_url );

		// Begin output.
		$output = '';

		$output .= '<div id="nice_infoboxes_admin_update_notice" class="nice-wp-notice notice notice-warning is-dismissible"><p>';
		$output .= sprintf( esc_html__( 'You just installed %1$s. Go to %2$sInfoBoxes Settings%3$s to configure the plugin or %4$sdismiss this message%5$s.', 'nice-infoboxes' ), '<strong>' . esc_html( nice_infoboxes_plugin_name() ) . '</strong>', '<a href="' . esc_url( $settings_url ) . '">', '</a>', '<a class="nice-notice-dismiss" href="#">', '</a>' );
		$output .= '</p></div>';

		$output = apply_filters( 'nice_infoboxes_admin_update_notice', $output, $current_user );

		echo $output; // WPCS: XSS ok.
	}
}
endif;

if ( ! function_exists( 'nice_infoboxes_admin_dismiss_update_notice' ) ) :
add_action( 'admin_init', 'nice_infoboxes_admin_dismiss_update_notice' );
add_action( 'wp_ajax_nice_infoboxes_admin_dismiss_update_notice', 'nice_infoboxes_admin_dismiss_update_notice' );
/**
 * Add a flag to dismiss the admin notice. A method like this can be used
 * for automated update processes.
 *
 * This method implements secure nonce verification.
 *
 * @since 1.0
 *
 * @use   wp_verify_nonce()
 * {@link http://codex.wordpress.org/Function_Reference/wp_verify_nonce}
 */
function nice_infoboxes_admin_dismiss_update_notice() {
	if ( nice_infoboxes_doing_ajax() ) {
		$disable_update_notice = ( isset( $_POST['nonce'] ) && wp_verify_nonce( wp_unslash( $_POST['nonce'] ), 'nice-infoboxes-admin-notices-nonce' ) );
	} else {
		$disable_update_notice = ( isset( $_GET['nice_infoboxes_admin_disable_update_notice_nonce'] ) && wp_verify_nonce( wp_unslash( $_GET['nice_infoboxes_admin_disable_update_notice_nonce'] ), 'nice_infoboxes_admin_disable_update_notice' ) );
	}

	if ( $disable_update_notice ) {
		nice_infoboxes_admin_disable_update_notice();
	}
}
endif;

if ( ! function_exists( 'nice_infoboxes_admin_ui_capture_wp_notices' ) ) :
add_action( 'nice_infoboxes_admin_ui_capture_wp_notices', 'nice_infoboxes_admin_ui_capture_wp_notices' );
/**
 * Capture WP notices only in plugin settings pages.
 *
 * @since 1.0
 */
function nice_infoboxes_admin_ui_capture_wp_notices() {
	$screen = get_current_screen();

	if ( nice_infoboxes_post_type_name() . '_page_' . nice_infoboxes_plugin_slug() === $screen->id ) {
		return true;
	}

	return false;
}
endif;
