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
 * Class Nice_Infoboxes_UpdateActionAbstract
 *
 * This class takes charge of the update processes fired against the WordPress API.
 *
 * @package Nice_Infoboxes_ADR
 * @since   1.0
 */
abstract class Nice_Infoboxes_UpdateActionAbstract extends Nice_Infoboxes_ActionAbstract {
	/**
	 * Prepare a Nice_Infoboxes_EntityInterface instance to be updated.
	 *
	 * @since  1.0
	 *
	 * @param  array                          $data Data to create the new instance.
	 *
	 * @return Nice_Infoboxes_EntityInterface
	 */
	public function __invoke( array $data ) {
		$instance = $this->domain->get_updated( $data );
		$this->responder->__invoke( $instance );
	}
}
