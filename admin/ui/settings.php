<?php
/**
 * Nice InfoBoxes.
 *
 * Register settings for Admin UI.
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

if ( ! function_exists( 'nice_infoboxes_admin_ui_settings' ) ) :
add_filter( 'nice_infoboxes_admin_ui_settings', 'nice_infoboxes_admin_ui_settings' );
/**
 * Create tabs.
 *
 * @since 1.0
 */
function nice_infoboxes_admin_ui_settings() {
	// Fields for General tab.
	$general_settings = array(
		'limit' => array(
			'id'          => 'limit',
			'title'       => esc_html__( 'Number of InfoBoxes', 'nice-infoboxes' ),
			'description' => esc_html__( 'The number of infoboxes to be displayed in a list. A value of 0 (zero) means no infoboxes will display. Use -1 (minus one) to display unlimited infoboxes.', 'nice-infoboxes' ) . ' ' . sprintf( esc_html__( 'You can override this setting in shortcodes using the %s property.', 'nice-infoboxes' ), '<code>limit</code>' ),
			'type'        => 'text-small',
			'priority'    => 10,
		),
		'columns' => array(
			'id'          => 'columns',
			'title'       => esc_html__( 'Number of Columns', 'nice-infoboxes' ),
			'description' => esc_html__( 'The number of columns of infoboxes.', 'nice-infoboxes' ) . ' ' . sprintf( esc_html__( 'You can override this setting in shortcodes using the %s property.', 'nice-infoboxes' ), '<code>columns</code>' ),
			'type'        => 'text-small',
			'priority'    => 20,
		),
		'orderby' => array(
			'id'          => 'orderby',
			'title'       => esc_html__( 'Order items by', 'nice-infoboxes' ),
			'description' => sprintf( esc_html__( 'You can override this setting in shortcodes using the %s property.', 'nice-infoboxes' ), '<code>orderby</code>' ),
			'type'        => 'select',
			'options'     => array(
				'ID'         => esc_html__( 'Infobox ID', 'nice-infoboxes' ),
				'title'      => esc_html__( 'Title', 'nice-infoboxes' ),
				'menu_order' => esc_html__( 'Menu Order', 'nice-infoboxes' ),
				'date'       => esc_html__( 'Date', 'nice-infoboxes' ),
				'random'     => esc_html__( 'Random Order', 'nice-infoboxes' ),
			),
			'placeholder' => esc_html__( 'Select an option', 'nice-infoboxes' ),
			'priority'    => 30,
		),
		'order' => array(
			'id'          => 'order',
			'title'       => esc_html__( 'Sort items by', 'nice-infoboxes' ),
			'description' => sprintf( esc_html__( 'You can override this setting in shortcodes using the %s property.', 'nice-infoboxes' ), '<code>order</code>' ),
			'type'        => 'select',
			'options'     => array(
				'asc'  => esc_html__( 'Ascending Order', 'nice-infoboxes' ),
				'desc' => esc_html__( 'Descending Order', 'nice-infoboxes' ),
			),
			'placeholder' => esc_html__( 'Select an option', 'nice-infoboxes' ),
			'priority'    => 40,
		),
		'avoidcss' => array(
			'id'          => 'avoidcss',
			'title'       => esc_html__( 'Avoid Plugin CSS', 'nice-infoboxes' ),
			'description' => esc_html__( 'Apply styles to infoboxes using your own CSS.', 'nice-infoboxes' ),
			'type'        => 'checkbox',
			'priority'    => 50,
		),
	);

	// Fields for Advanced tab.
	$advanced_settings = array(
		'remove_data_on_deactivation' => array(
			'id'          => 'remove_data_on_deactivation',
			'title'       => esc_html__( 'Remove Data On Deactivation', 'nice-infoboxes' ),
			'description' => esc_html__( 'Delete all plugin settings once you deactivate it.', 'nice-infoboxes' ),
			'type'        => 'checkbox',
			'priority'    => 0,
		),
	);

	// Construct settings array.
	$settings = array(
		'general'  => array(
			'settings_section' => 'general-settings',
			'tab'              => 'general',
			'section'          => 'settings',
			'args'             => $general_settings,
		),
		'advanced' => array(
			'settings_section' => 'advanced-settings',
			'tab'              => 'advanced',
			'section'          => 'settings',
			'args'             => $advanced_settings,
		),
	);

	return $settings;
}
endif;
