<?php
/**
 * Nice InfoBoxes.
 *
 * About Page Header for Admin UI.
 *
 * @package Nice_Infoboxes_Admin_UI
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

?>
	<div class="heading">
		<div class="masthead about">
			<h1><?php echo esc_html( nice_infoboxes_plugin_name() . ' ' . nice_infoboxes_plugin_version() ); ?></h1>
			<h2><?php esc_html_e( 'A beautiful and organized way to show information to your visitors.', 'nice-infoboxes' ); ?></h2>
		</div>
	</div>
