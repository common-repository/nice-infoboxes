<?php
/**
 * Nice InfoBoxes.
 *
 * Create help tabs for Admin UI.
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

if ( ! function_exists( 'nice_infoboxes_admin_ui_add_help_tabs' ) ) :
add_filter( 'nice_infoboxes_admin_ui_help_tabs', 'nice_infoboxes_admin_ui_add_help_tabs', 10, 2 );
/**
 * Create help tabs.
 *
 * @since 1.0
 *
 * @param array                   $help_tabs List of current help tabs.
 * @param Nice_Infoboxes_Admin_UI $ui        Current Admin UI object.
 *
 * @return array
 */
function nice_infoboxes_admin_ui_add_help_tabs( $help_tabs = array(), Nice_Infoboxes_Admin_UI $ui ) {
	$help_tabs = ! empty( $help_tabs ) && is_array( $help_tabs ) ? $help_tabs : array();

	$help_tabs = array_merge( $help_tabs, array(
		array(
			'section' => 'settings',
			'args'    => array(
				'nice-infoboxes-general-settings' => array(
					'id'      => 'nice-infoboxes-general-settings',
					'title'   => esc_html__( 'General Settings', 'nice-infoboxes' ),
					'content' => $ui->get_template_part( 'help-tab-general', '', true ),
				),
				'nice-infoboxes-advanced-settings' => array(
					'id'      => 'nice-infoboxes-advanced-settings',
					'title'   => esc_html__( 'Advanced Settings', 'nice-infoboxes' ),
					'content' => $ui->get_template_part( 'help-tab-advanced', '', true ),
				),
				'nice-infoboxes-help-support' => array(
					'id'      => 'nice-infoboxes-help-support',
					'title'   => esc_html__( 'Help & Support', 'nice-infoboxes' ),
					'content' => $ui->get_template_part( 'help-tab-help', '', true ),
				),
				'nice-infoboxes-compatible-themes' => array(
					'id'      => 'nice-infoboxes-compatible-themes',
					'title'   => esc_html__( 'Compatible Themes', 'nice-infoboxes' ),
					'content' => $ui->get_template_part( 'help-tab-themes', '', true ),
				),
			),
		),
	) );

	return $help_tabs;
}
endif;
