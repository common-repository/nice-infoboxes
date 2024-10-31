<?php
/**
 * Nice InfoBoxes.
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

add_shortcode( 'infoboxes', 'nice_infoboxes_shortcode' );
/**
 * Process HTML for the `infoboxes` shortcode.
 *
 * @since  1.0
 *
 * @param  array       $atts
 *
 * @return string
 */
function nice_infoboxes_shortcode( $atts = array() ) {
	// Obtain plugin settings.
	$settings = nice_infoboxes_settings();

	// Normalize attributes.
	$atts = shortcode_atts( array(
		'avoidcss'           => '',
		'limit'              => $settings['limit'],
		'columns'            => $settings['columns'],
		'orderby'            => $settings['orderby'],
		'order'              => $settings['order'],
		'category'           => '',
		'exclude_category'   => '',
		'image_width'        => null,
		'image_height'       => null,
	), $atts, 'infoboxes' );
	$atts = apply_filters( 'nice_infoboxes_shortcode_atts', $atts );

	$output = nice_infoboxes_shortcode_output( $atts );
	$output = apply_filters( 'nice_infoboxes_shortcode', $output, $atts );

	return $output;
}

if ( ! function_exists( 'nice_infoboxes_shortcode_output' ) ) :
/**
 * Build HTML output for the `infoboxes` shortcode.
 *
 * @since 1.0
 *
 * @param  array  $atts Shortcode attributes.
 * @return string
 */
function nice_infoboxes_shortcode_output( $atts ) {
	// Build query for taxonomies.
	$tax_query = array();

	$category_name = nice_infoboxes_category_name();

	if ( $atts['category'] ) {
		$tax_query[] = array(
			'taxonomy' => $category_name,
			'field'    => 'id',
			'terms'    => explode( ',', $atts['category'] ),
		);
	}
	if ( $atts['exclude_category'] ) {
		$tax_query[] = array(
			'taxonomy' => $category_name,
			'field'    => 'id',
			'terms'    => explode( ',', $atts['exclude_category'] ),
			'operator' => 'NOT IN',
		);
	}

	// Obtain query arguments.
	$query_args = array(
		'avoidcss'     => ( 'true' === $atts['avoidcss'] || '1' === $atts['avoidcss'] ),
		'orderby'      => $atts['orderby'],
		'order'        => $atts['order'],
		'limit'        => $atts['limit'],
		'tax_query'    => $tax_query,
		'columns'      => $atts['columns'],
		'image_width'  => $atts['image_width'],
		'image_height' => $atts['image_height'],
	);
	$query_args = apply_filters( 'nice_infoboxes_shortcode_query_args', $query_args );

	// Obtain generated output.
	$output = nice_infoboxes( $query_args );
	$output = apply_filters( 'nice_infoboxes_shortcode_output', $output );

	return $output;
}
endif;
