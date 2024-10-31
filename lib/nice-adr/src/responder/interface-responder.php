<?php
/**
 * NiceThemes ADR
 *
 * @package Nice_Infoboxes_ADR
 * @license GPL-2.0+
 * @since   1.0
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Interface Nice_Infoboxes_ResponderInterface
 *
 * @package Nice_Infoboxes_ADR
 * @author  NiceThemes <hello@nicethemes.com>
 * @since   1.0
 */
interface Nice_Infoboxes_ResponderInterface {
	/**
	 * Fire main responder functionality.
	 *
	 * @since 1.0
	 *
	 * @param Nice_Infoboxes_EntityInterface $instance
	 */
	public function __invoke( Nice_Infoboxes_EntityInterface $instance );
}
