<?php
/**
 * Nice InfoBoxes.
 *
 * This file contains hooks to manage the custom post types of this plugin.
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

if ( ! function_exists( 'nice_infoboxes_get_post_type' ) ) :
add_filter( 'nice_infoboxes_post_type', 'nice_infoboxes_get_post_type' );
/**
 * Obtain values to construct the infobox custom post type.
 *
 * This file is meant to ensure compatibility with content type standards.
 * {link https://github.com/justintadlock/content-type-standards}
 *
 * @since  1.0
 *
 * @return array
 */
function nice_infoboxes_get_post_type() {
	$labels = array(
		'name'               => esc_html__( 'InfoBoxes',                   'nice-infoboxes' ),
		'singular_name'      => esc_html__( 'InfoBox',                     'nice-infoboxes' ),
		'menu_name'          => esc_html__( 'InfoBoxes',                   'nice-infoboxes' ),
		'name_admin_bar'     => esc_html__( 'InfoBox',                     'nice-infoboxes' ),
		'add_new'            => esc_html__( 'Add New',                     'nice-infoboxes' ),
		'add_new_item'       => esc_html__( 'Add New InfoBox',             'nice-infoboxes' ),
		'edit_item'          => esc_html__( 'Edit InfoBox',                'nice-infoboxes' ),
		'new_item'           => esc_html__( 'New InfoBox',                 'nice-infoboxes' ),
		'view_item'          => esc_html__( 'View InfoBox',                'nice-infoboxes' ),
		'search_items'       => esc_html__( 'Search InfoBox',              'nice-infoboxes' ),
		'not_found'          => esc_html__( 'No infoboxes found',          'nice-infoboxes' ),
		'not_found_in_trash' => esc_html__( 'No infoboxes found in trash', 'nice-infoboxes' ),
		'all_items'          => esc_html__( 'All InfoBoxes',               'nice-infoboxes' ),
	);
	$labels = apply_filters( 'nice_infoboxes_post_type_labels', $labels );

	$args = array(
		'menu_icon'           => 'dashicons-screenoptions',
		'description'         => '',
		'public'              => false,
		'publicly_queryable'  => false,
		'show_in_nav_menus'   => false,
		'show_in_admin_bar'   => true,
		'exclude_from_search' => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 13,
		'can_export'          => true,
		'delete_with_user'    => false,
		'hierarchical'        => false,
		'query_var'           => 'infobox',
		'capability_type'     => 'post',
		'map_meta_cap'        => true,
		'supports' => array(
			'title',
			'editor',
			'thumbnail',
			'page-attributes',
		),
	);
	$args = apply_filters( 'nice_infoboxes_post_type_args', $args );

	$infoboxes_post_type = array(
		'name'            => nice_infoboxes_post_type_name(),
		'labels'          => $labels,
		'args'            => $args,
		'dashicons_glyph' => '\\f180',
	);

	return $infoboxes_post_type;
}
endif;
