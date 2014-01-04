[?php

/**
 * <?php echo $this->getModuleName() ?> module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage <?php echo $this->getModuleName() . "\n" ?>
 * @author     ##AUTHOR_NAME##
 */
abstract class Base<?php echo ucfirst($this->getModuleName()) ?>GeneratorHelper extends twModelAdminGeneratorHelper {
    public function getUrlForAction($action) {
        return 'list' == $action ? '<?php echo $this->params['route_prefix'] ?>' : '<?php echo $this->params['route_prefix'] ?>_'.$action;
    }

    public function linkToMoveUp($object, $params) {
        if (empty($params['action'])) {
            $params['action'] = 'moveUp';
        }

        if ($object->isFirst()) {
            return '<a title="'.__($params['label'], array(), 'sf_admin').'" class="btn btn-small disabled" href="'.url_for('<?php echo $this->params['route_prefix'] ?>/'.$params['action'].'?<?php echo $this->getPrimaryKeyUrlParams('$object', true); ?>).'"><i class="icon-chevron-up"></i> '.__($params['label'], array(), 'sf_admin').'</a>';
        }

        return '<a title="'.__($params['label'], array(), 'sf_admin').'" class="btn btn-small" href="'.url_for('<?php echo $this->params['route_prefix'] ?>/'.$params['action'].'?<?php echo $this->getPrimaryKeyUrlParams('$object', true); ?>).'"><i class="icon-chevron-up"></i> '.__($params['label'], array(), 'sf_admin').'</a>';
    }

    public function linkToMoveDown($object, $params) {
        if (empty($params['action'])) {
            $params['action'] = 'moveDown';
        }

        if ($object->isLast()) {
            return '<a title="'.__($params['label'], array(), 'sf_admin').'" class="btn btn-small disabled" href="'.url_for('<?php echo $this->params['route_prefix'] ?>/'.$params['action'].'?<?php echo $this->getPrimaryKeyUrlParams('$object', true); ?>).'"><i class="icon-chevron-down"></i> '.__($params['label'], array(), 'sf_admin').'</a>';
        }

        return '<a title="'.__($params['label'], array(), 'sf_admin').'" class="btn btn-small" href="'.url_for('<?php echo $this->params['route_prefix'] ?>/'.$params['action'].'?<?php echo $this->getPrimaryKeyUrlParams('$object', true); ?>).'"><i class="icon-chevron-down"></i> '.__($params['label'], array(), 'sf_admin').'</a>';
    }

}
