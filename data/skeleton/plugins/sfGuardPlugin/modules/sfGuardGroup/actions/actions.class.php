<?php

require_once dirname(__FILE__).'/../lib/BasesfGuardGroupActions.class.php';

/**
 * sfGuardGroup actions.
 *
 * @package    sfGuardPlugin
 * @subpackage sfGuardGroup
 * @author     Fabien Potencier
 * @version    SVN: $Id: actions.class.php 3345 2010-09-25 16:52:43Z ldath $
 */
class sfGuardGroupActions extends BasesfGuardGroupActions
{
	public function preExecute() {
		sfConfig::set('tw_admin:default:module', 'usersadmin');
		sfConfig::set('tw_admin:default:category', 'groups');
		return parent::preExecute();
	}
}
