<?php

require_once dirname(__FILE__).'/../lib/BasesfGuardUserActions.class.php';

/**
 * sfGuardUser actions.
 *
 * @package    sfGuardPlugin
 * @subpackage sfGuardUser
 * @author     Fabien Potencier
 */
class sfGuardUserActions extends basesfGuardUserActions
{
	public function preExecute() {
		sfConfig::set('tw_admin:default:module', 'usersadmin');
		sfConfig::set('tw_admin:default:category', 'users');
		return parent::preExecute();
	}
}
