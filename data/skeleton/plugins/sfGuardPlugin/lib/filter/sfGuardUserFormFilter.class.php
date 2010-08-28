<?php

/**
 * sfGuardUser filter form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfGuardUserFormFilter.class.php 3222 2010-07-31 16:32:39Z patryk $
 */
class sfGuardUserFormFilter extends BasesfGuardUserFormFilter {
	public function configure() {
		unset($this['algorithm'], $this['salt'], $this['password']);

		$this->widgetSchema['sf_guard_user_group_list']->setLabel('Groups');
		$this->widgetSchema['sf_guard_user_permission_list']->setLabel('Permissions');

		$this->setWidget('created_at', new sfWidgetFormFilterDate(
			array(
				'from_date' => new sfWidgetFormJQueryDate(array('image' => '/twAdminPlugin/images/icojoy/001_44.png', 'culture' => 'pl', 'date_widget' => new sfWidgetFormDate(array('format' => '%day%-%month%-%year%')))),
				'to_date' => new sfWidgetFormJQueryDate(array('image' => '/twAdminPlugin/images/icojoy/001_44.png', 'culture' => 'pl', 'date_widget' => new sfWidgetFormDate(array('format' => '%day%-%month%-%year%')))),
				'template' => 'from&nbsp;%from_date%&nbsp;to&nbsp;%to_date%',
				'filter_template' => '%date_range%&nbsp;%empty_checkbox%&nbsp;%empty_label%'
			)
		));
		$this->setWidget('last_login', new sfWidgetFormFilterDate(
			array(
				'from_date' => new sfWidgetFormJQueryDate(array('image' => '/twAdminPlugin/images/icojoy/001_44.png', 'culture' => 'pl', 'date_widget' => new sfWidgetFormDate(array('format' => '%day%-%month%-%year%')))),
				'to_date' => new sfWidgetFormJQueryDate(array('image' => '/twAdminPlugin/images/icojoy/001_44.png', 'culture' => 'pl', 'date_widget' => new sfWidgetFormDate(array('format' => '%day%-%month%-%year%')))),
				'template' => 'from&nbsp;%from_date%&nbsp;to&nbsp;%to_date%',
				'filter_template' => '%date_range%&nbsp;%empty_checkbox%&nbsp;%empty_label%'
			)
		));
	}
}
