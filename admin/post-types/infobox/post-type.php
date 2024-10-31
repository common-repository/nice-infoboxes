<?php
/**
 * Nice InfoBoxes.
 *
 * This file includes hooks to manage the admin-facing side of the infobox
 * custom post type.
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

if ( ! function_exists( 'nice_infoboxes_relocate_image' ) ) :
add_filter( 'nice_infoboxes_post_type_add_image_column', 'nice_infoboxes_relocate_image' );
/**
 * Move featured image to the first column in the list of infoboxes items.
 *
 * @since 1.0
 *
 * @param  array $columns
 * @return array
 */
function nice_infoboxes_relocate_image( $columns ) {
	if ( nice_infoboxes_doing_ajax() && isset( $_POST['post_ID'] ) ) { // WPCS: CSRF ok.
		$post_type = get_post_type( intval( $_POST['post_ID'] ) ); // WPCS: CSRF ok.
	}

	if ( empty( $post_type ) ) {
		$post_type = get_query_var( 'post_type' );
	}

	if ( empty( $post_type ) ) {
		return $columns;
	}

	if ( isset( $columns['thumbnail'] ) && nice_infoboxes_post_type_name() === $post_type ) {
		// Store the original key and value for the thumbnail.
		$new_columns['thumbnail'] = $columns['thumbnail'];

		// Remove value from original array.
		unset( $columns['thumbnail'] );

		// Divide the original array in two by the necessary position.
		$f = array_splice( $columns, 0, array_search( 'cb', array_keys( $columns ) ) + 1 );

		// Put the parts together again as needed.
		$columns = array_merge( $f, $new_columns, $columns );
	}
	$columns = apply_filters( 'nice_infoboxes_relocate_image', $columns );

	return $columns;
}
endif;

if ( ! function_exists( 'nice_infoboxes_post_type_display_image' ) ) :
add_filter( 'nice_infoboxes_post_type_display_image', 'nice_infoboxes_post_type_display_image' );
/**
 * Replace the featured image in the infobox list with the selected icon when
 * available.
 *
 * @since  1.0
 *
 * @param  string $image
 *
 * @return string
 */
function nice_infoboxes_post_type_display_image( $image = '' ) {
	$meta = nice_infoboxes_get_post_meta( get_post() );

	if ( ! empty( $meta['infobox_link_icon'] ) ) {
		$icon_color = $meta['infobox_link_icon']['color'];
		$color = nice_infoboxes_icon_can_select_color() && $icon_color ? $icon_color : nice_infoboxes_icon_default_color();

		$image = '<span class="icon"><i class="' . esc_attr( nice_infoboxes_icon_class( $meta['infobox_link_icon']['id'] ) ) . '" style="color: ' . esc_attr( $color ) . ';"></i></span>';
	}

	return $image;
}
endif;

if ( ! function_exists( 'nice_infoboxes_post_updated_messages' ) ) :
add_filter( 'post_updated_messages', 'nice_infoboxes_post_updated_messages' );
/**
 * Add custom messages after updating an infobox.
 *
 * @since  1.0
 *
 * @param  array $messages
 * @return array
 */
function nice_infoboxes_post_updated_messages( $messages ) {
	global $post;

	$post_type_name = nice_infoboxes_post_type_name();

	if ( $post_type_name === $post->post_type ) {
		$infobox_updated_messages = array(
			0  => '', // Unused. Messages start at index 1.
			1  => sprintf(
				esc_html__( 'InfoBox updated.', 'nice-infoboxes' ),
				esc_url( get_permalink( $post->ID ) )
			),
			2  => esc_html__( 'Custom field updated.', 'nice-infoboxes' ),
			3  => esc_html__( 'Custom field deleted.', 'nice-infoboxes' ),
			4  => esc_html__( 'Infobox updated.', 'nice-infoboxes' ),
			/* translators: %s: date and time of the revision */
			5  => isset( $_GET['revision'] ) ? sprintf( esc_html__( 'InfoBox restored to revision from %s', 'nice-infoboxes' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6  => sprintf(
				esc_html__( 'InfoBox published.', 'nice-infoboxes' ),
				esc_url( get_permalink( $post->ID ) )
			),
			7  => esc_html__( 'InfoBox saved.', 'nice-infoboxes' ),
			8  => sprintf(
				esc_html__( 'InfoBox submitted.', 'nice-infoboxes' ),
				esc_url( add_query_arg( 'preview', 'true', get_permalink( $post->ID ) ) )
			),
			9  => sprintf(
				wp_kses( __( 'InfoBox scheduled for: <strong>%s</strong>.', 'nice-infoboxes' ), array( 'strong' => array() ) ),
				// translators: Publish box date format, see http://php.net/date
				date_i18n( esc_html__( 'M j, Y @ G:i', 'nice-infoboxes' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post->ID ) )
			),
			10 => esc_html__( 'InfoBox draft updated.', 'nice-infoboxes' ),
		);
		$infobox_updated_messages = apply_filters(
			'nice_infoboxes_post_updated_messages',
			$infobox_updated_messages
		);

		$messages[ $post_type_name ] = $infobox_updated_messages;
	}

	return $messages;
}
endif;
