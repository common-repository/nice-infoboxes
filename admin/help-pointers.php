<?php
/**
 * Nice InfoBoxes.
 *
 * This file handles help pointers for the admin-facing side of the plugin.
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

if ( ! function_exists( 'nice_infoboxes_admin_pointers_data' ) ) :
add_filter( 'nice_infoboxes_admin_pointers_data', 'nice_infoboxes_admin_pointers_data' );
/**
 * Register help pointers.
 *
 * @since  1.0
 *
 * @param  array $pointers Current lis of help pointers.
 *
 * @return array
 */
function nice_infoboxes_admin_pointers_data( array $pointers = null ) {
	$pointers[] = array(
		'id'       => 'nice_infoboxes_help_pointer',
		'screen'   => nice_infoboxes_post_type_name() . '_page_' . nice_infoboxes_plugin_slug(),
		'target'   => '#navtabs a:first-child',
		'title'    => nice_infoboxes_plugin_name(),
		'content'  => esc_html__( 'Thank you for installing this plugin :) In this page you can set all the available options to display your infoboxes the way you want.', 'nice-infoboxes' ),
		'position' => array(
			'edge'  => 'left',  // top, bottom, left, right
			'align' => 'middle' // top, bottom, left, right, middle
		),
	);

	return $pointers;
}
endif;
