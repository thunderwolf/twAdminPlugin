<?php

/**
 * Base actions for the twAdminPlugin twAdmin module.
 *
 * @package     twAdminPlugin
 * @subpackage  twAdmin
 * @author      Arkadiusz Tułodziecki
 * @version     SVN: $Id: BasetwAdminActions.class.php 3345 2010-09-25 16:52:43Z ldath $
 */
abstract class BasetwAdminActions extends sfActions
{
	public function preExecute() {
		sfConfig::set('tw_admin:default:module', 'homepage');
		sfConfig::set('tw_admin:default:category', 'index');
		return parent::preExecute();
	}
	
	public function executeIndex() {
	}
}
