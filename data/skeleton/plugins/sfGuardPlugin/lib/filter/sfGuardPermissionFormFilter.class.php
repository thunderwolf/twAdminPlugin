<?php

/**
 * sfGuardPermission filter form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfGuardPermissionFormFilter.class.php 3210 2010-07-31 14:02:29Z ldath $
 */
class sfGuardPermissionFormFilter extends BasesfGuardPermissionFormFilter {
	public function configure() {
		unset($this['sf_guard_user_permission_list']);
		$this->widgetSchema['sf_guard_group_permission_list']->setLabel('Groups');
		$this->setWidget('description', new sfWidgetFormFilterInput(array('template' => '%input%&nbsp;%empty_checkbox%&nbsp;%empty_label%')));
	}
}
