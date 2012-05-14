<?php

/**
 * Base components for the twAdminPlugin twAdmin module.
 *
 * @package     twAdminPlugin
 * @subpackage  twDefault
 * @author      Arkadiusz Tułodziecki
 */
abstract class BasetwAdminComponents extends sfComponents {
	/**
	 * Top Menu
	 *
	 */
	public function executeMenu() {
		$section = sfConfig::get('tw_admin:default:module', twAdmin::getProperty('default_module'));
		$category = sfConfig::get('tw_admin:default:category', twAdmin::getProperty('default_category'));
		$subcategory = sfConfig::get('tw_admin:default:subcategory', twAdmin::getProperty('default_subcategory'));
	
		if (!$this->getUser()->isAuthenticated() && !twAdmin::getProperty('not_logged_top_active')) {
			$ms = array();
			$ts = array();
		} else {
			$ms = twAdmin::getProperty('master_section');
			$ts = twAdmin::getProperty('top_section');
		}
		
		if (!empty($ms)) {
			$ms = $this->getMs($ms, $section);
		}
		
		if (!empty($ts)) {
			$ts = $this->getTs($ts, $section);
		}
		
		$submenu = array();
		
		$this->ms = $ms;
		$this->ts = $ts;
		$this->menu = $this->getMenu($section, $category, $submenu);
		$this->submenu = $this->getSubMenu($submenu, $subcategory);
	}
	
	public function executeFooter() {
		$version = ' ';
		if ($this->getUser()->isAuthenticated() && defined('THUNDERWOLF_VER')) {
			$version = 'ThunderwolfCore version: ' . THUNDERWOLF_VER;
		}
		$this->version = $version;
	}

	/**
	 * Sidebar
	 *
	 */
	public function executeSidebar() {}
	
	protected function getMs($ms, $section) {
		foreach ($ms as $k => $v) {
			if (!twAdmin::routeExists($v['url'], $this->getContext())) {
				$ms[$k]['url'] = '@homepage';
			}
			if (isset($v['credentials'])) {
				if (!$this->getUser()->hasCredential($v['credentials'])) {
					unset($ms[$k]);
				}
			}
			$ms[$k]['select'] = false;
			if ($k == $section) {
				$ms[$k]['select'] = true;
			}
		}
		return $ms;
	}
	
	protected function getTs($ts, $section) {
		ksort($ts);
		foreach ($ts as $k => $v) {
			if (!twAdmin::routeExists($v['url'], $this->getContext())) {
				$ts[$k]['url'] = '@homepage';
			}
			if (isset($v['credentials'])) {
				if (!$this->getUser()->hasCredential($v['credentials'])) {
					unset($ts[$k]);
				}
			}
			$ts[$k]['select'] = false;
			if ($k == $section) {
				$ts[$k]['select'] = true;
			}
		}
		return $ts;
	}
	
	protected function getMenu($section, $category, &$submenu) {
		$menu = array();
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
		return $menu;
	}
	
	protected function getSubMenu($submenu, $subcategory) {
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
		return $submenu;
	}
}
