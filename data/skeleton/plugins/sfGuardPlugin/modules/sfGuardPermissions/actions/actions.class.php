<?php

require_once dirname(__FILE__).'/../lib/BasesfGuardPermissionActions.class.php';

/**
 * sfGuardPermission actions.
 *
 * @package    sfGuardPlugin
 * @subpackage sfGuardPermission
 * @author     Fabien Potencier
 */
class sfGuardPermissionActions extends BasesfGuardPermissionActions
{
	public function preExecute() {
		sfConfig::set('tw_admin:default:module', 'usersadmin');
		sfConfig::set('tw_admin:default:category', 'permissions');
		return parent::preExecute();
	}
}
