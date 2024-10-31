<?php
/**
 * Register groups of settings for Admin UI.
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

if ( ! function_exists( 'nice_infoboxes_admin_ui_settings_groups' ) ) :
add_filter( 'nice_infoboxes_admin_ui_settings_groups', 'nice_infoboxes_admin_ui_settings_groups' );
/**
 * Create groups of settings.
 *
 * @since 1.0
 */
function nice_infoboxes_admin_ui_settings_groups() {
	$general_settings = array(
		'general-settings' => array(
			'title'       => esc_html__( 'General Settings', 'nice-infoboxes' ),
			'description' => esc_html__( 'Configure how your infoboxes will be displayed by default. All these options can be overridden in a shortcode basis.', 'nice-infoboxes' ),
		),
	);

	$advanced_settings = array(
		'advanced-settings' => array(
			'title'       => esc_html__( 'Advanced Settings', 'nice-infoboxes' ),
			'description' => esc_html__( 'Options presented here are for advanced users only, so you must use them carefully.', 'nice-infoboxes' ),
		),
	);

	$settings_groups = array(
		array(
			'tab'     => 'general',
			'section' => 'settings',
			'args'    => $general_settings,
		),
		array(
			'tab'     => 'advanced',
			'section' => 'settings',
			'args'    => $advanced_settings,
		),
	);

	return $settings_groups;
}
endif;
