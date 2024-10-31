<?php
/**
 * Nice InfoBoxes.
 *
 * This file contains hooks to manage the categories of this plugin.
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

if ( ! function_exists( 'nice_infoboxes_get_category' ) ) :
add_filter( 'nice_infoboxes_category', 'nice_infoboxes_get_category' );
/**
 * Obtain values to construct the category for infoboxes post type.
 *
 * This method is meant to ensure compatibility with content type standards.
 * {link https://github.com/justintadlock/content-type-standards}
 *
 * @since  1.0
 *
 * @return array
 */
function nice_infoboxes_get_category() {
	$labels = array(
		'name'                       => esc_html__( 'Infobox Categories', 'nice-infoboxes' ),
		'singular_name'              => esc_html__( 'Infobox Category',   'nice-infoboxes' ),
		'menu_name'                  => esc_html__( 'Categories',         'nice-infoboxes' ),
		'name_admin_bar'             => esc_html__( 'Category',           'nice-infoboxes' ),
		'search_items'               => esc_html__( 'Search Categories',  'nice-infoboxes' ),
		'popular_items'              => esc_html__( 'Popular Categories', 'nice-infoboxes' ),
		'all_items'                  => esc_html__( 'All Categories',     'nice-infoboxes' ),
		'edit_item'                  => esc_html__( 'Edit Category',      'nice-infoboxes' ),
		'view_item'                  => esc_html__( 'View Category',      'nice-infoboxes' ),
		'update_item'                => esc_html__( 'Update Category',    'nice-infoboxes' ),
		'add_new_item'               => esc_html__( 'Add New Category',   'nice-infoboxes' ),
		'new_item_name'              => esc_html__( 'New Category Name',  'nice-infoboxes' ),
		'parent_item'                => esc_html__( 'Parent Category',    'nice-infoboxes' ),
		'parent_item_colon'          => esc_html__( 'Parent Category:',   'nice-infoboxes' ),
		'separate_items_with_commas' => null,
		'add_or_remove_items'        => null,
		'choose_from_most_used'      => null,
		'not_found'                  => null,
	);
	$labels = apply_filters( 'nice_infoboxes_category_labels', $labels );

	$args = array(
		'public'            => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
		'show_admin_column' => true,
		'hierarchical'      => true,
		'query_var'         => 'infoboxes_category',
	);
	$args = apply_filters( 'nice_infoboxes_category_args', $args );

	$infoboxes_category = array(
		'name'   => 'infoboxes_category',
		'labels' => $labels,
		'args'   => $args,
	);

	return $infoboxes_category;
}
endif;
