<?php
/**
 * Nice InfoBoxes.
 *
 * This file includes hooks to handle theme functionality.
 *
 * @package Nice_Infoboxes
 * @since   1.0
 */

if ( ! function_exists( 'nice_infoboxes_do' ) ) :
add_action( 'init', 'nice_infoboxes_do' );
/**
 * Add hooks to display HTML on infoboxes actions.
 *
 * @since 1.0
 */
function nice_infoboxes_do() {
	add_action( 'nice_infoboxes', 'nice_infoboxes' );
}
endif;
