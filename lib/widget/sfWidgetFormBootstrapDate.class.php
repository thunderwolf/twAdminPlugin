<?php

class sfWidgetFormBootstrapDate extends sfWidgetFormInput {
	/**
	 * Configures the current widget.
	 *
	 * Available options:
	 *
	 *  * format:       The date format string (%month%/%day%/%year% by default)
	 *
	 * @param array $options     An array of options
	 * @param array $attributes  An array of default HTML attributes
	 *
	 * @see sfWidgetForm
	 */
	protected function configure($options = array(), $attributes = array()) {
		$this->addOption('format', 'yyyy-mm-dd');
		$this->addRequiredOption('type');
		
		// to maintain BC with symfony 1.2
		$this->setOption('type', 'text');
	}
	
	/**
	 * Renders the widget.
	 *
	 * @param  string $name        The element name
	 * @param  string $value       The date displayed in this widget
	 * @param  array  $attributes  An array of HTML attributes to be merged with the default HTML attributes
	 * @param  array  $errors      An array of errors for the field
	 *
	 * @return string An HTML tag string
	 *
	 * @see sfWidgetForm
	 */
	public function render($name, $value = null, $attributes = array(), $errors = array()) {
		$date_format = str_replace(array('yyyy', 'yy', 'mm', 'dd'), array('Y', 'y', 'm', 'd'), $this->getOption('format'));
		
		return '<div class="input-append date" data-date-format="' . $this->getOption('format') . '" data-date="' . (!empty($value)?$value:date($date_format, time())) . '" rel="datepicker">'
			. $this->renderTag('input', array_merge(array(
					'type' => $this->getOption('type'), 'name' => $name, 'value' => $value
				), $attributes)) . '<span class="add-on"><i class="icon-th"></i></span></div>';
	}
}
