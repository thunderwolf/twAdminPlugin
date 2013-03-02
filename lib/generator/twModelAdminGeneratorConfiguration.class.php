<?php

/**
 * Model generator configuration.
 *
 * @package    twAdminPlugin
 * @subpackage generator
 * @author     Luciano Coggiola <tanoinc@gmail.com>
 */
abstract class twModelAdminGeneratorConfiguration extends sfModelGeneratorConfiguration {

	protected function compile() {
		parent::compile();
		$this->configuration = array_merge($this->configuration,
				array(
						'template' => array('span' => $this->getTemplatesSpan(),)
				));
	}

}
