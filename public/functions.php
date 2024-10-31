<?php
/**
 * Nice InfoBoxes.
 *
 * This file includes functions to handle the public-facing side of the plugin.
 *
 * @package Nice_Infoboxes
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! function_exists( 'nice_infoboxes_get_posts' ) ) :
/**
 * Create a list of infoboxes projects by category.
 *
 * @since 1.0
 *
 * @param  array $args Arguments to get posts.
 *
 * @return array       List of infoboxes.
 */
function nice_infoboxes_get_posts( $args = array() ) {
	$infoboxes_posts = array();

	$args = nice_infoboxes_normalize_args( $args );

	do_action( 'nice_infoboxes_posts_before', $args );

	if ( 0 != $args['limit'] ) { // WPCS: loose comparison ok.
		// Construct query.
		$query = new WP_Query( array(
			'post_type'      => nice_infoboxes_post_type_name(),
			'orderby'        => $args['orderby'],
			'posts_per_page' => $args['limit'],
			'order'          => $args['order'],
			'tax_query'      => $args['tax_query'],
			'paged'          => $args['paged'],
		) );

		if ( $query->have_posts() ) {
			$infoboxes_posts = $query->posts;
		}

		wp_reset_postdata();
	}

	return $infoboxes_posts;
}
endif;

if ( ! function_exists( 'nice_infoboxes_normalize_args' ) ) :
/**
 * Normalize an array of arguments to build a list of infoboxes projects.
 *
 * @since  1.0
 *
 * @param  array            $args
 * @return array|mixed|void
 */
function nice_infoboxes_normalize_args( $args = array() ) {
	$settings = nice_infoboxes_settings();

	$defaults = apply_filters(
		'nice_infoboxes_posts_default_args', array(
			'avoidcss'     => $settings['avoidcss'],
			'columns'      => $settings['columns'],
			'rows'         => false,
			'limit'        => $settings['limit'],
			'orderby'      => $settings['orderby'],
			'echo'         => false,
			'order'        => strtoupper( $settings['order'] ),
			'before'       => '<div class="nice-infoboxes grid %%AVOIDCSS%%" data-columns="%%COLUMNS%%">',
			'after'        => '</div><!--/.nice-infoboxes .grid -->',
			'before_title' => '<h4>',
			'after_title'  => '</h4>',
			'tax_query'    => array(),
			'paged'        => null,
			'image_width'  => null,
			'image_height' => null,
		)
	);
	$defaults = apply_filters( 'nice_infoboxes_default_args', $defaults );

	$args = wp_parse_args( $args, $defaults );
	$args = apply_filters( 'nice_infoboxes_normalized_args', $args );

	/**
	 * Parse dynamic values for opening wrapper.
	 */
	$avoidcss = isset( $args['avoidcss'] ) ? nice_infoboxes_bool( $args['avoidcss'] ) : nice_infoboxes_bool( $settings['avoidcss'] );
	$args['before'] = str_replace( '%%AVOIDCSS%%', ( ! $avoidcss ? 'default-styles' : '' ), $args['before'] );
	$args['before'] = str_replace( '%%COLUMNS%%', esc_attr( intval( $args['columns'] ) ), $args['before'] );

	return $args;
}
endif;

if ( ! function_exists( 'nice_infoboxes_needs_assets' ) ) :
/**
 * Check if we need to load assets.
 *
 * @since  1.0
 *
 * @return bool
 */
function nice_infoboxes_needs_assets() {
	$post = get_post();

	// Return early if post doesn't exist.
	if ( empty( $post ) ) {
		return false;
	}

	$settings     = nice_infoboxes_settings();
	$needs_assets = false;

	if ( ! $settings['avoidcss']                                      // Usage of scripts is permitted.
	     && (    has_shortcode( $post->post_excerpt, 'infoboxes' )    // Excerpt uses the shortcode.
	          || has_shortcode( $post->post_content, 'infoboxes' )    // Content uses the shortcode
	          || is_home()                                            // Current page is home page.
	          || is_archive()                                         // Current page is some kind of archive page.
	          || nice_infoboxes_post_type_name() === $post->post_type // Current page is for infobox post type.
			)
	) {
		$needs_assets = true;
	}

	$needs_assets = apply_filters( 'nice_infoboxes_needs_assets', $needs_assets );

	return $needs_assets;
}
endif;
