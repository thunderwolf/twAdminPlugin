<?php

require_once dirname(__FILE__).'/../lib/BasesfGuardGroupActions.class.php';

/**
 * sfGuardGroup actions.
 *
 * @package    sfGuardPlugin
 * @subpackage sfGuardGroup
 * @author     Fabien Potencier
 * @version    SVN: $Id: actions.class.php 3205 2010-06-04 00:02:35Z ldath $
 */
class sfGuardGroupActions extends BasesfGuardGroupActions
{
	public function preExecute() {
		sfConfig::set('tw_admin:default:module', 'administration');
		sfConfig::set('tw_admin:default:category', 'groups');
		return parent::preExecute();
	}
}
