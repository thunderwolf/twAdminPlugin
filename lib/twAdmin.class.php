<?php

/**
 * twAdmin library.
 *
 * @package     twAdminPlugin
 * @subpackage  config
 * @author      Arkadiusz Tułodziecki
 */
class twAdmin {
	/**
	 * A proxy method for sfConfig::get(), used bacause it's more readible this way
	 *
	 * @param string $name     The name of the config value we want
	 * @param mixed  $default  The default value to be returned if the config option is not set
	 *
	 * @return mixed
	 */
	public static function getProperty($name, $default = null) {
		return sfConfig::get('app_tw_admin_' . $name, $default);
	}
	
	/**
	 * A proxy method for sfConfig::set(), userd because it's more convenient
	 *
	 * @param string $name   The name of the config value we want to set
	 * @param mixed  $value
	 */
	public static function setProperty($name, $value) {
		sfConfig::set('app_tw_admin_' . $name, $value);
	}
	
	/**
	 * Check if the supplied route exists
	 *
	 * @param string $route
	 * @param sfContext $context
	 *
	 * @return boolean
	 */
	public static function routeExists($route, sfContext $context) {
		try {
			if ($route{0} == '@') {
				$context->getRouting()->generate(substr($route, 1));
			}
			return true;
		} catch (Exception $e) {
			return false;
		}
	}
}
