<?php

/**
 * Base components for the twAdminPlugin twAdmin module.
 *
 * @package     twAdminPlugin
 * @subpackage  twDefault
 * @author      Arkadiusz Tułodziecki
 * @version     SVN: $Id: BasetwAdminComponents.class.php 3221 2010-07-31 16:30:14Z ldath $
 */
abstract class BasetwAdminComponents extends sfComponents {

	/**
	 * Top Header
	 *
	 */
	public function executeTop() {
		if (!$this->getUser()->isAuthenticated() && !twAdmin::getProperty('not_logged_top_active')) {
			$ms = array();
			$ts = array();
		} else {
			$ms = twAdmin::getProperty('master_section');
			$ts = twAdmin::getProperty('top_section');
		}
		if (!empty($ms)) {
			foreach ($ms as $k => $v) {
				if (!twAdmin::routeExists($v['url'], $this->getContext())) {
					$ms[$k]['url'] = '@homepage';
				}
				if (isset($v['credentials'])) {
					if (!$this->getUser()->hasCredential($v['credentials'])) {
						unset($ms[$k]);
					}
				}
			}
		}
		$this->ms = $ms;

		if (!empty($ts)) {
			foreach ($ts as $k => $v) {
				if (!twAdmin::routeExists($v['url'], $this->getContext())) {
					$ts[$k]['url'] = '@homepage';
				}
				if (isset($v['credentials'])) {
					if (!$this->getUser()->hasCredential($v['credentials'])) {
						unset($ts[$k]);
					}
				}
			}
		}
		$this->ts = $ts;
	}

	/**
	 * Top Menu
	 *
	 */
	public function executeMenu() {
		$section = sfConfig::get('tw_admin:default:module', twAdmin::getProperty('default_module'));
		$category = sfConfig::get('tw_admin:default:category', twAdmin::getProperty('default_category'));
		$subcategory = sfConfig::get('tw_admin:default:subcategory', twAdmin::getProperty('default_subcategory'));

		$menu = array();
		$submenu = array();
		$pre_menu = array();

		if ($this->getUser()->isAuthenticated() || twAdmin::getProperty('not_logged_menu_active')) {
			$full_menu = twAdmin::getProperty('menu');
			if (isset($full_menu[$section]['categories'])) {
				$pre_menu = $full_menu[$section]['categories'];
			}
		}
		foreach ($pre_menu as $key => $val) {
			if ($key == $category) {
				$val['selected'] = true;
				if (isset($val['items'])) {
					$submenu = $val['items'];
				}
			}
			if (isset($val['items'])) {
				unset($val['items']);
			}
			if (!twAdmin::routeExists($val['url'], $this->getContext())) {
				$menu[$key]['url'] = '@homepage';
			}
			$menu[$key] = $val;
			if (isset($val['credentials'])) {
				if (!$this->getUser()->hasCredential($val['credentials'])) {
					unset($menu[$key]);
				}
			}
		}
		$this->menu = $menu;

		if (!empty($submenu)) {
			foreach ($submenu as $k => $v) {
				if ($k == $subcategory) {
					$v['selected'] = true;
				}
				if (!twAdmin::routeExists($v['url'], $this->getContext())) {
					$submenu[$k]['url'] = '@homepage';
				}
				$submenu[$k] = $v;
				if (isset($v['credentials'])) {
					if (!$this->getUser()->hasCredential($v['credentials'])) {
						unset($submenu[$k]);
					}
				}
			}
		}
		$this->submenu = $submenu;
	}

	/**
	 * Sidebar
	 *
	 */
	public function executeSidebar() {}
}
