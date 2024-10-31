<?php
/**
 * Nice InfoBoxes.
 *
 * Register footer links for Admin UI.
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

if ( ! function_exists( 'nice_infoboxes_admin_ui_add_footer_links' ) ) :
add_filter( 'nice_infoboxes_admin_ui_footer_links', 'nice_infoboxes_admin_ui_add_footer_links' );
/**
 * Create footer links.
 *
 * @since 1.0
 */
function nice_infoboxes_admin_ui_add_footer_links() {
	$footer_links = array(
		array(
			'id'   => 'nice-admin-ui-link-themes',
			'text' => esc_html__( 'Themes', 'nice-infoboxes' ),
			'href' => 'http://nicethemes.com/themes/',
			'target' => '_blank',
		),
		array(
			'id'   => 'nice-admin-ui-link-plugins',
			'text' => esc_html__( 'Plugins', 'nice-infoboxes' ),
			'href' => 'http://nicethemes.com/plugins/',
			'target' => '_blank',
		),
		array(
			'id'     => 'nice-admin-ui-link-support',
			'text'   => esc_html__( 'Help & Support', 'nice-infoboxes' ),
			'href'   => 'http://nicethemes.com/support/',
			'target' => '_blank',
		),
		array(
			'id'     => 'nice-admin-ui-link-rate',
			'text'   => esc_html__( 'Rate this plugin', 'nice-infoboxes' ),
			'href'   => 'https://wordpress.org/support/view/plugin-reviews/nice-infoboxes?rate=5#postform',
			'target' => '_blank',
		),
	);

	return $footer_links;
}
endif;
