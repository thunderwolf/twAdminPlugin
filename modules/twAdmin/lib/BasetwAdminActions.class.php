<?php

/**
 * Base actions for the twAdminPlugin twAdmin module.
 *
 * @package     twAdminPlugin
 * @subpackage  twAdmin
 * @author      Arkadiusz Tułodziecki
 */
abstract class BasetwAdminActions extends sfActions {
	public function preExecute() {
		sfConfig::set('tw_admin:default:module', 'homepage');
		sfConfig::set('tw_admin:default:category', 'index');
		return parent::preExecute();
	}
	
	public function executeIndex() {
	}
}
