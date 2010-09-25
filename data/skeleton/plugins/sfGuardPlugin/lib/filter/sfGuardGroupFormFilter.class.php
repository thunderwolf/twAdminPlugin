<?php

/**
 * sfGuardGroup filter form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
class sfGuardGroupFormFilter extends BasesfGuardGroupFormFilter {
	public function configure() {
		unset($this['sf_guard_user_group_list']);
		$this->widgetSchema['sf_guard_group_permission_list']->setLabel('Permissions');
		$this->setWidget('description', new sfWidgetFormFilterInput(array('template' => '%input%&nbsp;%empty_checkbox%&nbsp;%empty_label%')));
	}
}
