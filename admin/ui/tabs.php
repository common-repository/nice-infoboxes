<?php
/**
 * Nice InfoBoxes.
 *
 * Register section tabs for Admin UI.
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

if ( ! function_exists( 'nice_infoboxes_admin_ui_tabs' ) ) :
add_action( 'nice_infoboxes_admin_ui_tabs', 'nice_infoboxes_admin_ui_tabs' );
/**
 * Create tabs.
 *
 * @since 1.0
 */
function nice_infoboxes_admin_ui_tabs() {
	$tabs = array(
		array(
			'section' => 'settings',
			'args'    => array(
				'general' => array(
					'title'    => esc_html__( 'General', 'nice-infoboxes' ),
					'icon'     => 'dashicons-admin-generic',
					'priority' => 10,
				),
			),
		),
		array(
			'section' => 'settings',
			'args'    => array(
				'advanced' => array(
					'title'    => esc_html__( 'Advanced', 'nice-infoboxes' ),
					'icon'     => 'dashicons-admin-settings',
					'priority' => 30,
				),
			),
		),
	);

	return $tabs;
}
endif;
