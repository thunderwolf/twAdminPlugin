[?php if ($field->isPartial()): ?]
	[?php include_partial('<?php echo $this->getModuleName() ?>/'.$name, array('type' => 'filter', 'form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?]
[?php elseif ($field->isComponent()): ?]
	[?php include_component('<?php echo $this->getModuleName() ?>', $name, array('type' => 'filter', 'form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?]
[?php else: ?]
	[?php echo $form[$name]->renderLabel($label) ?]
	[?php echo $form[$name]->renderError() ?]
	[?php echo $form[$name]->render($attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes) ?]
	[?php if ($help || $help = $form[$name]->renderHelp()): ?]
		<a rel="tooltip" href="#" data-original-title="[?php echo __($help, array(), '<?php echo $this->getI18nCatalogue() ?>') ?]"><i class="icon-info-sign"></i></a>&nbsp;
	[?php endif; ?]
[?php endif; ?]
