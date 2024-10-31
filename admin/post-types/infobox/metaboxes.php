<?php
/**
 * Nice InfoBoxes.
 *
 * This file includes hooks to manage meta boxes for the infobox custom post type.
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

if ( ! function_exists( 'nice_infoboxes_register_meta' ) ) :
add_action( 'nice_infoboxes_post_type_admin_created', 'nice_infoboxes_register_meta' );
/**
 * Register post meta fields.
 *
 * `register_meta()` calls are implemented as previous to WP 4.6.0.
 *
 * @see   register_meta()
 *
 * @since 1.0
 */
function nice_infoboxes_register_meta() {
	/** @noinspection PhpParamsInspection */
	register_meta( 'post', '_infobox_link_icon', 'array_map', '__return_true' );

	/** @noinspection PhpParamsInspection */
	register_meta( 'post', '_infobox_link_url', 'esc_url_raw', '__return_true' );

	/** @noinspection PhpParamsInspection */
	register_meta( 'post', '_infobox_link_text', 'sanitize_text_field', '__return_true' );

	/** @noinspection PhpParamsInspection */
	register_meta( 'post', '_infobox_link_display', 'sanitize_text_field', '__return_true' );

	/** @noinspection PhpParamsInspection */
	register_meta( 'post', '_infobox_link_target_blank', 'sanitize_text_field', '__return_true' );
}
endif;

if ( ! function_exists( 'nice_infoboxes_create_metabox_info' ) ) :
add_filter( 'nice_infoboxes_metaboxes', 'nice_infoboxes_create_metabox_info' );
/**
 * Create a metabox for our custom post type.
 *
 * @since 1.0
 *
 * @param  array $metaboxes Current list of metaboxes data.
 *
 * @return array
 */
function nice_infoboxes_create_metabox_info( array $metaboxes ) {
	// Define post types.
	$post_types = array( nice_infoboxes_post_type_name() );
	$post_types = apply_filters( 'nice_infoboxes_metabox_info_post_types', $post_types );

	// Define infobox icon.
	$icon = array(
		'type'  => 'icon_select',
		'label' => esc_html__( 'Icon', 'nice-infoboxes' ),
		'name'  => '_infobox_link_icon',
		'desc'  => esc_html__( 'Add an icon for your infobox', 'nice-infoboxes' ),
	);
	$icon = apply_filters( 'nice_infoboxes_metabox_link_icon', $icon );

	// Define link URL field.
	$url = array(
		'type'  => 'text',
		'label' => esc_html__( '"Read more" URL', 'nice-infoboxes' ),
		'name'  => '_infobox_link_url',
		'desc'  => esc_html__( 'Add an URL for your Read More button in your Infobox on homepage (optional)', 'nice-infoboxes' ),
	);
	$url = apply_filters( 'nice_infoboxes_metabox_link_url', $url );

	// Define link text field.
	$text = array(
		'type'  => 'text',
		'label' => esc_html__( '"Read more" text', 'nice-infoboxes' ),
		'name'  => '_infobox_link_text',
		'desc'  => esc_html__( 'Add the anchor text for the "Read More" link.', 'nice-infoboxes' ),
	);
	$text = apply_filters( 'nice_infoboxes_metabox_link_text', $text );

	// Define link text field.
	$display = array(
		'type'  => 'checkbox',
		'label' => esc_html__( 'Show "Read more" link', 'nice-infoboxes' ),
		'name'  => '_infobox_link_display',
		'desc'  => esc_html__( 'Show your "Read More" link inside this infobox.', 'nice-infoboxes' ),
	);
	$display = apply_filters( 'nice_infoboxes_metabox_link_display', $display );

	// Define link target blank field.
	$target_blank = array(
		'type'  => 'checkbox',
		'label' => esc_html__( 'Open in a new window/tab', 'nice-infoboxes' ),
		'name'  => '_infobox_link_target_blank',
		'desc'  => esc_html__( 'Tick this option if you want your link to be opened in a new window/tab (optional).', 'nice-infoboxes' ),
	);
	$target_blank = apply_filters( 'nice_infoboxes_metabox_link_text', $target_blank );

	// Group all fields.
	$fields = array(
		$icon,
		$url,
		$text,
		$display,
		$target_blank,
	);
	$fields = apply_filters( 'nice_infoboxes_metabox_info_fields', $fields );

	// Define meta box settings.
	$settings = array(
		'title' => esc_html__( 'Infobox Details', 'nice-infoboxes' ),
	);
	$settings = apply_filters( 'nice_infoboxes_metabox_info_settings', $settings );

	// Prepare arguments.
	$args = array(
		'id'         => 'nice-infoboxes-project-details',
		'post_types' => $post_types,
		'fields'     => $fields,
		'settings'   => $settings,
	);

	$metaboxes[] = apply_filters( 'nice_infoboxes_metabox_info_args', $args );

	return $metaboxes;
}
endif;

if ( ! function_exists( 'nice_infoboxes_post_title_placeholder_text' ) ) :
add_filter( 'enter_title_here', 'nice_infoboxes_post_title_placeholder_text', 20 );
/**
 * Modify the default placeholder for infoboxes in the editor.
 *
 * @param $title
 *
 * @return string
 */
function nice_infoboxes_post_title_placeholder_text( $title ) {
	$screen = get_current_screen();

	if ( nice_infoboxes_post_type_name() === $screen->post_type ) {
		$title = esc_html__( 'Enter the InfoBox title here', 'nice-infoboxes' );
	}

	return $title;
}
endif;

if ( ! function_exists( 'nice_infoboxes_thumbnail_meta_box_html_title' ) ) :
add_action( 'add_meta_boxes', 'nice_infoboxes_thumbnail_meta_box_html_title' );
/**
 * Modify the title of the Featured Image meta box.
 *
 * @since  1.0
 */
function nice_infoboxes_thumbnail_meta_box_html_title() {
	global $wp_meta_boxes;

	$wp_meta_boxes[ nice_infoboxes_post_type_name() ]['side']['low']['postimagediv']['title'] = esc_html__( 'InfoBox image', 'nice-infoboxes' );
}
endif;

if ( ! function_exists( 'nice_infoboxes_thumbnail_meta_box_html' ) ) :
add_filter( 'admin_post_thumbnail_html', 'nice_infoboxes_thumbnail_meta_box_html' );
/**
 * Modify the output of the Featured Image meta box.
 *
 * @since  1.0
 *
 * @param  string      $content
 * @return string
 */
function nice_infoboxes_thumbnail_meta_box_html( $content ) {
	global $typenow;

	$post_type = $typenow;

	$post_id = isset( $_POST['post_id'] ) ? intval( $_POST['post_id'] ) : null; // WPCS: CSRF ok.

	if ( ! $post_type ) {
		$post = ( $p = get_post() ) ? $p : get_post( $post_id );
		$post_type = $post->post_type;
	}

	if ( nice_infoboxes_post_type_name() === $post_type ) {
		$content = str_replace(
			esc_html__( 'Set featured image', 'nice-infoboxes' ),
			esc_html__( 'Set InfoBox image', 'nice-infoboxes' ),
			$content
		);

		$content = str_replace(
			esc_html__( 'Remove featured image', 'nice-infoboxes' ),
			esc_html__( 'Remove InfoBox image', 'nice-infoboxes' ),
			$content
		);
	}
	$content = apply_filters( 'nice_infoboxes_thumbnail_meta_box_html', $content );

	return $content;
}
endif;

if ( ! function_exists( 'nice_infoboxes_media_view_strings' ) ) :
add_filter( 'media_view_strings', 'nice_infoboxes_media_view_strings' );
/**
 * Modify strings for media uploader localization.
 *
 * @since  1.0.0
 *
 * @param  array $strings List of localized strings.
 *
 * @return array
 */
function nice_infoboxes_media_view_strings( array $strings = array() ) {
	global $typenow;

	$post_type = $typenow;
	$post_id   = ! empty( $_POST['post_id'] ) ? intval( $_POST['post_id'] ) : null; // WPCS: CSRF ok.

	if ( ! $post_id ) {
		return $strings;
	}

	if ( ! $post_type ) {
		$post = ( $p = get_post() ) ? $p : get_post( $post_id );

		if ( ! $post ) {
			return $strings;
		}

		$post_type = $post->post_type;
	}

	if ( nice_infoboxes_post_type_name() === $post_type ) {
		$strings = array_merge( $strings, array(
				'setFeaturedImage'      => esc_html__( 'Set Infobox Image', 'nice-infoboxes' ),
				'setFeaturedImageTitle' => esc_html__( 'Set Infobox Image', 'nice-infoboxes' ),
			)
		);
	}

	return $strings;
}
endif;

if ( ! function_exists( 'nice_infoboxes_post_type_metabox_icon_select' ) ) :
add_filter( 'nice_infoboxes_post_type_metabox_add_field_html_icon_select', 'nice_infoboxes_post_type_metabox_icon_select' );
/**
 * Add a special field to select the icon for an infobox.
 *
 * @since 1.0
 */
function nice_infoboxes_post_type_metabox_icon_select() {
	$post              = get_post();
	$can_select_color  = nice_infoboxes_icon_can_select_color();
	$icon_data         = get_post_meta( $post->ID, '_infobox_link_icon', true );
	$icon_id           = ! empty( $icon_data['id'] ) ? $icon_data['id'] : '';
	$default_color     = nice_infoboxes_icon_default_color();
	$icon_color        = ! empty( $icon_data['color'] ) ? $icon_data['color'] : $default_color;
	$icon_active_color = $can_select_color ? $icon_color : $default_color;
	$picker_color      = $icon_id ? $icon_color : $default_color;
	$icons             = nice_infoboxes_icons();

	ob_start();

	?>
	<tr id="nicethemes__infobox_link_icon">
		<th><label for="nicethemes__infobox_link_icon"><?php esc_html_e( 'Icon', 'nice-infoboxes' ); ?></label></th>
		<td>
			<div class="icon-preview">
				<a style="color: <?php echo esc_attr( $icon_active_color ); ?>" href="#TB_inline?width=800&height=500&inlineId=nice-infoboxes-font-awesome-icons" title="<?php esc_html_e( 'Set icon', 'nice-infoboxes' ); ?>" class="thickbox">
					<?php if ( $icon_id ) : ?>
						<i class="fa fa-<?php echo esc_attr( $icon_id ); ?>"></i>
					<?php else : ?>
						<i></i>
					<?php endif; ?>
				</a>
			</div>

			<?php add_thickbox(); ?>

			<div class="action-links">
				<span class="action<?php if ( ! $icon_id ) : ?> active<?php endif; ?>" <?php if ( $icon_id ) : ?>style="display: none;"<?php endif; ?>>
					<a data-action="set" id="nice-infobox-icon-set" href="#TB_inline?width=800&height=500&inlineId=nice-infoboxes-font-awesome-icons" title="<?php esc_html_e( 'Set icon', 'nice-infoboxes' ); ?>" class="action-link thickbox"><?php esc_html_e( 'Set icon', 'nice-infoboxes' ); ?></a>
				</span>

				<span class="action<?php if ( $icon_id ) : ?> active<?php endif; ?>" style="display: <?php if ( $icon_id ) : ?>inline<?php else : ?>none<?php endif; ?>;">
					<a data-action="edit" id="nice-infobox-icon-edit" href="#TB_inline?width=800&height=500&inlineId=nice-infoboxes-font-awesome-icons" title="<?php esc_html_e( 'Set icon', 'nice-infoboxes' ); ?>" class="action-link thickbox"><?php esc_html_e( 'Modify icon', 'nice-infoboxes' ); ?></a>
				</span>

				<span class="action<?php if ( $icon_id ) : ?> active<?php endif; ?>" style="display: <?php if ( $icon_id ) : ?>inline<?php else : ?>none<?php endif; ?>;">
					<a data-action="remove" href="#" id="nice-infobox-icon-remove" class="action-link"><?php esc_html_e( 'Remove icon', 'nice-infoboxes' ); ?></a>
				</span>
			</div>

			<p>
				<span class="description"><?php esc_html_e( 'If you don\'t want to show an icon, you can use the infobox image instead.', 'nice-infoboxes' ); ?></span>
			</p>

			<input type="hidden" name="_infobox_link_icon[id]" value="<?php echo esc_attr( $icon_id ); ?>" />
			<input type="hidden" name="_infobox_link_icon[color]" value="<?php echo esc_attr( $icon_color ); ?>" />

			<div id="nice-infoboxes-font-awesome-icons" style="display: none;">
				<div id="nice-infobox-icon-selection">
					<ul class="nice-infobox-icons" data-base-class="<?php echo esc_attr( nice_infoboxes_icon_class() ); ?>">
						<?php foreach ( $icons as $icon ) : $icon = (array) $icon; ?>
							<li class="nice-infobox-icon<?php if ( $icon['id'] === $icon_id ) : ?> selected<?php endif; ?>" id="icon-<?php echo esc_attr( $icon['id'] ); ?>" data-id="<?php echo esc_attr( $icon['id'] ); ?>" data-unicode="<?php echo esc_attr( $icon['unicode'] ); ?>">
								<i class="<?php echo esc_attr( nice_infoboxes_icon_class( $icon['id'] ) ); ?>"></i>
								<span class="icon-name"><?php echo esc_html( $icon['name'] ); ?></span>
								<button type="button" class="button-link check" tabindex="0"><span class="media-modal-icon"></span><span class="screen-reader-text"><?php esc_html__( 'Deselect', 'nice-infoboxes' ); ?></span></button>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

				<div id="nice-infobox-icons-sidebar" class="media-sidebar">
					<div class="sidebar-content" style="display: <?php if ( $icon_id ) : ?>block<?php else : ?>none<?php endif; ?>;">
						<h3><?php esc_html_e( 'Icon preview', 'nice-infoboxes' ); ?></h3>

						<div class="preview" style="color: <?php echo esc_attr( $can_select_color ? $picker_color : $icon_active_color ); ?>;">
							<?php if ( $icon_id ) : ?>
								<i class="fa fa-<?php echo esc_attr( $icon_id ); ?>"></i>
							<?php else : ?>
								<i class=""></i>
							<?php endif; ?>
						</div>

						<?php if ( $can_select_color ) : ?>
							<h3><?php esc_html_e( 'Icon color', 'nice-infoboxes' ); ?></h3>

							<div class="color">
								<input type="text" value="<?php echo esc_attr( $picker_color ); ?>" class="nice-infobox-icon-color" data-default-color="<?php echo esc_attr( $default_color ); ?>" />
							</div>
						<?php endif; ?>
					</div>
				</div>

				<div id="nice-infobox-icons-toolbar">
					<button id="nice-infobox-icon-save" class="button button-primary"><?php esc_html_e( 'Set icon', 'nice-infoboxes' ) ?></button>
				</div>
			</div>
		</td>
	</tr>

	<?php
	$contents = ob_get_contents();
	ob_end_clean();

	return $contents;
}
endif;
