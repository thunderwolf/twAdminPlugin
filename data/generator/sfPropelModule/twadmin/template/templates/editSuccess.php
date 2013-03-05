[?php use_helper('I18N', 'Date') ?]
[?php include_partial('<?php echo $this->getModuleName() ?>/assets') ?]
<?php $template_span = $this->configuration->getValue('template.span'); ?>

<div<?php if ($template_span): ?> class="span<?php echo $template_span ?>"<?php endif; ?> id="content">
	<h1>[?php echo <?php echo $this->getI18NString('edit.title') ?> ?]</h1>
	<?php if ($template_span): ?>
	<div class="row-fluid">
		<div class="span12">
	<?php endif; ?>
			[?php include_partial('<?php echo $this->getModuleName() ?>/flashes') ?]
	<?php if ($template_span): ?>
		</div>
	</div>
	<?php endif; ?>
	<?php if ($template_span): ?>
	<div class="row-fluid">
		<div class="span12">
	<?php endif; ?>
			[?php include_partial('<?php echo $this->getModuleName() ?>/form_header', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration)) ?]
	<?php if ($template_span): ?>
		</div>
	</div>
	<?php endif; ?>
	<?php if ($template_span): ?>
	<div class="row-fluid">
		<div class="span12">
	<?php endif; ?>
			[?php include_partial('<?php echo $this->getModuleName() ?>/form', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?]
	<?php if ($template_span): ?>
		</div>
	</div>
	<?php endif; ?>
	<?php if ($template_span): ?>
	<div class="row-fluid">
		<div class="span12">
	<?php endif; ?>
			[?php include_partial('<?php echo $this->getModuleName() ?>/form_footer', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration)) ?]
	<?php if ($template_span): ?>
		</div>
	</div>
	<?php endif; ?>
</div>
