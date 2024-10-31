<?php
/**
 * Nice InfoBoxes.
 *
 * Manage functionality for localization features.
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

/**
 * The following strings define translatable data that's not tied to any
 * particular output.
 *
 * @since 1.0
 */
$nice_infoboxes_i18n_plugin_data = array(
	'plugin_name'        => esc_html__( 'Nice InfoBoxes', 'nice-infoboxes' ),
	'plugin_name_author' => esc_html__( 'Nice InfoBoxes By NiceThemes', 'nice-infoboxes' ),
	'plugin_description' => esc_html__( 'Show any kind of information in a beautiful and organized way.', 'nice-infoboxes' ),
);

add_filter( 'nice_infoboxes_plugin_i18n_data', 'nice_infoboxes_plugin_i18_domain_path' );
/**
 * Set the right location of language files.
 *
 * @since  1.0
 *
 * @param  array $data
 *
 * @return array
 */
function nice_infoboxes_plugin_i18_domain_path( array $data = array() ) {
	return array_merge( $data, array(
			'path' => nice_infoboxes_plugin_domain() . 'languages',
		)
	);
}
