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
		
		$module = twAdmin::getProperty('module');
		ksort($module);
		$this->module = $this->formatList($module);
		
		$menus = twAdmin::getProperty('menu');
		$menu = $menus[$section]['categories'];
		$this->menu = $this->formatList($menu, $category);
		
		$submenu = array();
		if (array_key_exists('items', $menu[$category])) {
			$submenu = $this->formatList($menu[$category]['items'], $subcategory);
		}
		$this->submenu = $submenu;
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
	
	protected function formatList(&$items, $active_key = null) {
		foreach ($items as $k => $v) {
			if (!twAdmin::routeExists($v['url'], $this->getContext())) {
				$items[$k]['url'] = '@homepage';
			}
			if (!is_null($active_key)) {
				$items[$k]['select'] = false;
				if ($k == $active_key) {
					$items[$k]['select'] = true;
				}
			}
			if (isset($v['credentials'])) {
				if (!$this->getUser()->hasCredential($v['credentials'])) {
					unset($items[$k]);
				}
			}
		}
		return $items;
	}
}
