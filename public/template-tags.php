<?php
/**
 * Nice InfoBoxes.
 *
 * This file includes public functions that print HTML.
 *
 * @package Nice_Infoboxes
 * @since   1.0
 */

if ( ! function_exists( 'nice_infoboxes' ) ) :
/**
 * Basic template for infoboxes projects.
 *
 * @since  1.0
 *
 * @param  array             $args
 * @return mixed|string|void
 */
function nice_infoboxes( array $args = null ) {
	$settings = nice_infoboxes_settings();

	do_action( 'nice_infoboxes_before_template', $args );

	$output = '';

	// Obtain a list of projects from normalized arguments.
	$args  = nice_infoboxes_normalize_args( $args );
	$posts = nice_infoboxes_get_posts( $args );

	if ( ! empty( $posts ) ) {
		// Initialize output.
		$output = $args['before'] . "\n";

		$loop = 0;

		foreach ( $posts as $post ) {
			// Continue if post is not valid.
			if ( ! $post instanceof WP_Post ) {
				continue;
			}

			$loop++;

			// Obtain custom fields
			$infobox_meta = nice_infoboxes_get_post_meta( $post );

			// Create basic template.
			$tpl = '
			<div class="nice-infobox %%CLASS%%">
				<div class="nice-infobox-thumb">%%IMAGE%%</div>
				<div class="nice-infobox-title">%%TITLE%%</div>
				<div class="nice-infobox-content">%%CONTENT%%</div>
				' . ( $infobox_meta['infobox_link_display'] ? '<div class="nice-infobox-view-more">%%VIEW_MORE%%</div>' : '' ) . '
			</div>';

			$tpl = apply_filters( 'nice_infoboxes_post_template', $tpl, $args, $post );

			$template = $tpl;

			// Construct a string with the names of the terms associated to the current post.
			$terms = get_the_terms( $post->ID, nice_infoboxes_category_name() );
			$terms_class = '';
			if ( ! empty( $terms ) ) {
				foreach ( $terms as $term ) {
					$terms_class .= ' term-' . $term->term_id;
				}
			}

			// Get image size.
			$image_width = $args['image_width'];
			$image_height = $args['image_height'];
			$image_size = ( $image_width || $image_height ) ? array( $image_width, $image_height ) : $settings['image_size'];
			$image_size = apply_filters( 'nice_infoboxes_posts_image_size', $image_size );

			// Get image type.
			$image_data = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $image_size );
			$image_type = $image_data[1] > $image_data[2] ? 'portrait' : 'landscape';

			// Define HTML class.
			$class = 'item post-' . $post->ID . ' columns-' . esc_attr( intval( $args['columns'] ) ) . ' ' . $terms_class . ' ' . $image_type;
			if ( 0 === ( $loop % $args['columns'] ) ) {
				$class .= ' last';
			}
			if ( 0 === ( ( $loop - 1 ) % $args['columns'] ) ) {
				$class .= ' first';
			}

			// Obtain view more link properties.
			$view_more_text   = ! empty( $infobox_meta['infobox_link_text'] ) ? $infobox_meta['infobox_link_text'] : esc_html__( 'View More', 'nice-infoboxes' );
			$view_more_url    = ! empty( $infobox_meta['infobox_link_url'] ) ? $infobox_meta['infobox_link_url'] : '#';
			$view_more_target = ! empty( $infobox_meta['infobox_link_target_blank'] ) ? ' target="_blank"' : '';

			// Obtain project image.
			$image = '';

			if ( ! empty( $infobox_meta['infobox_link_icon']['id'] ) ) {
				$icon_class = nice_infoboxes_icon_class( $infobox_meta['infobox_link_icon']['id'] );
				$color      = nice_infoboxes_icon_can_select_color() ? 'style="color: ' . $infobox_meta['infobox_link_icon']['color'] . '"' : '';

				$image .= ! empty( $infobox_meta['infobox_link_display'] ) ? '<a class="nice-infobox-icon" href="' . $view_more_url . '"' . $view_more_target . $color . '>' : '';
				$image .= '<i class="' . $icon_class . '" ' . ( empty( $infobox_meta['infobox_link_display'] ) ? $color : '' ) . '></i>';
				$image .= ! empty( $infobox_meta['infobox_link_display'] ) ? '</a>' : '';
				$class .= ' has-icon';
			}

			if ( empty( $image ) && has_post_thumbnail( $post->ID ) ) {
				$image .= ! empty( $infobox_meta['infobox_link_display'] ) ? '<a href="' . $view_more_url . '" ' . $view_more_target . '>' : '';

				if ( function_exists( 'nice_image' ) ) {
					$image .= nice_image( array(
							'size'   => '',
							'width'  => apply_filters( 'nice_infoboxes_image_width', $image_width, $args ),
							'height' => apply_filters( 'nice_infoboxes_image_height', $image_height, $args ),
							'id'     => $post->ID,
							'echo'   => false,
						)
					);
				} else {
					$image .= get_the_post_thumbnail( $post->ID, apply_filters( 'nice_infoboxes_image_size', $image_size ) );
				}

				$image .= ! empty( $infobox_meta['infobox_link_display'] ) ? '</a>' : '';
			}
			$image    = apply_filters( 'nice_infoboxes_post_thumbnail', $image, $post );
			$template = str_replace( '%%IMAGE%%', $image, $template );

			$class    = apply_filters( 'nice_infoboxes_post_class', $class, $post );
			$template = str_replace( '%%CLASS%%', $class, $template );

			// Check if title requires permalink.
			$use_permalink = apply_filters( 'nice_infoboxes_post_link_title', true );

			// Obtain project title.
			$title    = $args['before_title'];
			$title   .= $use_permalink && ! empty( $infobox_meta['infobox_link_display'] ) ? '<a href="' . $view_more_url . '" ' . $view_more_target . '>' : '';
			$title   .= $post->post_title;
			$title   .= $use_permalink && ! empty( $infobox_meta['infobox_link_display'] ) ? '</a>' : '';
			$title   .= $args['after_title'];
			$template = str_replace( '%%TITLE%%', $title, $template );

			// Obtain content.
			$content  = wpautop( $post->post_content );
			$content  = apply_filters( 'nice_infoboxes_content', $content, $post );
			$template = str_replace( '%%CONTENT%%', $content, $template );

			// Obtain "view more" link.
			$view_more = '';
			if ( ! empty( $infobox_meta['infobox_link_display'] ) ) {
				$view_more = '<p><a class="nice-infobox-view-more-link" href="' . $view_more_url . '" title="' . $view_more_text . '" ' . $view_more_target . '>' . $view_more_text . '</a></p>';
				$view_more = apply_filters( 'nice_infoboxes_view_more', $view_more, $post );
			}
			$template  = str_replace( '%%VIEW_MORE%%', $view_more, $template );

			// Allow modifications on template.
			$template = apply_filters( 'nice_infoboxes_template', $template, $post );

			// Add whole template to output.
			$output .= $template;
		}

		// Close grid div.
		$output .= $args['after'] . "\n";
	}
	// Allow child themes/plugins to filter here.
	$output = apply_filters( 'nice_infoboxes_html', $output, $posts, $args );

	do_action( 'nice_infoboxes_after_template', $args );

	if ( true === $args['echo'] ) {
		echo $output; // WPCS: XSS ok.
	}

	return $output;
}
endif;
