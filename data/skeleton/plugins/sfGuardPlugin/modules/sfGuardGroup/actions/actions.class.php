<?php

require_once dirname(__FILE__).'/../lib/BasesfGuardGroupActions.class.php';

/**
 * sfGuardGroup actions.
 *
 * @package    sfGuardPlugin
 * @subpackage sfGuardGroup
 * @author     Fabien Potencier
 */
class sfGuardGroupActions extends BasesfGuardGroupActions
{
	public function preExecute() {
		sfConfig::set('tw_admin:default:module', 'usersadmin');
		sfConfig::set('tw_admin:default:category', 'groups');
		return parent::preExecute();
	}
}
