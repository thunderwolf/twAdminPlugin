<?php

/**
 * Base actions for the twAdminPlugin twDefault module.
 *
 * @package     twAdminPlugin
 * @subpackage  twDefault
 * @author      Arkadiusz Tułodziecki
 */
abstract class BasetwDefaultActions extends sfActions {
	/**
	 * Error page for page not found (404) error
	 *
	 */
	public function executeError404() {
	}
	
	/**
	 * Module disabled in settings.yml
	 *
	 */
	public function executeDisabled() {
	}
}
