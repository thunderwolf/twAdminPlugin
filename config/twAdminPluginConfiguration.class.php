<?php

/**
 * twAdminPlugin configuration.
 *
 * @package     twAdminPlugin
 * @subpackage  config
 * @author      Arkadiusz Tułodziecki
 */
class twAdminPluginConfiguration extends sfPluginConfiguration {
	const VERSION = '1.1.0-DEV';
	
	/**
	 * @see sfPluginConfiguration
	 */
	public function initialize() {
		if (in_array('twAdmin', sfConfig::get('sf_enabled_modules', array()))) {
			// the plugin module is in the enabled modules, add assets:
			$this->dispatcher->connect('context.load_factories', array(
					'twAdminPluginConfiguration', 'listenToContextLoadFactoriesEvent'
				));
			
			if (true == twAdmin::getProperty('include_jquery_no_conflict')) {
				// if include_jquery_no_conflict is set to true, we need to modify the response content
				$this->dispatcher->connect('response.filter_content', array(
						'twAdminPluginConfiguration', 'listenToResponseFilterContentEvent'
					));
			}
		}
	}
	
	/**
	 * After the context has been initiated, we can add the required assets
	 *
	 * @param sfEvent $event
	 */
	public static function listenToContextLoadFactoriesEvent(sfEvent $event) {
		/** @param sfContext $context */
		$context = $event->getSubject();
		
		if (sfContext::getInstance()->getConfiguration()->getEnvironment() == 'dev') {
			$context->getResponse()->addStylesheet(twAdmin::getProperty('web_dir') . '/css/bootstrap.css', 'first');
		} else {
			$context->getResponse()->addStylesheet(twAdmin::getProperty('web_dir') . '/css/bootstrap.min.css', 'first');
		}
		$context->getResponse()->addStylesheet(twAdmin::getProperty('web_dir') . '/css/smoothness/jquery-ui-1.8.20.custom.css');
		$context->getResponse()->addStylesheet('/sfJQueryDateTimeFormWidgetPlugin/css/timePicker.css');
		$context->getResponse()->addStylesheet(twAdmin::getProperty('web_dir') . '/css/twadmin.css', 'last');
		
		$context->getResponse()->addJavascript(twAdmin::getProperty('web_dir') . '/js/jquery-1.7.2.min.js', 'first');
		if (sfContext::getInstance()->getConfiguration()->getEnvironment() == 'dev') {
			$context->getResponse()->addJavascript(twAdmin::getProperty('web_dir') . '/js/bootstrap.js');
		} else {
			$context->getResponse()->addJavascript(twAdmin::getProperty('web_dir') . '/js/bootstrap.min.js');
		}
		$context->getResponse()->addJavascript(twAdmin::getProperty('web_dir') . '/js/jquery-ui-1.8.20.custom.min.js');
		if (in_array(sfConfig::get('sf_default_culture', 'en'), array(
			'pl', 'pl_PL'
		))) {
			$context->getResponse()->addJavascript(twAdmin::getProperty('web_dir') . '/js/date-pl-PL.js');
		} else {
			$context->getResponse()->addJavascript(twAdmin::getProperty('web_dir') . '/js/date.js');
		}
		$context->getResponse()->addJavascript('/sfJQueryDateTimeFormWidgetPlugin/js/jquery.timePicker.js', 'last');
	}
	
	/**
	 * This is the right way to add stuff to the <head> tag after the page has been generated :)
	 * The principle is the same as with the old sfCommonFilter and asset insertion in sf 1.0-1.2
	 *
	 * @param sfEvent $event
	 * @param string  $content
	 *
	 * @return string
	 */
	public static function listenToResponseFilterContentEvent(sfEvent $event, $content = null) {
		$jquery_include_tag = '<script type="text/javascript" src="' . twAdmin::getProperty('web_dir') . '/js/' . twAdmin::getProperty('jquery_filename')
			. '"></script>';
		$jquery_no_conflict_tag = '<script type="text/javascript">jQuery.noConflict();</script>';
		
		if (false !== ($pos = strpos($content, $jquery_include_tag))) {
			$content = substr($content, 0, $pos + strlen($jquery_include_tag)) . $jquery_no_conflict_tag . substr($content, $pos + strlen($jquery_include_tag));
		}
		
		return $content;
	}
}
