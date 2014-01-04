<td>
    <div class="btn-group pull-right">
<?php foreach ($this->configuration->getValue('list.object_actions') as $name => $params): ?>
    <?php if ('_delete' == $name): ?>
        <?php echo $this->addCredentialCondition('[?php echo $helper->linkToDelete($'.$this->getSingularName().', '.$this->asPhp($params).') ?]', $params) ?>
    <?php elseif ('_edit' == $name): ?>
        <?php echo $this->addCredentialCondition('[?php echo $helper->linkToEdit($'.$this->getSingularName().', '.$this->asPhp($params).') ?]', $params) ?>
    <?php elseif ('_move_up' == $name) : ?>
        <?php echo $this->addCredentialCondition('[?php echo $helper->linkToMoveUp($' . $this->getSingularName() . ', ' . $this->asPhp($params) . ', \'btn-small\') ?]', $params) ?>
    <?php elseif ('_move_down' == $name) : ?>
        <?php echo $this->addCredentialCondition('[?php echo $helper->linkToMoveDown($' . $this->getSingularName() . ', ' . $this->asPhp($params) . ', \'btn-small\') ?]', $params) ?>
    <?php else: ?>
    <?php
        $params['params']['class'] = 'btn';
        if (!isset($params['params']['size'])) {
            $params['params']['class'] .= ' btn-small';
        }
    ?>
        <?php echo $this->addCredentialCondition($this->getLinkToAction($name, $params, true), $params) ?>
    <?php endif; ?>
<?php endforeach; ?>
    </div>
</td>