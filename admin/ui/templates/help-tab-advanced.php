<?php
/**
 * Nice InfoBoxes.
 *
 * Header for Advanced Settings tab.
 *
 * @package Nice_Infoboxes
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>

<h3><?php esc_html_e( 'Advanced Settings', 'nice-infoboxes' ); ?></h3>

<p><?php esc_html_e( 'This screen provides settings for advanced users, such as removing all the configurations for this plugin when you deactivate it.', 'nice-infoboxes' ); ?></p>

<p><?php printf( esc_html__( 'If you need further support, please consider checking the %sdocumentation%s or %sreporting a bug%s.', 'nice-infoboxes' ), '<a href="https://nicethemes.com/documentation/infoboxes/" target="_blank">', '</a>', '<a href="https://nicethemes.com/support/support-forum/" target="_blank">', '</a>' ); ?></p>
