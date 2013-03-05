[?php use_helper('I18N', 'Date') ?]
[?php include_partial('<?php echo $this->getModuleName() ?>/assets') ?]
<?php $template_span = $this->configuration->getValue('template.span'); ?>

<div<?php if ($template_span): ?> class="span<?php echo $template_span ?>"<?php endif; ?> id="content">
	<h1>[?php echo <?php echo $this->getI18NString('list.title') ?> ?]</h1>

	[?php include_partial('<?php echo $this->getModuleName() ?>/flashes') ?]
	<?php if ($template_span): ?>
	<div class="row-fluid">
		<div class="span12">
	<?php endif; ?>
			<?php if ($this->configuration->hasFilterForm()): ?>
			<?php if ($template_span): ?>
			<div class="row-fluid">
				<div class="span12">
			<?php endif; ?>
					[?php include_partial('<?php echo $this->getModuleName() ?>/filters', array('form' => $filters, 'configuration' => $configuration, 'helper' => $helper)) ?]
			<?php if ($template_span): ?>
				</div>
			</div>
			<?php endif; ?>
			<?php endif; ?>
			<?php if ($template_span): ?>
			<div class="row-fluid">
			<?php endif; ?>
				[?php include_partial('<?php echo $this->getModuleName() ?>/list_header', array('pager' => $pager)) ?]
			<?php if ($template_span): ?>
			</div>
			<?php endif; ?>
			<?php if ($template_span): ?>
			<div class="row-fluid">
				<div class="span12">
			<?php endif; ?>
					<?php if ($this->configuration->getValue('list.batch_actions')): ?>
					<form class="form-inline" action="[?php echo url_for('<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'batch')) ?]" method="post">
					<?php endif; ?>
						[?php include_partial('<?php echo $this->getModuleName() ?>/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?]
						<!--div class="form-actions"-->
						<div class="btn-toolbar">
							[?php include_partial('<?php echo $this->getModuleName() ?>/list_batch_actions', array('helper' => $helper)) ?]
							[?php include_partial('<?php echo $this->getModuleName() ?>/list_actions', array('helper' => $helper)) ?]
						</div>
						<!--/div-->
					<?php if ($this->configuration->getValue('list.batch_actions')): ?>
					</form>
					<?php endif; ?>
			<?php if ($template_span): ?>
				</div>
			</div>
			<?php endif; ?>
			<?php if ($template_span): ?>
			<div class="row-fluid">
			<?php endif; ?>
				[?php include_partial('<?php echo $this->getModuleName() ?>/list_footer', array('pager' => $pager)) ?]
			<?php if ($template_span): ?>
			</div>
			<?php endif; ?>

	<?php if ($template_span): ?>
		</div> <!-- <div class="span12"> -->
	</div> <!-- <div class="row-fluid"> -->
	<?php endif; ?>
</div> <!-- <div id="content"> -->
