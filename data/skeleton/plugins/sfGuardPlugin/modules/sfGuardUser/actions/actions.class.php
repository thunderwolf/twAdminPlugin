<?php

require_once dirname(__FILE__).'/../lib/BasesfGuardUserActions.class.php';

/**
 * sfGuardUser actions.
 *
 * @package    sfGuardPlugin
 * @subpackage sfGuardUser
 * @author     Fabien Potencier
 * @version    SVN: $Id: actions.class.php 3205 2010-06-04 00:02:35Z ldath $
 */
class sfGuardUserActions extends basesfGuardUserActions
{
	public function preExecute() {
		sfConfig::set('tw_admin:default:module', 'administration');
		sfConfig::set('tw_admin:default:category', 'users');
		return parent::preExecute();
	}
}
