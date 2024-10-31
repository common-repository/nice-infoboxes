<?php
/**
 * Nice InfoBoxes.
 *
 * Register sections for Admin UI.
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

if ( ! function_exists( 'nice_infoboxes_admin_ui_add_sections' ) ) :
add_filter( 'nice_infoboxes_admin_ui_sections', 'nice_infoboxes_admin_ui_add_sections' );
/**
 * Create sections.
 *
 * @since 1.0
 */
function nice_infoboxes_admin_ui_add_sections() {
	$sections = array(
		'settings' => array(
			'title'         => esc_html__( 'Settings', 'nice-infoboxes' ),
			'heading_title' => esc_html__( 'Nice InfoBoxes Settings', 'nice-infoboxes' ),
			'icon'          => 'dashicons-admin-settings',
			'description'   => '<p>' . esc_html__( 'Welcome to the Settings Panel. Here you can set up and configure all of the different options for this magnificent plugin.', 'nice-infoboxes' ) . '</p>',
			'priority'      => 10,
		),
		'about' => array(
			'title'         => esc_html__( 'About', 'nice-infoboxes' ),
			'heading_title' => esc_html__( 'About Nice InfoBoxes', 'nice-infoboxes' ),
			'icon'          => 'dashicons-info',
			'priority'      => 20,
		),
	);

	return $sections;
}
endif;
