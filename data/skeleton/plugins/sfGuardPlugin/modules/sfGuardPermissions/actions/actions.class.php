<?php

require_once dirname(__FILE__).'/../lib/BasesfGuardPermissionActions.class.php';

/**
 * sfGuardPermission actions.
 *
 * @package    sfGuardPlugin
 * @subpackage sfGuardPermission
 * @author     Fabien Potencier
 * @version    SVN: $Id: actions.class.php 3205 2010-06-04 00:02:35Z ldath $
 */
class sfGuardPermissionActions extends BasesfGuardPermissionActions
{
	public function preExecute() {
		sfConfig::set('tw_admin:default:module', 'administration');
		sfConfig::set('tw_admin:default:category', 'permissions');
		return parent::preExecute();
	}
}
