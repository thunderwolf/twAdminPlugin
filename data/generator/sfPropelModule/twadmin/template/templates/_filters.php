[?php use_stylesheets_for_form($form) ?]
[?php use_javascripts_for_form($form) ?]

[?php if ($form->hasGlobalErrors()): ?]
  [?php echo $form->renderGlobalErrors() ?]
[?php endif; ?]

<form action="[?php echo url_for('<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'filter')) ?]" method="post" class="well form-inline">
	[?php echo $form->renderHiddenFields() ?]
[?php foreach ($configuration->getFormFilterFields($form) as $name => $field): ?]
	[?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue ?]
		[?php include_partial('<?php echo $this->getModuleName() ?>/filters_field', array(
			'name'       => $name,
			'attributes' => $field->getConfig('attributes', array()),
			'label'      => $field->getConfig('label'),
			'help'       => $field->getConfig('help'),
			'form'       => $form,
			'field'      => $field,
			'class'      => 'tw_admin_'.strtolower($field->getType()).' tw_admin_filter_field_'.$name,
		)) ?]
[?php endforeach; ?]
	<div class="pull-right">
		[?php echo link_to(__('Reset', array(), 'sf_admin'), '<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post', 'class' => 'btn btn-inverse')) ?]
		<input type="submit" value="[?php echo __('Filter', array(), 'sf_admin') ?]" class="btn btn-primary" />
	</div>
</form>
