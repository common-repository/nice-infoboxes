<?php
/**
 * Nice InfoBoxes.
 *
 * This file handles functionality related to plugin settings.
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

if ( ! function_exists( 'nice_infoboxes_set_default_settings' ) ) :
add_filter( 'nice_infoboxes_default_settings', 'nice_infoboxes_set_default_settings' );
/**
 * Set default plugin settings.
 *
 * @see    nice_infoboxes_default_settings()
 *
 * @since  1.0
 *
 * @return array
 */
function nice_infoboxes_set_default_settings() {
	$file = dirname( __FILE__ ) . '/assets/json/font-awesome.json';
	$package = json_decode( file_get_contents( $file ), true );

	$defaults = array(
		'remove_data_on_deactivation' => false,
		'limit'                       => get_option( 'posts_per_page' ),
		'columns'                     => 3,
		'orderby'                     => 'id',
		'order'                       => 'desc',
		'avoidcss'                    => false,
		'image_size'                  => 'medium',
		'icons'                       => $package['icons'],
	);

	return $defaults;
}
endif;
