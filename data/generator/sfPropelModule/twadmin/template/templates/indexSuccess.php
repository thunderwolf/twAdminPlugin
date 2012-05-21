[?php use_helper('I18N', 'Date') ?]
[?php include_partial('<?php echo $this->getModuleName() ?>/assets') ?]

<h2>[?php echo <?php echo $this->getI18NString('list.title') ?> ?]</h2>

[?php include_partial('<?php echo $this->getModuleName() ?>/flashes') ?]

<div id="tw_admin_header">
	[?php include_partial('<?php echo $this->getModuleName() ?>/list_header', array('pager' => $pager)) ?]
</div>

<?php if ($this->configuration->hasFilterForm()): ?>
[?php include_partial('<?php echo $this->getModuleName() ?>/filters', array('form' => $filters, 'configuration' => $configuration)) ?]
<?php endif; ?>

<div id="tw_admin_content">
<?php if ($this->configuration->getValue('list.batch_actions')): ?>
	<form action="[?php echo url_for('<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'batch')) ?]" method="post" class="form-inline">
<?php endif; ?>
	[?php include_partial('<?php echo $this->getModuleName() ?>/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?]
<?php if ($this->configuration->getValue('list.batch_actions')): ?>
	</form>
<?php endif; ?>
</div>

<div id="tw_admin_footer">
	[?php include_partial('<?php echo $this->getModuleName() ?>/list_footer', array('pager' => $pager)) ?]
</div>
