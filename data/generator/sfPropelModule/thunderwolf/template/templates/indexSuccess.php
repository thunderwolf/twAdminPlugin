[?php use_helper('I18N', 'Date') ?]
[?php include_partial('<?php echo $this->getModuleName() ?>/assets') ?]

[?php include_partial('<?php echo $this->getModuleName() ?>/list_header', array('pager' => $pager)) ?]

<div id="layout-mainbar">

  <h2>[?php echo <?php echo $this->getI18NString('list.title') ?> ?]</h2>

  [?php include_partial('<?php echo $this->getModuleName() ?>/flashes') ?]

<?php if ($this->configuration->hasFilterForm()): ?>
  <div id="layout-filter">
    [?php include_partial('<?php echo $this->getModuleName() ?>/filters', array('form' => $filters, 'configuration' => $configuration)) ?]
  </div>
<?php endif; ?>

<?php if ($this->configuration->getValue('list.batch_actions')): ?>
  <form action="[?php echo url_for('<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'batch')) ?]" method="post">
<?php endif; ?>
  [?php include_partial('<?php echo $this->getModuleName() ?>/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?]
  <ul class="sf_admin_actions">
    [?php include_partial('<?php echo $this->getModuleName() ?>/list_batch_actions', array('helper' => $helper)) ?]
    [?php include_partial('<?php echo $this->getModuleName() ?>/list_actions', array('helper' => $helper)) ?]
  </ul>
<?php if ($this->configuration->getValue('list.batch_actions')): ?>
  </form>
<?php endif; ?>

  [?php include_partial('<?php echo $this->getModuleName() ?>/list_footer', array('pager' => $pager)) ?]
</div>