<?php
/**
 * Nice InfoBoxes.
 *
 * Extra styles for Admin UI.
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

if ( ! function_exists( 'nice_infoboxes_admin_ui_add_style' ) ) :
add_filter( 'nice_infoboxes_admin_ui_style_extra', 'nice_infoboxes_admin_ui_add_style' );
/**
 * Add custom CSS file to Admin UI.
 *
 * @since 1.0
 */
function nice_infoboxes_admin_ui_add_style() {
	$url = plugin_dir_url( __FILE__ ) . '../assets/css/nice-infoboxes-admin-ui.css';
	$url = nice_infoboxes_canonicalize_url( $url );

	return $url;
}
endif;
