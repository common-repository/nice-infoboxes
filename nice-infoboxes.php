<?php
/**
 * Nice InfoBoxes.
 *
 * @package   Nice_Infoboxes
 * @author    NiceThemes <hello@nicethemes.com>
 * @license   GPL-2.0+
 * @link      https://nicethemes.com/product/nice-infoboxes
 * @copyright 2016-2017 NiceThemes
 *
 * @wordpress-plugin
 * Plugin Name:       Nice InfoBoxes
 * Plugin URI:        https://nicethemes.com/product/nice-infoboxes
 * Description:       Show any kind of information in a beautiful and organized way.
 * Version:           1.0.3
 * Author:            NiceThemes
 * Author URI:        http://nicethemes.com
 * Contributors:      nicethemes, juanfra, andrezrv
 * Text Domain:       nice-infoboxes
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/nicethemes/nice-infoboxes
 * NiceThemes-Plugin-Boilerplate: v1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Load a file for development purposes if we have one.
 *
 * This is useful for plugin developers and users that want to test things
 * without breaking the rest of the codebase.
 *
 * @since 1.0
 */
if ( file_exists( $develop = plugin_dir_path( __FILE__ ) . 'develop.php' ) ) {
	include $develop;
}

/**
 * Define plugin file.
 */
if ( ! defined( 'NICE_INFOBOXES_PLUGIN_FILE' ) ) {
	define( 'NICE_INFOBOXES_PLUGIN_FILE', __FILE__ );
}

/**
 * Define plugin domain.
 */
if ( ! defined( 'NICE_INFOBOXES_PLUGIN_DOMAIN_FILE' ) ) {
	define( 'NICE_INFOBOXES_PLUGIN_DOMAIN_FILE', __FILE__ );
}

/**
 * Define URL for public assets.
 */
if ( ! defined( 'NICE_INFOBOXES_ASSETS_URL' ) ) {
	define( 'NICE_INFOBOXES_ASSETS_URL', trailingslashit( plugins_url( 'public/assets', __FILE__ ) ) );
}

/**
 * Define path for admin templates.
 */
if ( ! defined( 'NICE_INFOBOXES_ADMIN_TEMPLATES_PATH' ) ) {
	define( 'NICE_INFOBOXES_ADMIN_TEMPLATES_PATH', plugin_dir_path( __FILE__ ) . 'admin/templates' );
}

/**
 * Define URL for admin assets.
 */
if ( ! defined( 'NICE_INFOBOXES_ADMIN_ASSETS_URL' ) ) {
	define( 'NICE_INFOBOXES_ADMIN_ASSETS_URL', trailingslashit( plugins_url( 'admin/assets', __FILE__ ) ) );
}

/**
 * Load file for plugin initialization.
 */
require plugin_dir_path( __FILE__ ) . 'init.php';

/**
 * Trigger plugin functionality.
 *
 * @since 1.0
 */
do_action( 'nice_infoboxes_plugin_do' );
