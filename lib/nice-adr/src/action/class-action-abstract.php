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
 * Class Nice_Infoboxes_ActionAbstract
 *
 * This class takes charge of the plugin activation process and the preparation
 * of the related responder.
 *
 * @package Nice_Infoboxes_ADR
 * @author  NiceThemes <hello@nicethemes.com>
 * @since   1.0
 */
abstract class Nice_Infoboxes_ActionAbstract implements Nice_Infoboxes_ActionInterface {
	/**
	 * @var   Nice_Infoboxes_ServiceInterface
	 * @since 1.0
	 */
	protected $domain;

	/**
	 * @var   Nice_Infoboxes_ResponderInterface
	 * @since 1.0
	 */
	protected $responder;

	/**
	 * Set up initial state of action.
	 *
	 * @since 1.0
	 *
	 * @param Nice_Infoboxes_ServiceInterface   $domain
	 * @param Nice_Infoboxes_ResponderInterface $responder
	 */
	public function __construct(
		Nice_Infoboxes_ServiceInterface $domain,
		Nice_Infoboxes_ResponderInterface $responder
	) {
		$this->domain    = $domain;
		$this->responder = $responder;
	}

	/**
	 * Create new Nice_Infoboxes_EntityInterface instance and fire responder.
	 *
	 * @since  1.0
	 *
	 * @param  array                          $data Data to create the new instance.
	 *
	 * @return Nice_Infoboxes_EntityInterface
	 */
	public function __invoke( array $data ) {}

	/**
	 * Prepare instance to be displayed or updated.
	 *
	 * @since  1.0
	 *
	 * @param  array $data Data to prepare the instance.
	 */
	public function prepare( array $data ) {}
}
