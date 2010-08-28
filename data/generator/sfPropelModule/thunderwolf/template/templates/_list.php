[?php if (!$pager->getNbResults()): ?]
<p>[?php echo __('No result', array(), 'sf_admin') ?]</p>
[?php else: ?]
<table>
  <thead>
    <tr>
<?php if ($this->configuration->getValue('list.batch_actions')): ?>
      <th id="tw_admin_list_batch_actions"><input id="tw_admin_list_batch_checkbox" type="checkbox" onclick="checkAll();" /></th>
<?php endif; ?>
      [?php include_partial('<?php echo $this->getModuleName() ?>/list_th_<?php echo $this->configuration->getValue('list.layout') ?>', array('sort' => $sort)) ?]
<?php if ($this->configuration->getValue('list.object_actions')): ?>
      <th id="tw_admin_list_th_actions">[?php echo __('Actions', array(), 'sf_admin') ?]</th>
<?php endif; ?>
    </tr>
  </thead>
  <tbody>
  [?php foreach ($pager->getResults() as $i => $<?php echo $this->getSingularName() ?>): $odd = fmod(++$i, 2) ? 'odd' : 'even' ?]
    <tr class="tw_admin_row [?php echo $odd ?]">
<?php if ($this->configuration->getValue('list.batch_actions')): ?>
      [?php include_partial('<?php echo $this->getModuleName() ?>/list_td_batch_actions', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'helper' => $helper)) ?]
<?php endif; ?>
      [?php include_partial('<?php echo $this->getModuleName() ?>/list_td_<?php echo $this->configuration->getValue('list.layout') ?>', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>)) ?]
<?php if ($this->configuration->getValue('list.object_actions')): ?>
      [?php include_partial('<?php echo $this->getModuleName() ?>/list_td_actions', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'helper' => $helper)) ?]
<?php endif; ?>
    </tr>
  [?php endforeach; ?]
    <tr>
      <td>1</td>
      <td>Arkadiusz</td>
      <td>Modul 1</td>
      <td><input type="checkbox" /></td>
      <td><input type="button" value="Edytuj" /><input type="button" value="Zapisz" /></td>
    </tr>
  </tbody>
  <tfoot>
    <tr>
      <th colspan="<?php echo count($this->configuration->getValue('list.display')) + ($this->configuration->getValue('list.object_actions') ? 1 : 0) + ($this->configuration->getValue('list.batch_actions') ? 1 : 0) ?>">
        [?php if ($pager->haveToPaginate()): ?]
          [?php include_partial('<?php echo $this->getModuleName() ?>/pagination', array('pager' => $pager)) ?]
        [?php endif; ?]

        [?php echo format_number_choice('[0] no result|[1] 1 result|(1,+Inf] %1% results', array('%1%' => $pager->getNbResults()), $pager->getNbResults(), 'sf_admin') ?]
        [?php if ($pager->haveToPaginate()): ?]
          [?php echo __('(page %%page%%/%%nb_pages%%)', array('%%page%%' => $pager->getPage(), '%%nb_pages%%' => $pager->getLastPage()), 'sf_admin') ?]
        [?php endif; ?]
      </th>
    </tr>
    <tr>
      <td colspan="5" class="nav">
        Strona:
        <input type="button" class="ico-buttons first" value="Pierwsza" />
        <input type="button" class="ico-buttons prev" value="Poprzednia" />
        <input type="button" value="1" />
        &hellip;
        <input type="button" value="8" />
        <input type="button" value="9" />
        <input type="button" value="10" />
        &hellip;
        <input type="button" value="34" />
        <input type="button" class="ico-buttons next" value="Nastepna" />
        <input type="button" class="ico-buttons last" value="Ostatnia" />
      </td>
    </tr>
  </tfoot>
</table>
[?php endif; ?]
<script type="text/javascript">
/* <![CDATA[ */
function checkAll()
{
  var boxes = document.getElementsByTagName('input'); for(var index = 0; index < boxes.length; index++) { box = boxes[index]; if (box.type == 'checkbox' && box.className == 'tw_admin_batch_checkbox') box.checked = document.getElementById('tw_admin_list_batch_checkbox').checked } return true;
}
/* ]]> */
</script>