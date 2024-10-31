<?php
/**
 * Nice InfoBoxes.
 *
 * This file contains a library of helper functions.
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

if ( ! function_exists( 'nice_infoboxes_post_type_name' ) ) :
/**
 * Name of main custom post type of this plugin.
 *
 * @since 1.0
 */
function nice_infoboxes_post_type_name() {
	return apply_filters( 'nice_infoboxes_post_type_name', 'infobox' );
}
endif;

if ( ! function_exists( 'nice_infoboxes_category_name' ) ) :
/**
 * Name of main taxonomy of this plugin.
 *
 * @since 1.0
 */
function nice_infoboxes_category_name() {
	return apply_filters( 'nice_infoboxes_category_name', 'infoboxes_category' );
}
endif;

if ( ! function_exists( 'nice_infoboxes_icons' ) ) :
/**
 * Obtain the list of available icons from Font Awesome.
 *
 * @since 1.0
 */
function nice_infoboxes_icons() {
	$settings = nice_infoboxes_settings();

	return apply_filters( 'nice_infoboxes_icons', (array)$settings['icons'] );
}
endif;

if ( ! function_exists( 'nice_infoboxes_icon_class' ) ) :
/**
 * Obtain HTML class for a given icon ID.
 *
 * @since  1.0
 *
 * @param  string $icon_id
 *
 * @return string
 */
function nice_infoboxes_icon_class( $icon_id = '' ) {
	return apply_filters( 'nice_infoboxes_icon_class', 'fa fa-' . $icon_id, $icon_id );
}
endif;

if ( ! function_exists( 'nice_infoboxes_icon_can_select_color' ) ) :
/**
 * Check if we can select the color of the infobox icon.
 *
 * @since 1.0
 */
function nice_infoboxes_icon_can_select_color() {
	return apply_filters( 'nice_infoboxes_icon_can_select_color', true );
}
endif;

if ( ! function_exists( 'nice_infoboxes_icon_default_color' ) ) :
/**
 * Obtain the default color for icons.
 *
 * @since 1.0
 */
function nice_infoboxes_icon_default_color() {
	return apply_filters( 'nice_infoboxes_icon_default_color', '#444444' );
}
endif;

if ( ! function_exists( 'nice_infoboxes_get_post_meta' ) ) :
/**
 * Get meta data of a project.
 *
 * @since 1.0
 *
 * @param  WP_Post $post
 * @return array
 */
function nice_infoboxes_get_post_meta( $post ) {
	$project_meta = array(
		'infobox_link_icon'         => get_post_meta( $post->ID, '_infobox_link_icon', true ),
		'infobox_link_url'          => get_post_meta( $post->ID, '_infobox_link_url', true ),
		'infobox_link_text'         => get_post_meta( $post->ID, '_infobox_link_text', true ),
		'infobox_link_display'      => get_post_meta( $post->ID, '_infobox_link_display', true ),
		'infobox_link_target_blank' => get_post_meta( $post->ID, '_infobox_link_target_blank', true ),
	);
	$project_meta = apply_filters( 'nice_infoboxes_post_meta', $project_meta );

	return $project_meta;
}
endif;
