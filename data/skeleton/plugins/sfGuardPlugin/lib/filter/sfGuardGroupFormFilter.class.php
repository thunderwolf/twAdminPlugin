<?php

/**
 * sfGuardGroup filter form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfGuardGroupFormFilter.class.php 3210 2010-07-31 14:02:29Z ldath $
 */
class sfGuardGroupFormFilter extends BasesfGuardGroupFormFilter {
	public function configure() {
		unset($this['sf_guard_user_group_list']);
		$this->widgetSchema['sf_guard_group_permission_list']->setLabel('Permissions');
		$this->setWidget('description', new sfWidgetFormFilterInput(array('template' => '%input%&nbsp;%empty_checkbox%&nbsp;%empty_label%')));
	}
}
