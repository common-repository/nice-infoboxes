<?php
/**
 * Nice InfoBoxes.
 *
 * This file contains actions to register the infobox post type.
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

if ( ! function_exists( 'nice_infoboxes_add_post_type' ) ) :
add_filter( 'nice_infoboxes_post_types', 'nice_infoboxes_add_post_type' );
/**
 * Register the infoboxes post type using our CPT creator library.
 *
 * @since 1.0
 *
 * @param  array $post_types Current list of post type data.
 *
 * @return array
 */
function nice_infoboxes_add_post_type( array $post_types = array() ) {
	/**
	 * Prepare arguments.
	 */
	$args = array(
		'args'       => apply_filters( 'nice_infoboxes_post_type', array() ),
		'taxonomies' => array(
			apply_filters( 'nice_infoboxes_category', array() )
		),
		'textdomain' => 'nice-infoboxes',
	);
	$args = apply_filters( 'nice_infoboxes_register_infoboxes_args', $args );

	$post_types[] = $args;

	return $post_types;
}
endif;
